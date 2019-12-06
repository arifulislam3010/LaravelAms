<?php

namespace App\Modules\Manualjournal\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ManualJournalRequest;

use App\Models\ManualJournal\Journal;
use App\Models\ManualJournal\JournalEntry;
use App\Models\Contact\Contact;
use App\Models\Contact\ContactCategory;
use App\Models\AccountChart\Account;
use App\Models\Tax;

use Illuminate\Support\Facades\Auth;

use DB;

class ManualJournalWebController extends Controller
{
    public function index()
    {
        $journals = Journal::all();
        return view('manualjournal::manual_journal.index', compact('journals'));
    }

    public function create()
    {
        $contacts = Contact::all();
        $accounts = Account::all();
        $taxs     = Tax::all();
        return view('manualjournal::manual_journal.create', compact('contacts', 'accounts', 'taxs'));
    }

    public function store(ManualJournalRequest $request)
    {

        //return $request->all();

        $this->validate($request, [
            'tax_id.*' => 'required',
        ]);

        try
        {
            $data = $request->all();

            //return $data;

            $user_id = Auth::user()->id;

            //for debit credit match...
            $debit_total = 0;
            $credit_total = 0;
            $i = 0;
            foreach ($data['account'] as $account) {

                if (isset($data['debit'][$i])) {
                    $debit_total = $debit_total + $data['debit'][$i];
                } else {
                    $credit_total = $credit_total + $data['credit'][$i];
                }
                $i++;
            }

            //return $debit_total + $data['tax_debit_total'];


            if($debit_total + $data['tax_debit_total'] != $credit_total + $data['tax_credit_total'])
            {
                return "Debit Credit Does not match";
            }
            //end debit credit match


            $journal = new Journal;

            $journal->date          = date("Y-m-d",strtotime($data['date']));
            $journal->reference     = $data['reference'];
            $journal->note          = $data['note'];
            $journal->branch_id     = 1;
            $journal->created_by    = $user_id;
            $journal->updated_by    = $user_id;

            $journal_entry = [];

            if($journal->save())
            {

                // find last journal add
                $journal = Journal::orderBy('created_at', 'desc')->first();
                $journal_id = $journal['id'];


                $i = 0;
                foreach ($data['account'] as $account)
                {

                    if(isset($data['debit'][$i]))
                    {
                        $debit_credit = 1;
                        $amount = $data['debit'][$i];
                    }
                    else
                    {
                        $debit_credit = 0;
                        $amount = $data['credit'][$i];
                    }


                    $journal_entry[] = [
                        'note'              => $data['description'][$i],
                        'debit_credit'      => $debit_credit,
                        'amount'            => $amount,
                        'journal_id'        => $journal_id,
                        'jurnal_type'       => "journal",
                        'account_name_id'   => $account,
                        'contact_id'        => $data['contact_id'][$i],
                        'tax_id'            => $data['tax_id'][$i],
                        'created_by'        => $user_id,
                        'updated_by'        => $user_id,
                        'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                    ];

                    $i++;
                }

                if (DB::table('journal_entries')->insert($journal_entry))
                {
                    $tax_journal_entry = new JournalEntry();
                    $tax_journal_entry->note            = $data['note'];
                    $tax_journal_entry->debit_credit    = 1;
                    $tax_journal_entry->amount          = $data['tax_debit_total'];
                    $tax_journal_entry->journal_id      = $journal_id;
                    $tax_journal_entry->jurnal_type     = "journal";
                    $tax_journal_entry->account_name_id = 9;
                    $tax_journal_entry->created_by      = $user_id;
                    $tax_journal_entry->updated_by      = $user_id;
                    $tax_journal_entry->save();

                    $tax_journal_entry = new JournalEntry();
                    $tax_journal_entry->note            = $data['note'];
                    $tax_journal_entry->debit_credit    = 0;
                    $tax_journal_entry->amount          = $data['tax_credit_total'];
                    $tax_journal_entry->journal_id      = $journal_id;
                    $tax_journal_entry->jurnal_type     = "journal";
                    $tax_journal_entry->account_name_id = 9;
                    $tax_journal_entry->created_by      = $user_id;
                    $tax_journal_entry->updated_by      = $user_id;
                    $tax_journal_entry->save();

                    return redirect()
                        ->route('journal_create')
                        ->with('alert.status', 'success')
                        ->with('alert.message', 'Journal added successfully!');
                }
                else
                {
                    //delete journal......
                    return redirect()
                        ->route('journal_create')
                        ->with('alert.status', 'danger')
                        ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
                }
            }
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $journal = Journal::find($id);
        $journalEntries = Journal::find($id)->journalEntries()->whereNotIn('account_name_id', [1])->get();
        //return $journalEntries;
        $journal_id = $id;
        $contacts = Contact::all();
        $accounts = Account::all();
        $taxs     = Tax::all();
        return view('manualjournal::manual_journal.edit', compact('journal', 'journalEntries', 'contacts', 'accounts', 'taxs', 'journal_id'));
    }

    public function update(Request $request, $id)
    {
        try
        {
            $data = $request->all();

            $user_id = Auth::user()->id;

            //for debit credit match...
            $debit_total = 0;
            $credit_total = 0;
            $i = 0;
            foreach ($data['account'] as $account) {

                if (isset($data['debit'][$i])) {
                    $debit_total = $debit_total + $data['debit'][$i];
                } else {
                    $credit_total = $credit_total + $data['credit'][$i];
                }
                $i++;
            }

            if($debit_total + $data['tax_debit_total'] != $credit_total + $data['tax_credit_total'])
            {
                return "Debit Credit Does not match";
            }
            //end debit credit match

            //return "ok";




            //return $data;

            $journal = Journal::find($id);

            $created_by = $journal->created_by;

            $journal->date          = date("Y-m-d",strtotime($data['date']));
            $journal->reference     = $data['reference'];
            $journal->note          = $data['note'];
            $journal->branch_id     = 1;
            $journal->created_by    = $created_by;
            $journal->updated_by    = $user_id;


            $journal_entry_update = [];
            if($journal->update())
            {
                $journal_entry = Journal::find($id)->journalEntries();

                if($journal_entry->delete())
                {
                    $i = 0;
                    foreach ($data['account'] as $account)
                    {
                        if(isset($data['debit'][$i]))
                        {
                            $debit_credit = 1;
                            $amount = $data['debit'][$i];
                        }
                        else
                        {
                            $debit_credit = 0;
                            $amount = $data['credit'][$i];
                        }

                        $journal_entry_update[] = [
                            'note'              => $data['description'][$i],
                            'debit_credit'      => $debit_credit,
                            'amount'            => $amount,
                            'journal_id'        => $id,
                            'account_name_id'   => $account,
                            'contact_id'        => $data['contact_id'][$i],
                            'tax_id'            => $data['tax_id'][$i],
                            'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                        ];

                        $i++;
                    }



                    if(DB::table('journal_entries')->insert($journal_entry_update))
                    {
                        return redirect()
                            ->route('journal_edit', ['id' => $id])
                            ->with('alert.status', 'success')
                            ->with('alert.message', 'Journal added successfully!');

                    }
                    else
                    {
                        return redirect()
                            ->route('journal_edit', ['id' => $id])
                            ->with('alert.status', 'danger')
                            ->with('alert.message', 'Something went to wrong!!! Please check your input correctly...');
                    }
                }
            }

            return redirect()
                ->route('journal_edit', ['id' => $id])
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Something went to wrong!!! Please check your input correctly...');
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try
        {
            $journal = Journal::find($id);
            if($journal->delete())
            {
                return redirect()->route('journal');
            }
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }



    public function used(Request $request)
    {

    }
}
