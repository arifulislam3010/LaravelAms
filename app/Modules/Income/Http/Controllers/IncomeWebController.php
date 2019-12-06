<?php

namespace App\Modules\Income\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Moneyin\Income;
use App\Models\Contact\Contact;
use App\Models\AccountChart\Account;
use App\Models\Tax;
use App\Models\ManualJournal\JournalEntry;

class IncomeWebController extends Controller
{
    public function index()
    {
        $incomes = Income::all();
        return view('income::income.index', compact('incomes'));
    }

    public function create()
    {
        $customers = Contact::all();
        $accounts = Account::all();
        $received_throughs = Account::wherein('account_type_id',array(4,5))->get();
        return view('income::income.create', compact('customers', 'accounts', 'taxes', 'received_throughs'));
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $this->validate($request, [
            'income_date'           => 'required',
            'account_id'            => 'required',
            'amount'                => 'required',
            'tax_id'                => 'required',
            'amount_is'             => 'required',
            'customer_id'           => 'required',
            'amount_is'             => 'required',
            'receive_through_id'    => 'required',
        ]);
        DB::beginTransaction();
        $total_tax = 0;
        $user_id = Auth::user()->id;

        $tax_amount = Tax::find($data['tax_id'])->amount_percentage;
        if($data['amount_is'] == 1)
        {
            $total_tax = ($data['amount']*($tax_amount/100));
        }
        else
        {
            $total_tax = ($data['amount']*($tax_amount/110));
        }

        $income = new Income;
        $income->date                   = date('Y-m-d',strtotime($data['income_date']));
        $income->amount                 = round($data['amount'], 2);
        $income->receive_through_id     = $data['receive_through_id'];
        $income->tax_total              = round($total_tax, 2);
        $income->reference              = $data['reference'];
        $income->note                   = $data['customer_note'];
        $income->account_id             = $data['account_id'];
        $income->customer_id            = $data['customer_id'];
        $income->tax_id                 = $data['tax_id'];
        $income->tax_type               = $data['amount_is'];
        $income->created_by             = $user_id;
        $income->updated_by             = $user_id;

        if(isset($data['bank_info']))
        {
            $income->bank_info = $data['bank_info'];
        }

        if(isset($data['invoice_show']))
        {
            $income->invoice_show = "on";
        }

        if($income->save())
        {
            $income = Income::orderBy('created_at', 'desc')->first();
            $income_id = $income['id'];
            $status = $this->insertIncomeInJournal($total_tax, $data['amount'], $data, $income_id);
            if($status)
            {
                DB::commit();
                return redirect()
                    ->route('income')
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'Income added successfully!');
            }
            else
            {

                $income = Income::find($income_id);
                $income->delete();
                {
                    DB::rollBack();
                    return redirect()
                        ->route('income')
                        ->with('alert.status', 'danger')
                        ->with('alert.message', 'Something went to wrong! Please check your input field');
                }
            }

        }
    }


    public function show($id)
    {
        $income = Income::find($id);
        $incomes = Income::all();

        return view('income::income.show', compact('income', 'incomes'));
    }


    public function edit($id)
    {
        $income = Income::find($id);
        $customers = Contact::all();
        $accounts = Account::all();
        $receive_throughs = Account::whereIn('account_type_id',array(4,5))->get();
        return view('income::income.edit', compact('customers', 'accounts', 'taxes', 'receive_throughs','income'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->validate($request, [
            'income_date'           => 'required',
            'account_id'            => 'required',
            'amount'                => 'required',
            'tax_id'                => 'required',
            'amount_is'             => 'required',
            'customer_id'           => 'required',
            'amount_is'             => 'required',
            'receive_through_id'    => 'required',
        ]);

        $total_tax = 0;
        $user_id = Auth::user()->id;

        $tax_amount = Tax::find($data['tax_id'])->amount_percentage;
        if($data['amount_is'] == 1)
        {
            $total_tax = ($data['amount']*($tax_amount/100));
        }
        else
        {
            $total_tax = ($data['amount']*($tax_amount/110));
        }

        $income = Income::find($id);
        $income->date                   = date('Y-m-d',strtotime($data['income_date']));
        $income->amount                 = round($data['amount'], 2);
        $income->receive_through_id     = $data['receive_through_id'];
        $income->tax_total              = round($total_tax, 2);
        $income->reference              = $data['reference'];
        $income->note                   = $data['customer_note'];
        $income->account_id             = $data['account_id'];
        $income->customer_id            = $data['customer_id'];
        $income->tax_id                 = $data['tax_id'];
        $income->tax_type               = $data['amount_is'];
        $income->created_by             = $user_id;
        $income->updated_by             = $user_id;

        if(isset($data['bank_info']))
        {
            $income->bank_info = $data['bank_info'];
        }

        if(isset($data['invoice_show']))
        {
            $income->invoice_show = "on";
        }
        else
        {
            $income->invoice_show = "";
        }

        if($income->update())
        {
            $status = $this->updateIncomeInJournal($total_tax, $data['amount'], $data, $id);
            if($status)
            {
                return redirect()
                    ->route('income')
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'Income updated successfully!');
            }
            else
            {
                $income = Income::find($id);
                $income->delete();
                {
                    return redirect()
                        ->route('income')
                        ->with('alert.status', 'danger')
                        ->with('alert.message', 'Something went to wrong! Please check your input field');
                }
            }

        }
    }


    public function destroy($id)
    {
        $income = Income::find($id);
        if($income->delete())
        {
            return redirect()
                ->route('income')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Income deleted successfully!!!');
        }

        return redirect()
            ->route('income')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Something went to wrong!!!');

    }

    public function insertIncomeInJournal($total_tax, $total_amount, $data, $income_id)
    {
        $user_id = Auth::user()->id;

        $journal_entry = new JournalEntry;
        $journal_entry->debit_credit    = 1;
        $journal_entry->amount          = round(($total_tax + $total_amount) , 2);
        $journal_entry->jurnal_type    = "income";
        $journal_entry->account_name_id = $data['receive_through_id'];
        $journal_entry->contact_id      = $data['customer_id'];
        $journal_entry->note            = $data['customer_note'];
        $journal_entry->income_id       = $income_id;
        $journal_entry->created_by      = $user_id;
        $journal_entry->updated_by      = $user_id;

        if($journal_entry->save())
        {
            $journal_entry = new JournalEntry;
            $journal_entry->debit_credit    = 0;
            $journal_entry->amount          = round($total_amount, 2);
            $journal_entry->jurnal_type    = "income";
            $journal_entry->account_name_id = $data['account_id'];
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->note            = $data['customer_note'];
            $journal_entry->income_id       = $income_id;
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;

            if($journal_entry->save())
            {
                $journal_entry = new JournalEntry;
                $journal_entry->debit_credit    = 0;
                $journal_entry->amount          = round($total_tax, 2);
                $journal_entry->jurnal_type    = "income";
                $journal_entry->account_name_id = 9;
                $journal_entry->contact_id      = $data['customer_id'];
                $journal_entry->note            = $data['customer_note'];
                $journal_entry->income_id       = $income_id;
                $journal_entry->created_by      = $user_id;
                $journal_entry->updated_by      = $user_id;

                if($journal_entry->save())
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function updateIncomeInJournal($total_tax, $total_amount, $data, $income_id)
    {
        $user_id = Auth::user()->id;

        $income_entries_delete = Income::find($income_id)->journalEntries();

        if($income_entries_delete->delete())
        {

        }

        $journal_entry = new JournalEntry;
        $journal_entry->debit_credit    = 1;
        $journal_entry->amount          = round(($total_tax + $total_amount), 2);
        $journal_entry->jurnal_type    = "income";
        $journal_entry->account_name_id = $data['receive_through_id'];
        $journal_entry->contact_id      = $data['customer_id'];
        $journal_entry->note            = $data['customer_note'];
        $journal_entry->income_id       = $income_id;
        $journal_entry->created_by      = $user_id;
        $journal_entry->updated_by      = $user_id;

        if($journal_entry->save())
        {
            $journal_entry = new JournalEntry;
            $journal_entry->debit_credit    = 0;
            $journal_entry->amount          = round($total_amount, 2);
            $journal_entry->jurnal_type    = "income";
            $journal_entry->account_name_id = $data['account_id'];
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->note            = $data['customer_note'];
            $journal_entry->income_id       = $income_id;
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;

            if($journal_entry->save())
            {
                $journal_entry = new JournalEntry;
                $journal_entry->debit_credit    = 0;
                $journal_entry->amount          = round($total_tax, 2);
                $journal_entry->jurnal_type    = "income";
                $journal_entry->account_name_id = 9;
                $journal_entry->contact_id      = $data['customer_id'];
                $journal_entry->note            = $data['customer_note'];
                $journal_entry->income_id       = $income_id;
                $journal_entry->created_by      = $user_id;
                $journal_entry->updated_by      = $user_id;

                if($journal_entry->save())
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}
