<?php

namespace App\Modules\Paymentreceive\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Moneyin\PaymentReceives;
use App\Models\Moneyin\PaymentReceiveEntryModel;
use App\Models\Moneyin\Invoice;
use App\Models\ManualJournal\JournalEntry;
use App\Models\Contact\Contact;
use App\Models\PaymentMode\PaymentMode;
use App\Models\AccountChart\Account;
use App\Models\OrganizationProfile\OrganizationProfile;
use Illuminate\Support\Facades\Auth;
use DB;

class PaymentReceivedWebController extends Controller
{
    public function index()
    {
        
        $paymentreceives = PaymentReceives::all();

        $invoice = Invoice::all();
        return view('paymentreceive::payment_receive.index',compact('paymentreceives','invoice'));
    }

    public function create()
    {
        $payment_modes = PaymentMode::all();
        $paid_receives = Account::where('account_type_id',4)->get();
        return view('paymentreceive::payment_receive.create', compact('payment_modes','paid_receives'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user_id = Auth::user()->id;

        //generating payment receive number automatically
        $payment_receives = PaymentReceives::all();
        if(count($payment_receives)>0)
        {
            $payment_receive = PaymentReceives::orderBy('created_at', 'desc')->first();
            $pr_number = $payment_receive['pr_number'];
            $pr_number = $pr_number + 1;
        }
        else
        {
            $pr_number = 1;
        }
        $pr_number = str_pad($pr_number, 6, '0', STR_PAD_LEFT);
        //end genereting payment receive number automatically

        $used_amount = 0;
        if(isset($data['invoice_id']))
        {
            for($i = 0; $i < count($data['invoice_id']); $i++)
            {
                if(!$data['invoice_amount'][$i])
                    continue;
                $used_amount = $used_amount + $data['invoice_amount'][$i];

            }
        }

        $excess_amount = $data['amount'] - $used_amount;

        $payment_receive = new PaymentReceives;
        $payment_receive->amount           = $data['amount'];
        $payment_receive->payment_date     = date("Y-m-d", strtotime($data['payment_date']));
        $payment_receive->pr_number        = $pr_number;
        $payment_receive->payment_mode_id  = $data['payment_mode'];
        $payment_receive->reference        = $data['reference'];
        $payment_receive->excess_payment   = $excess_amount;
        $payment_receive->account_id       = $data['account_id'];
        $payment_receive->customer_id      = $data['customer_id'];
        $payment_receive->created_by       = $user_id;
        $payment_receive->updated_by       = $user_id;

        if(isset($data['bank_info']))
        {
            $payment_receive->bank_info = $data['bank_info'];
        }

        if(isset($data['invoice_show']))
        {
            $payment_receive->invoice_show = "on";
        }

        if($payment_receive->save())
        {
            $payment_receive     = PaymentReceives::orderBy('created_at', 'desc')->first();
            $payment_receive_id  = $payment_receive['id'];

            $journal_entry = new JournalEntry;
            $journal_entry->note                = $data['note'];
            $journal_entry->debit_credit        = 1;
            $journal_entry->amount              = $data['amount'];
            $journal_entry->account_name_id     = $data['account_id'];
            $journal_entry->jurnal_type         = "payment_receive2";
            $journal_entry->payment_receives_id  = $payment_receive_id;
            $journal_entry->created_by          = $user_id;
            $journal_entry->updated_by          = $user_id;
            $journal_entry->save();

            $journal_entry = new JournalEntry;
            $journal_entry->note                = $data['note'];
            $journal_entry->debit_credit        = 0;
            $journal_entry->amount              = $data['amount'];
            $journal_entry->account_name_id     = 27;
            $journal_entry->jurnal_type         = "payment_receive2";
            $journal_entry->payment_receives_id  = $payment_receive_id;
            $journal_entry->created_by          = $user_id;
            $journal_entry->updated_by          = $user_id;
            $journal_entry->save();


            if(isset($data['payment_receive_adjustment']))
            {
                for($i = 0; $i < count($data['payment_receive_adjustment']); $i++)
                {
                    if(!$data['payment_receive_adjustment'][$i] || $data['payment_receive_adjustment'][$i] == 0)
                        continue;

                    $invoice = Invoice::find($data['invoice_id'][$i]);
                    $invoice->total_amount = $invoice['total_amount'] - $data['payment_receive_adjustment'][$i];
                    $invoice->due_amount = $invoice['due_amount'] - $data['payment_receive_adjustment'][$i];
                    $invoice->pr_adjustment = $invoice['pr_adjustment'] + $data['payment_receive_adjustment'][$i];
                    $invoice->pr_note = $data['payment_receive_note'][$i];
                    $invoice->update();

                    $journal_entry = new JournalEntry;
                    $journal_entry->debit_credit = 0;
                    $journal_entry->amount = $data['payment_receive_adjustment'][$i];
                    $journal_entry->account_name_id  = 18;
                    $journal_entry->jurnal_type = "invoice";
                    $journal_entry->pr_adjustment_id = $data['invoice_id'][$i];
                    $journal_entry->created_by          = $user_id;
                    $journal_entry->updated_by          = $user_id;
                    $journal_entry->save();

                }
            }


            if(isset($data['invoice_id']))
            {
                for($i = 0; $i < count($data['invoice_id']); $i++)
                {
                    if(!$data['invoice_amount'][$i])
                        continue;
                    $journal_entry = new JournalEntry;
                    $journal_entry->note                = $data['note'];
                    $journal_entry->debit_credit        = 0;
                    $journal_entry->amount              = $data['invoice_amount'][$i];
                    $journal_entry->account_name_id     = 11;
                    $journal_entry->jurnal_type         = "payment_receive1";
                    $journal_entry->payment_receives_id = $payment_receive_id;
                    $journal_entry->invoice_id          = $data['invoice_id'][$i];
                    $journal_entry->created_by          = $user_id;
                    $journal_entry->updated_by          = $user_id;
                    $journal_entry->save();

                    $journal_entry = new JournalEntry;
                    $journal_entry->note                = $data['note'];
                    $journal_entry->debit_credit        = 1;
                    $journal_entry->amount              = $data['invoice_amount'][$i];
                    $journal_entry->account_name_id     = 27;
                    $journal_entry->jurnal_type         = "payment_receive1";
                    $journal_entry->payment_receives_id = $payment_receive_id;
                    $journal_entry->invoice_id          = $data['invoice_id'][$i];
                    $journal_entry->created_by          = $user_id;
                    $journal_entry->updated_by          = $user_id;
                    $journal_entry->save();
                }

                $i = 0;
                $payment_receive_entry = [];
                foreach ($data['invoice_id'] as $bill_id)
                {
                    if(!$data['invoice_amount'][$i])
                    {
                        $i++;
                    }
                    else
                    {

                        $payment_receive_entry[] = [
                            'amount'                => $data['invoice_amount'][$i],
                            'payment_receives_id'   => $payment_receive_id,
                            'invoice_id'            => $data['invoice_id'][$i],
                            'created_by'            => $user_id,
                            'updated_by'            => $user_id,
                            'created_at'            => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at'            => \Carbon\Carbon::now()->toDateTimeString(),
                        ];
                        $i++;
                    }
                }

                if (DB::table('payment_receives_entries')->insert($payment_receive_entry))
                {
                    $helper = new \App\Lib\Helpers;
                    $helper->updateDueInvoiceAfterPaymentReceive($data);

                    return redirect()
                        ->route('payment_received')
                        ->with('alert.status', 'success')
                        ->with('alert.message', 'Payment receive added successfully!');
                }
                else
                {
                    $payment_receive = PaymentReceives::find($payment_receive_id);
                    $payment_receive->delete();

                    return redirect()
                        ->route('payment_received')
                        ->with('alert.status', 'danger')
                        ->with('alert.message', 'Something went to wrong! please check your input field!!!');
                }
            }

            return redirect()
                ->route('payment_received')
                ->with('alert.status', 'success')
                ->with('alert.message', 'Payment receive added successfully!');
        }

        return redirect()
            ->route('payment_receive')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Something went to wrong! please check your input field!!!');
        
    }

    public function show($id)
    {
        $paymentreceives = PaymentReceives::all();
        $paymentreceive = PaymentReceives::find($id);
        $invoice = Invoice::all();
        $OrganizationProfile = OrganizationProfile::find(1);
        return view('paymentreceive::payment_receive.show',compact('paymentreceives','invoice','paymentreceive','OrganizationProfile'));
    }

    public function edit($id)
    {
        $payment_receive = PaymentReceives::find($id);
        $customer_id = $payment_receive->customer_id;
        $invoices       = Invoice::where('customer_id',$customer_id)->get();
        $payment_modes   = PaymentMode::all();
        $deposite       = Account::where('account_type_id',4)->get();

        return view('paymentreceive::payment_receive.edit',compact('invoices','payment_modes','deposite','payment_receive', 'customer_id'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user_id = Auth::user()->id;
        $used_amount = 0;
        if(isset($data['invoice_id']))
        {
            for($i = 0; $i < count($data['invoice_id']); $i++)
            {
                if(!$data['invoice_amount'][$i])
                    continue;
                $used_amount = $used_amount + $data['invoice_amount'][$i];

            }
        }

        $excess_amount = $data['amount'] - $used_amount;
        $payment_receive_entry = PaymentReceiveEntryModel::where('payment_receives_id',$id)->get();
        $helper = new \App\Lib\Helpers;
        $helper->updateDueInvoiceAfterPaymentReceiveEdit($payment_receive_entry);
        $helper->updatePaymentReceiveAdjustmentInvoiceAfterPaymentReceiveEdit($data);
        $payment_receive = PaymentReceives::find($id);
        $payment_receive->amount           = $data['amount'];
        $payment_receive->payment_date     = date("Y-m-d", strtotime($data['payment_date']));
        $payment_receive->payment_mode_id  = $data['payment_mode'];
        $payment_receive->reference        = $data['reference'];
        $payment_receive->excess_payment   = $excess_amount;
        $payment_receive->account_id       = $data['account_id'];
        $payment_receive->customer_id      = $data['customer_id'];
        $payment_receive->created_by       = $user_id;
        $payment_receive->updated_by       = $user_id;

        if(isset($data['bank_info']))
        {
            $payment_receive->bank_info = $data['bank_info'];
        }

        if(isset($data['invoice_show']))
        {
            $payment_receive->invoice_show = "on";
        }
        else
        {
            $payment_receive->invoice_show = "";
        }

        if(isset($data['payment_receive_adjustment']))
        {
            for($i = 0; $i < count($data['payment_receive_adjustment']); $i++)
            {
                if(!$data['payment_receive_adjustment'][$i] || $data['payment_receive_adjustment'][$i] == 0)
                {
                    //$data['payment_receive_adjustment'][$i] = 0;
                    continue;
                }


                $journal_entry = JournalEntry::where('pr_adjustment_id', $data['invoice_id'][$i])->first();
                $journal_entry->debit_credit = 0;
                $journal_entry->amount = $data['payment_receive_adjustment'][$i];
                $journal_entry->account_name_id  = 18;
                $journal_entry->jurnal_type = "invoice";
                $journal_entry->pr_adjustment_id = $data['invoice_id'][$i];
                $journal_entry->created_by          = $user_id;
                $journal_entry->updated_by          = $user_id;
                $journal_entry->save();

            }
        }

        if($payment_receive->update())
        {

            if(isset($data['invoice_id']))
            {
                $payment_receive_entry = PaymentReceives::find($id)->PaymentReceiveEntryData();
                if($payment_receive_entry->delete())
                {

                }

                $i = 0;
                $payment_receive_entry = [];
                foreach ($data['invoice_id'] as $invoice_id)
                {
                    if($data['invoice_amount'][$i] > 0)
                    {
                        $payment_receive_entry[] = [
                            'amount'                => $data['invoice_amount'][$i],
                            'payment_receives_id'   => $id,
                            'invoice_id'            => $data['invoice_id'][$i],
                            'created_by'            => $user_id,
                            'updated_by'            => $user_id,
                            'created_at'            => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at'            => \Carbon\Carbon::now()->toDateTimeString(),
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
            $journal_entry = PaymentReceives::find($id)->JournalEntry();
            if($journal_entry->delete())
            {

            }
            $journal_entry = new JournalEntry;
            $journal_entry->note                = $data['note'];
            $journal_entry->debit_credit        = 1;
            $journal_entry->amount              = $data['amount'];
            $journal_entry->account_name_id     = $data['account_id'];
            $journal_entry->jurnal_type         = "payment_receive2";
            $journal_entry->payment_receives_id = $id;
            $journal_entry->created_by          = $user_id;
            $journal_entry->updated_by          = $user_id;
            $journal_entry->save();

            $journal_entry = new JournalEntry;
            $journal_entry->note                = $data['note'];
            $journal_entry->debit_credit        = 0;
            $journal_entry->amount              = $data['amount'];
            $journal_entry->account_name_id     = 27;
            $journal_entry->jurnal_type         = "payment_receive2";
            $journal_entry->payment_receives_id = $id;
            $journal_entry->created_by          = $user_id;
            $journal_entry->updated_by          = $user_id;
            $journal_entry->save();

            if(isset($data['invoice_id']))
            {
                for($i = 0; $i < count($data['invoice_id']); $i++)
                {
                    if($data['invoice_amount'][$i]>0)
                    {
                        $journal_entry = new JournalEntry;
                        $journal_entry->note                = $data['note'];
                        $journal_entry->debit_credit        = 0;
                        $journal_entry->amount              = $data['invoice_amount'][$i];
                        $journal_entry->account_name_id     = 11;
                        $journal_entry->jurnal_type         = "payment_receive1";
                        $journal_entry->payment_receives_id = $id;
                        $journal_entry->invoice_id          = $data['invoice_id'][$i];
                        $journal_entry->created_by          = $user_id;
                        $journal_entry->updated_by          = $user_id;
                        $journal_entry->save();

                        $journal_entry = new JournalEntry;
                        $journal_entry->note                = $data['note'];
                        $journal_entry->debit_credit        = 1;
                        $journal_entry->amount              = $data['invoice_amount'][$i];
                        $journal_entry->account_name_id     = 27;
                        $journal_entry->jurnal_type         = "payment_receive1";
                        $journal_entry->payment_receives_id = $id;
                        $journal_entry->invoice_id          = $data['invoice_id'][$i];
                        $journal_entry->created_by          = $user_id;
                        $journal_entry->updated_by          = $user_id;
                        $journal_entry->save();
                    }
                }

                if (DB::table('payment_receives_entries')->insert($payment_receive_entry))
                {
                    $helper = new \App\Lib\Helpers;
                    $helper->updateDueInvoiceAfterPaymentReceive($data);

                    return redirect()
                        ->route('payment_received')
                        ->with('alert.status', 'success')
                        ->with('alert.message', 'Payment receive updated successfully!');
                }
                else
                {

                    return redirect()
                        ->route('payment_received')
                        ->with('alert.status', 'danger')
                        ->with('alert.message', 'Something went to wrong! please check your input field!!!');
                }
            }

            return redirect()
                ->route('payment_received')
                ->with('alert.status', 'success')
                ->with('alert.message', 'Payment receive updated successfully!');

            //end journal entry transaction...
        }

        return redirect()
            ->route('payment_received')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Something went to wrong! please check your input field!!!');
    }


    public function download($id)
    {
       $data = PaymentReceives::find($id);
        $download_url = $data->file_url;
        $download_link = public_path($download_url);
        return response()->download($download_link);

    }

    public function destroy($id)
    {
        $pr_entries = PaymentReceiveEntryModel::where('payment_receives_id', $id)->get();
        //return $pr_entries;
        foreach ($pr_entries as $pr_entry)
        {
            $invoice = Invoice::find($pr_entry['invoice_id']);
            $invoice->due_amount = $invoice['due_amount'] + $pr_entry['amount'];
            $invoice->update();
        }
        $PaymentReceive = PaymentReceives::find($id);
        if($PaymentReceive->file_url)
        {
            $delete_path = public_path($PaymentReceive->file_url);
            $delete = unlink($delete_path);
        }

        if($PaymentReceive->delete())
        {
            return redirect()
                ->route('payment_received')
                ->with('alert.status', 'success')
                ->with('alert.message', 'Payment Receive Delete successfully!');
        }
    }

    public function deletePaymentReceiveEntry($id)
    {
        $payment_receive_id = PaymentReceiveEntryModel::find($id)->payment_receives_id;
        
        $amount = PaymentReceiveEntryModel::find($id)->amount;
        $invoice_id = PaymentReceiveEntryModel::find($id)->invoice_id;
        
        $this->updateDueAmountInInvoiceAfterPaymentReceiveEntryDeleteFromInvoice($invoice_id, $amount);
        
        $payment_receive = PaymentReceives::find($payment_receive_id);
        $payment_receive->excess_payment = $payment_receive['excess_payment'] + $amount;
        if($payment_receive->update())
        {
            $payment_receive_entry = PaymentReceiveEntryModel::find($id);
            if($payment_receive_entry->delete())
            {
                JournalEntry::where('jurnal_type', 'paymentreceive1')
                    ->where('payment_receives_id', $payment_receive_id)
                    ->where('invoice_id', $invoice_id)
                    ->delete();
                return redirect()
                    ->route('invoice_show', ['id' => $invoice_id])
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Payment Receive Entry Deleted');
            }
        }

        return redirect()
            ->route('invoice_show', ['id' => $invoice_id])
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Something went to wrong');
    }

    public function updateDueAmountInInvoiceAfterPaymentReceiveEntryDeleteFromInvoice($invoice_id, $amount)
    {
        $invoice = Invoice::find($invoice_id);
        $invoice->due_amount = $invoice['due_amount'] + $amount;
        $invoice->update();
    }
}
