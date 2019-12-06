<?php

namespace App\Modules\Expense\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\MoneyOut\Expense;
use App\Models\Contact\Contact;
use App\Models\AccountChart\Account;
use App\Models\Tax;
use App\Models\ManualJournal\JournalEntry;
use App\Models\OrganizationProfile\OrganizationProfile;

class ExpenseWebController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('expense::expense.index', compact('expenses'));
    }
    
    public function create()
    {
        $customers = Contact::all();
        $accounts = Account::all();
        $paid_throughs = Account::where('account_type_id',4)->get();
        return view('expense::expense.create', compact('customers', 'accounts', 'taxes', 'paid_throughs'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'expense_date'      => 'required',
            'account_id'        => 'required',
            'amount'            => 'required',
            'tax_id'            => 'required',
            'amount_is'         => 'required',
            'customer_id'       => 'required',
            'amount_is'         => 'required',
            'paid_through_id'   => 'required',
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

        $expense = new Expense;
        $expense->date              = date("Y-m-d", strtotime($data['expense_date']));
        $expense->amount            = round($data['amount'], 2);
        $expense->paid_through_id   = $data['paid_through_id'];
        $expense->tax_total         = round($total_tax, 2);
        $expense->reference         = $data['reference'];
        $expense->note              = $data['customer_note'];
        $expense->account_id        = $data['account_id'];
        $expense->vendor_id         = $data['customer_id'];
        $expense->tax_id            = $data['tax_id'];
        $expense->tax_type          = $data['amount_is'];
        $expense->created_by        = $user_id;
        $expense->updated_by        = $user_id;

        if(isset($data['bank_info']))
        {
            $expense->bank_info = $data['bank_info'];
        }

        if(isset($data['invoice_show']))
        {
            $expense->invoice_show = "on";
        }

        if($expense->save())
        {
            $expense = Expense::orderBy('created_at', 'desc')->first();
            $expense_id = $expense['id'];
            $status = $this->insertExpenseInJournal($total_tax, $data['amount'], $data, $expense_id);
            if($status)
            {
                return redirect()
                    ->route('expense')
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'Expense added successfully!');
            }
            else
            {
                $expense = Expense::find($expense_id);
                $expense->delete();
                {
                    return redirect()
                        ->route('expense')
                        ->with('alert.status', 'danger')
                        ->with('alert.message', 'Something went to wrong! Please check your input field');
                }
            }

        }
    }


    public function show($id)
    {
        $expense = Expense::find($id);
        $expenses = Expense::all();
        $OrganizationProfile = OrganizationProfile::find(1);

        return view('expense::expense.show', compact('OrganizationProfile','expense', 'expenses'));
    }


    public function edit($id)
    {
        $expense = Expense::find($id);
        $customers = Contact::all();
        $accounts = Account::all();
        $paid_throughs = Account::where('account_type_id',4)->get();
        return view('expense::expense.edit', compact('customers', 'accounts', 'taxes', 'paid_throughs','expense'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->validate($request, [
            'expense_date'      => 'required',
            'account_id'        => 'required',
            'amount'            => 'required',
            'tax_id'            => 'required',
            'amount_is'         => 'required',
            'customer_id'       => 'required',
            'amount_is'         => 'required',
            'paid_through_id'   => 'required',
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

        $expense = Expense::find($id);
        $expense->date              =  date("Y-m-d", strtotime($data['expense_date']));
        $expense->amount            = round($data['amount'], 2);
        $expense->paid_through_id   = $data['paid_through_id'];
        $expense->tax_total         = round($total_tax, 2);
        $expense->reference         = $data['reference'];
        $expense->note              = $data['customer_note'];
        $expense->account_id        = $data['account_id'];
        $expense->vendor_id         = $data['customer_id'];
        $expense->tax_id            = $data['tax_id'];
        $expense->tax_type          = $data['amount_is'];
        $expense->created_by        = $user_id;
        $expense->updated_by        = $user_id;
        
        if(isset($data['bank_info']))
        {
            $expense->bank_info = $data['bank_info'];
        }

        if(isset($data['invoice_show']))
        {
            $expense->invoice_show = "on";
        }
        else
        {
            $expense->invoice_show = "";
        }

        if($expense->update())
        {
            $status = $this->updateExpenseInJournal($total_tax, $data['amount'], $data, $id);
            if($status)
            {
                return redirect()
                    ->route('expense')
                    ->with('alert.status', 'success')
                    ->with('alert.message', 'Expense updated successfully!');
            }
            else
            {
                $expense = Expense::find($id);
                $expense->delete();
                {
                    return redirect()
                        ->route('expense')
                        ->with('alert.status', 'danger')
                        ->with('alert.message', 'Something went to wrong! Please check your input field');
                }
            }

        }
    }


    public function destroy($id)
    {
        $expense = Expense::find($id);
        if($expense->delete())
        {
            return redirect()
                ->route('expense')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Expense deleted successfully!!!');
        }

        return redirect()
            ->route('expense')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Something went to wrong!!!');

    }

    public function insertExpenseInJournal($total_tax, $total_amount, $data, $expense_id)
    {
        $user_id = Auth::user()->id;

        $journal_entry = new JournalEntry;
        $journal_entry->debit_credit    = 0;
        $journal_entry->amount          = round(($total_tax + $total_amount) , 2);
        $journal_entry->jurnal_type    = "expense";
        $journal_entry->account_name_id = $data['paid_through_id'];
        $journal_entry->contact_id      = $data['customer_id'];
        $journal_entry->note            = $data['customer_note'];
        $journal_entry->expense_id      = $expense_id;
        $journal_entry->created_by      = $user_id;
        $journal_entry->updated_by      = $user_id;

        if($journal_entry->save())
        {
            $journal_entry = new JournalEntry;
            $journal_entry->debit_credit    = 1;
            $journal_entry->amount          = round($total_amount, 2);
            $journal_entry->jurnal_type    = "expense";
            $journal_entry->account_name_id = $data['account_id'];
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->note            = $data['customer_note'];
            $journal_entry->expense_id      = $expense_id;
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;

            if($journal_entry->save())
            {
                $journal_entry = new JournalEntry;
                $journal_entry->debit_credit    = 1;
                $journal_entry->amount          = round($total_tax, 2);
                $journal_entry->jurnal_type    = "expense";
                $journal_entry->account_name_id = 9;
                $journal_entry->contact_id      = $data['customer_id'];
                $journal_entry->note            = $data['customer_note'];
                $journal_entry->expense_id      = $expense_id;
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

    public function updateExpenseInJournal($total_tax, $total_amount, $data, $expense_id)
    {
        $user_id = Auth::user()->id;

        $expense_entries_delete = Expense::find($expense_id)->journalEntries();

        if($expense_entries_delete->delete())
        {

        }

        $journal_entry = new JournalEntry;
        $journal_entry->debit_credit    = 0;
        $journal_entry->amount          = round(($total_tax + $total_amount), 2);
        $journal_entry->jurnal_type    = "expense";
        $journal_entry->account_name_id = $data['paid_through_id'];
        $journal_entry->contact_id      = $data['customer_id'];
        $journal_entry->note            = $data['customer_note'];
        $journal_entry->expense_id      = $expense_id;
        $journal_entry->created_by      = $user_id;
        $journal_entry->updated_by      = $user_id;

        if($journal_entry->save())
        {
            $journal_entry = new JournalEntry;
            $journal_entry->debit_credit    = 1;
            $journal_entry->amount          = round($total_amount, 2);
            $journal_entry->jurnal_type    = "expense";
            $journal_entry->account_name_id = $data['account_id'];
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->note            = $data['customer_note'];
            $journal_entry->expense_id      = $expense_id;
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;

            if($journal_entry->save())
            {
                $journal_entry = new JournalEntry;
                $journal_entry->debit_credit    = 1;
                $journal_entry->amount          = round($total_tax, 2);
                $journal_entry->jurnal_type    = "expense";
                $journal_entry->account_name_id = 9;
                $journal_entry->contact_id      = $data['customer_id'];
                $journal_entry->note            = $data['customer_note'];
                $journal_entry->expense_id      = $expense_id;
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
