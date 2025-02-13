<?php

namespace App\Modules\Paymentmade\Http\Controllers;

use App\Models\ManualJournal\JournalEntry;
use App\Models\MoneyOut\Bill;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\PaymentMode\PaymentMode;
use App\Models\AccountChart\Account;
use App\Models\MoneyOut\PaymentMade;
use App\Models\MoneyOut\PaymentMadeEntry;
use DB;
use App\Models\OrganizationProfile\OrganizationProfile;


class PaymentMadeWebController extends Controller
{

    public function index()
    {
        $payment_mades = PaymentMade::all();
        return view('paymentmade::payment_made.index', compact('payment_mades'));
    }

    public function create()
    {
        $payment_modes = PaymentMode::all();
        $paid_throughs = Account::where('account_type_id',4)->get();
        return view('paymentmade::payment_made.create', compact('payment_modes','paid_throughs'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user_id = Auth::user()->id;
        //return count($data['bill_id']);

        //generating payment made number automatically
        $payment_mades = PaymentMade::all();
        if(count($payment_mades)>0)
        {
            $payment_made = PaymentMade::orderBy('created_at', 'desc')->first();
            $pm_number = $payment_made['pm_number'];
            $pm_number = $pm_number + 1;
        }
        else
        {
            $pm_number = 1;
        }
        $pm_number = str_pad($pm_number, 6, '0', STR_PAD_LEFT);
        //end genereting payment made number automatically

        $used_amount = 0;
        if(isset($data['bill_id']))
        {
            for($i = 0; $i < count($data['bill_id']); $i++)
            {
                if(!$data['bill_amount'][$i])
                    continue;
                $used_amount = $used_amount + $data['bill_amount'][$i];

            }
        }

        $excess_amount = $data['amount'] - $used_amount;
        $payment_made = new PaymentMade;
        $payment_made->amount           = $data['amount'];
        $payment_made->payment_date     = date("Y-m-d" ,strtotime($data['payment_date']));
        $payment_made->pm_number        = $pm_number;
        $payment_made->payment_mode_id  = $data['payment_mode'];
        $payment_made->reference        = $data['reference'];
        $payment_made->excess_amount    = $excess_amount;
        $payment_made->account_id       = $data['account_id'];
        $payment_made->vendor_id        = $data['vendor_id'];
        $payment_made->created_by       = $user_id;
        $payment_made->updated_by       = $user_id;

        if(isset($data['bank_info']))
        {
            $payment_made->bank_info = $data['bank_info'];
        }

        if(isset($data['invoice_show']))
        {
            $payment_made->invoice_show = "on";
        }

        if($payment_made->save())
        {
            $payment_made     = PaymentMade::orderBy('created_at', 'desc')->first();
            $payment_made_id  = $payment_made['id'];

            $journal_entry = new JournalEntry;
            $journal_entry->note            = $data['note'];
            $journal_entry->debit_credit    = 0;
            $journal_entry->amount          = $data['amount'];
            $journal_entry->account_name_id = $data['account_id'];
            $journal_entry->jurnal_type     = "payment_made2";
            $journal_entry->payment_made_id = $payment_made_id;
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;
            $journal_entry->save();

            $journal_entry = new JournalEntry;
            $journal_entry->note            = $data['note'];
            $journal_entry->debit_credit    = 1;
            $journal_entry->amount          = $data['amount'];
            $journal_entry->account_name_id = 27;
            $journal_entry->jurnal_type     = "payment_made2";
            $journal_entry->payment_made_id = $payment_made_id;
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;
            $journal_entry->save();


            if(isset($data['bill_id']))
            {
                for($i = 0; $i < count($data['bill_id']); $i++)
                {
                    if(!$data['bill_amount'][$i])
                        continue;
                    $journal_entry = new JournalEntry;
                    $journal_entry->note            = $data['note'];
                    $journal_entry->debit_credit    = 1;
                    $journal_entry->amount          = $data['bill_amount'][$i];
                    $journal_entry->account_name_id = 11;
                    $journal_entry->jurnal_type     = "payment_made1";
                    $journal_entry->payment_made_id = $payment_made_id;
                    $journal_entry->bill_id         = $data['bill_id'][$i];
                    $journal_entry->created_by      = $user_id;
                    $journal_entry->updated_by      = $user_id;
                    $journal_entry->save();

                    $journal_entry = new JournalEntry;
                    $journal_entry->note            = $data['note'];
                    $journal_entry->debit_credit    = 0;
                    $journal_entry->amount          = $data['bill_amount'][$i];
                    $journal_entry->account_name_id = 27;
                    $journal_entry->jurnal_type     = "payment_made1";
                    $journal_entry->payment_made_id = $payment_made_id;
                    $journal_entry->bill_id         = $data['bill_id'][$i];
                    $journal_entry->created_by      = $user_id;
                    $journal_entry->updated_by      = $user_id;
                    $journal_entry->save();
                }

                $i = 0;
                $payment_made_entry = [];
                foreach ($data['bill_id'] as $bill_id)
                {
                    if(!$data['bill_amount'][$i])
                    {
                        $i++;
                    }
                    else
                    {

                        $payment_made_entry[] = [
                            'amount'            => $data['bill_amount'][$i],
                            'payment_made_id'   => $payment_made_id,
                            'bill_id'           => $data['bill_id'][$i],
                            'created_by'        => $user_id,
                            'updated_by'        => $user_id,
                            'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                        ];
                        $i++;
                    }
                }

                if (DB::table('payment_made_entry')->insert($payment_made_entry))
                {
                    $helper = new \App\Lib\Helpers;
                    $helper->updateDueBiilAfterPaymentMade($data);

                    return redirect()
                        ->route('payment_made')
                        ->with('alert.status', 'success')
                        ->with('alert.message', 'Payment made added successfully!');
                }
                else
                {
                    $payment_made = PaymentMade::find($payment_made_id);
                    $payment_made->delete();

                    return redirect()
                        ->route('payment_made')
                        ->with('alert.status', 'danger')
                        ->with('alert.message', 'Something went to wrong! please check your input field!!!');
                }
            }

            return redirect()
                ->route('payment_made')
                ->with('alert.status', 'success')
                ->with('alert.message', 'Payment made added successfully!');
        }

        return redirect()
            ->route('payment_made')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Something went to wrong! please check your input field!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment_made = PaymentMade::find($id);
        $payment_mades = PaymentMade::all();
        $payment_made_entries = PaymentMadeEntry::where('payment_made_id', $id)->get();
         $OrganizationProfile = OrganizationProfile::find(1);
        return view('paymentmade::payment_made.show',compact('OrganizationProfile','payment_made','payment_mades','payment_made_entries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment_modes = PaymentMode::all();
        $paid_throughs = Account::where('account_type_id',4)->get();
        $payment_made = PaymentMade::find($id);
        return view('paymentmade::payment_made.edit', compact('payment_modes','paid_throughs','payment_made'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user_id = Auth::user()->id;
        $used_amount = 0;
        if(isset($data['bill_id']))
        {
            for($i = 0; $i < count($data['bill_id']); $i++)
            {
                if(!$data['bill_amount'][$i])
                    continue;
                $used_amount = $used_amount + $data['bill_amount'][$i];

            }
        }

        $excess_amount = $data['amount'] - $used_amount;
        $payment_made_entry = PaymentMadeEntry::where('payment_made_id',$id)->get();
        $helper = new \App\Lib\Helpers;
        $helper->updateDueBiilAfterPaymentMadeEdit($payment_made_entry);
        $payment_made = PaymentMade::find($id);
        $payment_made->amount           = $data['amount'];
        $payment_made->payment_date     = date("Y-m-d" ,strtotime($data['payment_date']));
        $payment_made->payment_mode_id  = $data['payment_mode'];
        $payment_made->reference        = $data['reference'];
        $payment_made->excess_amount    = $excess_amount;
        $payment_made->account_id       = $data['account_id'];
        $payment_made->vendor_id        = $data['vendor_id'];
        $payment_made->created_by       = $user_id;
        $payment_made->updated_by       = $user_id;

        if(isset($data['bank_info']))
        {
            $payment_made->bank_info = $data['bank_info'];
        }

        if(isset($data['invoice_show']))
        {
            $payment_made->invoice_show = "on";
        }
        else
        {
            $payment_made->invoice_show = "";
        }

        if($payment_made->update())
        {

            if(isset($data['bill_id']))
            {
                $payment_made_entry = PaymentMade::find($id)->paymentMadeEntries();
                if($payment_made_entry->delete())
                {

                }

                $i = 0;
                $payment_made_entry = [];
                foreach ($data['bill_id'] as $bill_id)
                {
                    if($data['bill_amount'][$i] > 0)
                    {
                        $payment_made_entry[] = [
                            'amount'            => $data['bill_amount'][$i],
                            'payment_made_id'   => $id,
                            'bill_id'           => $data['bill_id'][$i],
                            'created_by'        => $user_id,
                            'updated_by'        => $user_id,
                            'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                        ];
                        $i++;
                    }
                    else
                    {
                        $i++;
                    }
                }
            }

            //for journal entry transaction...
            $journal_entry = PaymentMade::find($id)->JournalEntry();
            if($journal_entry->delete())
            {

            }
            $journal_entry = new JournalEntry;
            $journal_entry->note            = $data['note'];
            $journal_entry->debit_credit    = 0;
            $journal_entry->amount          = $data['amount'];
            $journal_entry->account_name_id = $data['account_id'];
            $journal_entry->jurnal_type     = "payment_made2";
            $journal_entry->payment_made_id = $id;
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;
            $journal_entry->save();

            $journal_entry = new JournalEntry;
            $journal_entry->note            = $data['note'];
            $journal_entry->debit_credit    = 1;
            $journal_entry->amount          = $data['amount'];
            $journal_entry->account_name_id = 27;
            $journal_entry->jurnal_type     = "payment_made2";
            $journal_entry->payment_made_id = $id;
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;
            $journal_entry->save();

            if(isset($data['bill_id']))
            {
                for($i = 0; $i < count($data['bill_id']); $i++)
                {
                    if($data['bill_amount'][$i]>0)
                    {
                        $journal_entry = new JournalEntry;
                        $journal_entry->note            = $data['note'];
                        $journal_entry->debit_credit    = 1;
                        $journal_entry->amount          = $data['bill_amount'][$i];
                        $journal_entry->account_name_id = 11;
                        $journal_entry->jurnal_type     = "payment_made1";
                        $journal_entry->payment_made_id = $id;
                        $journal_entry->bill_id         = $data['bill_id'][$i];
                        $journal_entry->created_by      = $user_id;
                        $journal_entry->updated_by      = $user_id;
                        $journal_entry->save();

                        $journal_entry = new JournalEntry;
                        $journal_entry->note            = $data['note'];
                        $journal_entry->debit_credit    = 0;
                        $journal_entry->amount          = $data['bill_amount'][$i];
                        $journal_entry->account_name_id = 27;
                        $journal_entry->jurnal_type     = "payment_made1";
                        $journal_entry->payment_made_id = $id;
                        $journal_entry->bill_id         = $data['bill_id'][$i];
                        $journal_entry->created_by      = $user_id;
                        $journal_entry->updated_by      = $user_id;
                        $journal_entry->save();
                    }
                }

                if (DB::table('payment_made_entry')->insert($payment_made_entry))
                {
                    $helper = new \App\Lib\Helpers;
                    $helper->updateDueBiilAfterPaymentMade($data);

                    return redirect()
                        ->route('payment_made')
                        ->with('alert.status', 'success')
                        ->with('alert.message', 'Payment made updated successfully!');
                }
                else
                {

                    return redirect()
                        ->route('payment_made')
                        ->with('alert.status', 'danger')
                        ->with('alert.message', 'Something went to wrong! please check your input field!!!');
                }
            }

            return redirect()
                ->route('payment_made')
                ->with('alert.status', 'success')
                ->with('alert.message', 'Payment made updated successfully!');

            //end journal entry transaction...
        }

        return redirect()
            ->route('payment_made')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Something went to wrong! please check your input field!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pm_entries = PaymentMadeEntry::where('payment_made_id', $id)->get();
        //return $pr_entries;
        foreach ($pm_entries as $pm_entry)
        {
            $bill = Bill::find($pm_entry['bill_id']);
            $bill->due_amount = $bill['due_amount'] + $pm_entry['amount'];
            $bill->update();
        }

        $payment_made = PaymentMade::find($id);
        if($payment_made->delete())
        {
            return redirect()
                ->route('payment_made')
                ->with('alert.status', 'success')
                ->with('alert.message', 'Payment Made Delete successfully!');
        }
    }

    public function deletePaymentMadeEntry($id)
    {
        $payment_made_id = PaymentMadeEntry::find($id)->payment_made_id;

        $amount = PaymentMadeEntry::find($id)->amount;
        $bill_id = PaymentMadeEntry::find($id)->bill_id;

        $payment_made = PaymentMade::find($payment_made_id);

        $bill = Bill::find($bill_id);
        $bill->due_amount = $bill['due_amount'] + $amount;
        $bill->update();

        $payment_made->excess_amount = $payment_made['excess_amount'] + $amount;
        if($payment_made->update())
        {
            $payment_made_entry = PaymentMadeEntry::find($id);
            if($payment_made_entry->delete())
            {
                JournalEntry::where('jurnal_type', 'payment_made1')
                    ->where('payment_made_id', $payment_made_id)
                    ->where('bill_id', $bill_id)
                    ->delete();
                return redirect()
                    ->route('bill_show', ['id' => $bill_id])
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Payment made Entry Deleted');
            }
        }

        return redirect()
            ->route('bill_show', ['id' => $bill_id])
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Something went to wrong');
    }

}
