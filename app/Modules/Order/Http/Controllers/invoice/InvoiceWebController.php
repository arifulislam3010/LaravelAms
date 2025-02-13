<?php


namespace App\Modules\Order\Http\Controllers\invoice;

use App\Models\ManualJournal\JournalEntry;
use App\Models\Moneyin\InvoiceEntry;
use App\Models\Recruit\Recruitorder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

use DB;

use App\Models\Moneyin\Invoice;
use App\Models\Contact\Contact;
use App\Models\ManualJournal\Journal;
use App\Models\ManualJournal\JournalEntries;
use App\Models\Moneyin\ExcessPayment;
use App\Models\Moneyin\PaymentReceiveEntryModel;
use App\Models\Moneyin\PaymentReceives;
use App\Models\Moneyin\CreditNotePayment;
use App\Models\Moneyin\CreditNote;
use App\Models\OrganizationProfile\OrganizationProfile;
use Illuminate\Support\Facades\Redirect;

class InvoiceWebController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice::invoice.index',compact('invoices'));
    }

    public function create($order=null)
    {
        $order = $order;

        $customers = Contact::all();
        $invoices = Invoice::all();
        if(count($invoices)>0)
        {
            $invoice = Invoice::all()->last()->id;

            $invoice_number = $invoice['invoice_number'];
            $invoice_number = $invoice_number + 1;
        }
        else
        {
            $invoice_number = 1;
        }

        $invoice_number = str_pad($invoice_number, 6, '0', STR_PAD_LEFT);
        return view('order::invoice.create', compact('customers','invoice_number','order'));
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'customer_id'    => 'required',
            'invoice_number' => 'required',
            'invoice_date'   => 'required',
            'due_date'       => 'required',
            'item_id.*'      => 'required',
            'quantity.*'     => 'required',
            'rate.*'         => 'required',
            'tax_id.*'       => 'required',
            'amount.*'       => 'required',
            'account_id'     => 'required',
        ]);

        try
        {
            $data = $request->all();
            //return $data;
            $user_id = Auth::user()->id;

            $helper = new \App\Lib\Helpers;

            $status1 = $helper->checkItemQuantity($data);
            if(!$status1)
            {
                return redirect()
                    ->route('invoice')
                    ->with('alert.status', 'danger')
                    ->with('alert.message', 'Quantity is not available for item Item_name. Only Item_quantity is available!!!');
            }
            
            $invoice = new Invoice;

            if($request->hasFile('file'))
            {
                $file = $request->file('file');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/invoice',$new_file_name);

                if($success)
                {
                    $invoice->file_url = 'uploads/invoice/'.$new_file_name;
                    $invoice->file_name = $new_file_name;
                }
            }

            $invoice->invoice_number    = $data['invoice_number'];
            $invoice->invoice_date      = $data['invoice_date'];
            $invoice->payment_date      = $data['due_date'];
            $invoice->customer_note     = $data['customer_note'];
            $invoice->tax_total         = $data['tax_total'];
            $invoice->shipping_charge   = $data['shipping_charge'];
            $invoice->adjustment        = $data['adjustment'];
            $invoice->total_amount      = $data['total_amount'];
            $invoice->customer_id       = $data['customer_id'];
            $invoice->created_by        = $user_id;
            $invoice->updated_by        = $user_id;

            if($invoice->save())
            {
                $invoice = Invoice::orderBy('created_at', 'desc')->first();
                $invoice_id = $invoice['id'];

                $i = 0;
                if($request->order_id){
                    $order= Recruitorder::find($request->order_id);

                    $order->invoice_id= $invoice_id;
                    $order->save();

                }


                foreach ($data['item_id'] as $account)
                {
                    if(!$data['discount'][$i])
                    {
                        $invoice_entry[] = [
                            'quantity'          => $data['quantity'][$i],
                            'rate'              => $data['rate'][$i],
                            'amount'            => $data['amount'][$i],
                            'discount'          => 0,
                            'item_id'           => $data['item_id'][$i],
                            'invoice_id'        => $invoice_id,
                            'tax_id'            => $data['tax_id'][$i],
                            'account_id'        => $data['account_id'][$i],
                            'created_by'        => $user_id,
                            'updated_by'        => $user_id,
                            'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                        ];
                    }
                    else
                    {
                        $invoice_entry[] = [
                            'quantity'          => $data['quantity'][$i],
                            'rate'              => $data['rate'][$i],
                            'amount'            => $data['amount'][$i],
                            'discount'          => $data['discount'][$i],
                            'item_id'           => $data['item_id'][$i],
                            'invoice_id'        => $invoice_id,
                            'tax_id'            => $data['tax_id'][$i],
                            'account_id'        => $data['account_id'][$i],
                            'created_by'        => $user_id,
                            'updated_by'        => $user_id,
                            'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                        ];
                    }


                    $i++;
                }

                if (DB::table('invoice_entries')->insert($invoice_entry))
                {
                    $status = $this->insertManualJournalEntries($data);
                    if($status)
                    {
                        $status2 = $helper->updateItemAfterCreatingInvoice($data);
                        if($status2)
                        {
                            return redirect()
                                ->route('invoice')
                                ->with('alert.status', 'success')
                                ->with('alert.message', 'Invoice added successfully!');
                        }

                    }

                }


            }
//
//            elseif($invoice->save())
//            {
//
//                $order=Recruitorder::find($id);
//                $order->invoice_id=$invoice->id;
//                $order->save();
//
//            }
            return redirect()
                ->route('invoice')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Something went to wrong! Please check your input field');
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function show($id,$order)
    {


        if($id==0)
        {
           return Redirect::route('order_invoice_create',['order' => $order]);
        }else {


            $invoice = Invoice::find($id);
            $payment_receive_entries = PaymentReceiveEntryModel::where('invoice_id', $id)->get();
            $credit_receive_entries = CreditNotePayment::where('invoice_id', $id)->get();
            $excess_receive_entries = ExcessPayment::where('invoice_id', $id)->get();
            $invoices = Invoice::all();
            $invoice_entries = InvoiceEntry::where('invoice_id', $id)->get();
            $sub_total = 0;
            $OrganizationProfile = OrganizationProfile::find(1);
            foreach ($invoice_entries as $invoice_entry) {
                $sub_total = $sub_total + $invoice_entry->amount;
            }
            return Redirect::route('invoice_show',['id' => $id]);
           // return view('invoice::invoice.show', compact('invoice', 'invoice_entries', 'sub_total', 'invoices', 'payment_receive_entries', 'credit_receive_entries', 'excess_receive_entries', 'OrganizationProfile'));
        }
    }

    public function edit($id)
    {
        $customers = Contact::all();
        $invoice = Invoice::find($id);
        return view('invoice::invoice.edit', compact('customers', 'invoice'));
    }

    public function update(Request $request, $id)
    {
        //return $request->all();
        $this->validate($request, [
            'customer_id'    => 'required',
            'invoice_number' => 'required',
            'invoice_date'   => 'required',
            'due_date'       => 'required',
            'item_id.*'      => 'required',
            'quantity.*'     => 'required',
            'rate.*'         => 'required',
            'tax_id.*'       => 'required',
            'amount.*'       => 'required',
        ]);

        try
        {
            $data = $request->all();
            //return $data;
            $user_id = Auth::user()->id;

            $helper = new \App\Lib\Helpers;
            $helper->updateItemAfterUpdatingInvoice($data);

            $invoice = Invoice::find($id);

            if($request->hasFile('file'))
            {
                $file = $request->file('file');

                if($invoice->file_url)
                {
                    $delete_path = public_path($invoice->file_url);
                    $delete = unlink($delete_path);
                }

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/invoice',$new_file_name);

                if($success)
                {
                    $invoice->file_url = 'uploads/invoice/'.$new_file_name;
                    $invoice->file_name = $new_file_name;
                }
            }

            $invoice->invoice_number    = $data['invoice_number'];
            $invoice->invoice_date      = $data['invoice_date'];
            $invoice->payment_date      = $data['due_date'];
            $invoice->customer_note     = $data['customer_note'];
            $invoice->tax_total         = $data['tax_total'];
            $invoice->shipping_charge    = $data['shipping_charge'];
            $invoice->adjustment        = $data['adjustment'];
            $invoice->total_amount      = $data['total_amount'];
            $invoice->customer_id       = $data['customer_id'];
            $invoice->created_by        = $user_id;
            $invoice->updated_by        = $user_id;

            $invoice_entry_update = [];
            if($invoice->update())
            {
                $invoice_entry = Invoice::find($id)->invoiceEntries();

                if($invoice_entry->delete())
                {

                }
                $i = 0;
                foreach ($data['item_id'] as $account)
                {

                    if(!$data['discount'][$i])
                    {
                        $invoice_entry_update[] = [
                            'quantity'      => $data['quantity'][$i],
                            'rate'          => $data['rate'][$i],
                            'amount'        => $data['amount'][$i],
                            'discount'      => 0,
                            'item_id'       => $data['item_id'][$i],
                            'invoice_id'    => $id,
                            'tax_id'        => $data['tax_id'][$i],
                            'account_id'    => $data['account_id'][$i],
                            'created_by'    => $user_id,
                            'updated_by'    => $user_id,
                            'created_at'    => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at'    => \Carbon\Carbon::now()->toDateTimeString(),
                        ];
                    }
                    else
                    {
                        $invoice_entry_update[] = [
                            'quantity'      => $data['quantity'][$i],
                            'rate'          => $data['rate'][$i],
                            'amount'        => $data['amount'][$i],
                            'discount'      => $data['discount'][$i],
                            'item_id'       => $data['item_id'][$i],
                            'invoice_id'    => $id,
                            'tax_id'        => $data['tax_id'][$i],
                            'account_id'    => $data['account_id'][$i],
                            'created_by'    => $user_id,
                            'updated_by'    => $user_id,
                            'created_at'    => \Carbon\Carbon::now()->toDateTimeString(),
                            'updated_at'    => \Carbon\Carbon::now()->toDateTimeString(),
                        ];
                    }

                    $i++;
                }

                if (DB::table('invoice_entries')->insert($invoice_entry_update))
                {
                    $this->updateManualJournalEntries($data,$id);
                    return redirect()
                        ->route('invoice_edit', ['id' => $id])
                        ->with('alert.status', 'success')
                        ->with('alert.message', 'Invoice updated successfully!');
                }
            }
            return redirect()
                ->route('invoice_edit', ['id' => $id])
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Something went to wrong! please check your input field!!!');
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $helper = new \App\Lib\Helpers;
        
        $payment_amount = DB::table('payment_receives_entries')
            ->where('invoice_id', $id)
            ->groupBy('payment_receives_id')
            ->selectRaw('sum(amount) as amount, payment_receives_id')
            ->get();

        foreach ($payment_amount as $value)
        {
            $helper->paymentReceiveBackAfterDeleteInvoice($value->payment_receives_id, $value->amount);
        }


        $credit_note = DB::table('credit_note_payments')
            ->where('invoice_id', $id)
            ->groupBy('credit_note_id')
            ->selectRaw('sum(amount) as amount, credit_note_id')
            ->get();

        foreach ($credit_note as $value)
        {
            $helper->creditNoteBackAfterDeleteInvoice($value->credit_note_id, $value->amount);
        }
        
        
        $items = InvoiceEntry::where('invoice_id', $id)->get();
        foreach ($items as $item)
        {
            $helper->itemBackAfterDeleteInvoice($item->item_id, $item->quantity);
        }

        $invoice = Invoice::find($id);
        if($invoice->delete())
        {
            return redirect()
                ->route('invoice')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Invoice deleted successfully!!!');
        }

    }

    public function insertManualJournalEntries($data)
    {
        $user_id = Auth::user()->id;

        $i = 0;
        $discount = 0;
        $account_array = array_fill(1, 100, 0);
        foreach ($data['item_id'] as $account)
        {
            if($data['discount'][$i] == "")
            {

            }
            else
            {
                $amount = $data['quantity'][$i]*$data['rate'][$i];
                $discount = $discount + ($data['discount'][$i]*$amount)/100;
                //$discount1 = ($data['discount'][$i]*$amount)/100;
            }

            $account_array[$data['account_id'][$i]] =  $account_array[$data['account_id'][$i]] + ($data['quantity'][$i]*$data['rate'][$i]);

            $i++;
        }

        //return $account_array;

        $invoice = Invoice::orderBy('created_at', 'desc')->first();
        $invoice_id = $invoice['id'];

        //insert total amount as debit
        $journal_entry = new JournalEntry;
        $journal_entry->note            = $data['customer_note'];
        $journal_entry->debit_credit    = 1;
        $journal_entry->amount          = $data['total_amount'];
        $journal_entry->account_name_id = 5;
        $journal_entry->jurnal_type     = "invoice";
        $journal_entry->invoice_id      = $invoice_id;
        $journal_entry->contact_id      = $data['customer_id'];
        $journal_entry->created_by      = $user_id;
        $journal_entry->updated_by      = $user_id;

        if($journal_entry->save())
        {

        }
        else
        {
            //delete all journal entry for this invoice...
            $invoice = Invoice::find($invoice_id);
            $invoice->delete();
            return false;
        }

        //insert discount as credit
        if($discount>0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->note            = $data['customer_note'];
            $journal_entry->debit_credit    = 1;
            $journal_entry->amount          = $discount;
            $journal_entry->account_name_id = 21;
            $journal_entry->jurnal_type     = "invoice";
            $journal_entry->invoice_id      = $invoice_id;
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;

            if($journal_entry->save())
            {

            }
            else
            {
                //delete all journal entry for this invoice...
                $invoice = Invoice::find($invoice_id);
                $invoice->delete();
                return false;
            }
        }


        //insert tax total as credit
        if($data['tax_total']>0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->note            = $data['customer_note'];
            $journal_entry->debit_credit    = 0;
            $journal_entry->amount          = $data['tax_total'];
            $journal_entry->account_name_id = 9;
            $journal_entry->jurnal_type     = "invoice";
            $journal_entry->invoice_id      = $invoice_id;
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;

            if($journal_entry->save())
            {

            }
            else
            {
                //delete all journal entry for this invoice...
                $invoice = Invoice::find($invoice_id);
                $invoice->delete();
                return false;
            }
        }

        //insert shipping charge as credit
        if($data['shipping_charge']>0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->note            = $data['customer_note'];
            $journal_entry->debit_credit    = 0;
            $journal_entry->amount          = $data['shipping_charge'];
            $journal_entry->account_name_id = 20;
            $journal_entry->jurnal_type     = "invoice";
            $journal_entry->invoice_id      = $invoice_id;
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;

            if($journal_entry->save())
            {

            }
            else
            {
                //delete all journal entry for this invoice...
                $invoice = Invoice::find($invoice_id);
                $invoice->delete();
                return false;
            }
        }


        //insert adjustment as credit
        if($data['adjustment'] != 0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->note                = $data['customer_note'];
            if($data['adjustment']>0)
            {
                $journal_entry->debit_credit    = 0;
            }
            else
            {
                $journal_entry->debit_credit    = 1;
            }
            $journal_entry->amount              = abs($data['adjustment']);
            $journal_entry->account_name_id     = 18;
            $journal_entry->jurnal_type         = "invoice";
            $journal_entry->invoice_id          = $invoice_id;
            $journal_entry->contact_id          = $data['customer_id'];
            $journal_entry->created_by          = $user_id;
            $journal_entry->updated_by          = $user_id;

            if($journal_entry->save())
            {

            }
            else
            {
                //delete all journal entry for this invoice...
                $invoice = Invoice::find($invoice_id);
                $invoice->delete();
                return false;
            }
        }


        //return $account_array;
        $invoice_entry = [];
        for($j = 1; $j<count($account_array)-2; $j++) {
            if ($account_array[$j] != 0)
            {
                $invoice_entry[] = [
                    'note'              => $data['customer_note'],
                    'debit_credit'      => 0,
                    'amount'            => $account_array[$j],
                    'account_name_id'   => $j,
                    'jurnal_type'       => 'invoice',
                    'invoice_id'        => $invoice_id,
                    'contact_id'        => $data['customer_id'],
                    'created_by'        => $user_id,
                    'updated_by'        => $user_id,
                    'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                ];

            }
        }

        if (DB::table('journal_entries')->insert($invoice_entry))
        {
            return true;
        }
        else
        {
            //delete all journal entry for this invoice...
            $invoice = Invoice::find($invoice_id);
            $invoice->delete();
            return false;
        }

        return false;

    }
    
    
    public function updateManualJournalEntries($data, $id)
    {

        $invoice_entries_delete = Invoice::find($id)->journalEntries();

        if($invoice_entries_delete->delete())
        {

        }

        $user_id = Auth::user()->id;
        $i = 0;
        $discount = 0;
        $account_array = array_fill(1, 100, 0);
        foreach ($data['item_id'] as $account)
        {
            if($data['discount'][$i] == "")
            {
                $amount = $data['quantity'][$i]*$data['rate'][$i];
                $discount = $discount + (0*$amount)/100;
                $discount1 = ($data['discount'][$i]*$amount)/100;
            }
            else
            {
                $amount = $data['quantity'][$i]*$data['rate'][$i];
                $discount = $discount + ($data['discount'][$i]*$amount)/100;
                $discount1 = ($data['discount'][$i]*$amount)/100;
            }

            $account_array[$data['account_id'][$i]] =  $account_array[$data['account_id'][$i]] + ($data['quantity'][$i]*$data['rate'][$i])-$discount1;

            $i++;
        }

        $invoice = Invoice::orderBy('created_at', 'desc')->first();
        $invoice_id = $invoice['id'];

        //insert total amount as debit
        $journal_entry = new JournalEntry;
        $journal_entry->note            = $data['customer_note'];
        $journal_entry->debit_credit    = 1;
        $journal_entry->amount          = $data['total_amount'];
        $journal_entry->account_name_id = 5;
        $journal_entry->jurnal_type     = "invoice";
        $journal_entry->invoice_id      = $invoice_id;
        $journal_entry->contact_id      = $data['customer_id'];
        $journal_entry->created_by      = $user_id;
        $journal_entry->updated_by      = $user_id;

        if($journal_entry->save())
        {

        }
        else
        {
            //delete all journal entry for this invoice...
        }

        //insert discount as credit
        if($discount>0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->note            = $data['customer_note'];
            $journal_entry->debit_credit    = 1;
            $journal_entry->amount          = $discount;
            $journal_entry->account_name_id = 21;
            $journal_entry->jurnal_type     = "invoice";
            $journal_entry->invoice_id      = $invoice_id;
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;

            if($journal_entry->save())
            {

            }
            else
            {
                //delete all journal entry for this invoice...
            }
        }
        

        //insert tax total as debit
        if($data['tax_total']>0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->note            = $data['customer_note'];
            $journal_entry->debit_credit    = 0;
            $journal_entry->amount          = $data['tax_total'];
            $journal_entry->account_name_id = 9;
            $journal_entry->jurnal_type     = "invoice";
            $journal_entry->invoice_id      = $invoice_id;
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;

            if($journal_entry->save())
            {

            }
            else
            {
                //delete all journal entry for this invoice...
            }
        }
        

        //insert shipping charge as credit
        if($data['shipping_charge']>0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->note            = $data['customer_note'];
            $journal_entry->debit_credit    = 0;
            $journal_entry->amount          = $data['shipping_charge'];
            $journal_entry->account_name_id = 20;
            $journal_entry->jurnal_type     = "invoice";
            $journal_entry->invoice_id      = $invoice_id;
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;

            if($journal_entry->save())
            {

            }
            else
            {
                //delete all journal entry for this invoice...
            }
        }
        

        //insert adjustment as credit
        if($data['adjustment'] != 0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->note            = $data['customer_note'];
            if($data['adjustment']>0)
            {
                $journal_entry->debit_credit    = 0;
            }
            else
            {
                $journal_entry->debit_credit    = 1;
            }
            $journal_entry->amount          = abs($data['adjustment']);
            $journal_entry->account_name_id = 18;
            $journal_entry->jurnal_type     = "invoice";
            $journal_entry->invoice_id      = $invoice_id;
            $journal_entry->contact_id      = $data['customer_id'];
            $journal_entry->created_by      = $user_id;
            $journal_entry->updated_by      = $user_id;

            if($journal_entry->save())
            {

            }
            else
            {
                //delete all journal entry for this invoice...
            }
        }
        

        //return $account_array;

        $invoice_entry = [];
        for($j = 1; $j<count($account_array)-2; $j++) {
            if ($account_array[$j] != 0)
            {
                $invoice_entry[] = [
                    'note'              => $data['customer_note'],
                    'debit_credit'      => 0,
                    'amount'            => $account_array[$j],
                    'account_name_id'   => $j,
                    'jurnal_type'       => 'invoice',
                    'invoice_id'        => $invoice_id,
                    'contact_id'        => $data['customer_id'],
                    'created_by'        => $user_id,
                    'updated_by'        => $user_id,
                    'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                ];

            }
        }

        if (DB::table('journal_entries')->insert($invoice_entry))
        {
            return "successfull...";
        }
        else
        {
            //delete all journal entry for this invoice...
        }

        return "error";
    }

    public function useCredit(Request $request)
    {
        $data = $request->all();
        $i = 0;
        foreach ($data['credit_amount'] as $credit_amount)
        {
            if($credit_amount)
            {
                $credit_note = CreditNote::find($data['credit_note_id'][$i]);
                $credit_note->available_credit = ($credit_note['available_credit'] - $credit_amount);
                $credit_note->update();
            }
            $i++;
        }
        $user_id = Auth::user()->id;

        $credit_note_payment_entry = [];
        for($i = 0; $i < count($data['credit_amount']); $i++) {
            if (!$data['credit_amount'][$i])
            {
                continue;
            }

            $credit_note_payment_entry[] = [
                'amount'            => $data['credit_amount'][$i],
                'invoice_id'        => $data['invoice_id'],
                'credit_note_id'    => $data['credit_note_id'][$i],
                'created_by'        => $user_id,
                'updated_by'        => $user_id,
                'created_at'        => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'        => \Carbon\Carbon::now()->toDateTimeString(),
            ];
        }

        if (DB::table('credit_note_payments')->insert($credit_note_payment_entry))
        {
            return redirect()
                ->route('invoice_show', ['id' => $data['invoice_id']])
                ->with('alert.status', 'success')
                ->with('alert.message', 'Credit notes used successfully!');
        }
        
        return redirect()
            ->route('invoice_show', ['id' => $data['invoice_id']])
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Something went to wrong! please check your input field!!!');
    }

    public function useExcessPayment(Request $request)
    {
        $data = $request->all();
        //return $data;
        $user_id = Auth::user()->id;
        $helper = new \App\Lib\Helpers;
        $i = 0;
        foreach ($data['excess_payment_amount'] as $excess_payment_amount)
        {
            if($excess_payment_amount)
            {
                $helper->updatePaymentReceiveEntryAfterExcessAmountUse($data['invoice_id'], $data['payment_receive_id'][$i], $excess_payment_amount, $user_id);

                $payment_receive = PaymentReceives::find($data['payment_receive_id'][$i]);
                $payment_receive->excess_payment = ($payment_receive['excess_payment'] - $excess_payment_amount);
                $payment_receive->update();
            }
            $i++;
        }


        $i = 0;
        foreach ($data['excess_payment_amount'] as $excess_payment_amount)
        {
            if($excess_payment_amount)
            {
                $helper->addOrUpdateJournalEntry($data['invoice_id'], $data['payment_receive_id'][$i], $excess_payment_amount, $user_id);
            }
            $i++;
        }

        return redirect()
            ->route('invoice_show', ['id' => $data['invoice_id']])
            ->with('alert.status', 'success')
            ->with('alert.message', 'Excess notes used successfully!');
    }

    public function download($attachment)
    {
        $download_link = public_path('uploads/invoice/'.$attachment);
        return response()->download($download_link);
    }
    
    
}
