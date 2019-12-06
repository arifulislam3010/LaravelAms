<?php

namespace App\Modules\Bank\Http\Controllers;

use App\Lib\BankReport;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\Bank\Bank;
use App\Models\Bank\BankName;

use App\Models\ManualJournal\Journal;
use App\Models\ManualJournal\JournalEntry;
use App\Models\Contact\Contact;
use App\Models\Contact\ContactCategory;
use App\Models\AccountChart\Account;
use App\Models\AccountChart\AccountType;
use App\Models\AccountChart\ParentAccountType;
use App\Models\Tax;
use Carbon\Carbon;
use DateTime;

use App\Models\Moneyin\PaymentReceiveEntryModel;
use App\Models\Moneyin\PaymentReceives;
use App\Models\Moneyin\Invoice;
use App\Models\Branch\Branch;
use App\Models\Inventory\Product;
use App\Models\Inventory\ProductPhase;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemCategory;
use App\Models\Inventory\ProductPhaseItem;
use App\Models\Inventory\ProductPhaseItemAdd;
use App\Models\Inventory\Stock;
use App\Models\OrganizationProfile\OrganizationProfile;
use DB;
use App\Models\PaymentMode\PaymentMode;

use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $banks = Bank::all();


        return view('bank::index',compact('banks'));
    }

    public function create()
    {
        
        $bank_names = Contact::where('contact_category_id',5)->get();


        $accounts = Account::where('account_type_id',5)->get();
        $payment_mode = Account::whereIn('account_type_id',[4,5])->get();
        return view('bank::create', compact('bank_names','accounts','payment_mode'));
    }

    public function store(Request $request)
    {
        $data = $request->all();


     	$this->validate($request, [
	            'type'           => 'required',
	            'bank_name_id'   => 'required',
	            'particulars'    => 'required',
	            'date'           => 'required',
	            'total_amount'   => 'required|numeric',

	            'payment_mode'   => 'required',
	            'account'        => 'required',
        	]);

        DB::beginTransaction();
        try{
            $bankacc = explode('/',$data['bank_name_id']);
               $bank = new Bank;
               if(isset($request->invoice_show))
               {
                   $bank->invoice_show         = 1;
               }else
               {
                   $bank->invoice_show         = 0;
               }

               $bank->type                 = $data['type'];
               $bank->contact_id           = $bankacc[0];
               $bank->particulars          = $data['particulars'];
               $bank->date                 =  date('Y-m-d',strtotime($data['date']));
               $bank->cheque_number        = $data['cheque_number'];
               $bank->total_amount         = $data['total_amount'];
               $bank->notes                = $data['notes'];
               $bank->payment_mode_id      = $data['payment_mode'];
               $bank->account_id           = $bankacc[1];
               $bank->bank_account_number  = isset($data['bank_account_number'])?$data['bank_account_number']:Null;

               if($bank->save())
               {
                   $bank = Bank::orderBy('created_at', 'desc')->first();

                   $journal_entry = new JournalEntry;
                   $journal_entry->amount              = $data['total_amount'];
                   $journal_entry->contact_id           = $bankacc[0];
                   $journal_entry->debit_credit        = $data['type']=='Deposit'?1:0;
                   $journal_entry->account_name_id     = $bankacc[1];
                   $journal_entry->jurnal_type         = 'bank';
                   $journal_entry->bank_id             = $bank->id;
                   $journal_entry->created_by          = 1;
                   $journal_entry->updated_by          = 1;
                   $journal_entry->save();

                   $journal_entry = new JournalEntry;
                   $journal_entry->amount              = $data['total_amount'];
                   $journal_entry->contact_id           = $bankacc[0];
                   $journal_entry->debit_credit        = $data['type']=='Deposit'?0:1;
                   $journal_entry->account_name_id     = $data['payment_mode'];
                   $journal_entry->jurnal_type         = 'bank';
                   $journal_entry->bank_id             = $bank->id;
                   $journal_entry->created_by          = 1;
                   $journal_entry->updated_by          = 1;

                  if($journal_entry->save()){
                      DB::commit();
                      return redirect()
                          ->route('bank')
                          ->with('alert.status', 'success')
                          ->with('alert.message', 'Bank Transaction added successfully!');
                  }else{
                      DB::rollBack();
                      return redirect()
                          ->route('bank')
                          ->with('alert.status', 'danger')
                          ->with('alert.message', 'Something went to wrong! Please Insert Data Again.');
                  }

               }

               else
               {
                   DB::rollBack();
                   return redirect()
                       ->route('bank')
                       ->with('alert.status', 'danger')
                       ->with('alert.message', 'Something went to wrong! Please Insert Data Again.');

               }
           } catch (\Exception $exception){
              DB::rollBack();
               return redirect()
                   ->route('bank')
                   ->with('alert.status', 'danger')
                   ->with('alert.message', 'Something went to wrong! Please Insert Data Again.');
           }

        
    }

    public function show($id)
    {

       
        $bank_names = Contact::where('contact_category_id',5)->get();
        $bank = Bank::find($id);
        $payment_mode = Account::where('id',$bank->payment_mode_id)->first();
        $accounts = Account::where('id',$bank->account_id)->first();


        return view('bank::show', compact('bank','payment_mode','accounts','bank_names'));
    }

    public function edit($id)
    {
        $bank_names = Contact::where('contact_category_id',5)->get();
        $accounts = Account::where('account_type_id',5)->get();
        $payment_mode = Account::whereIn('account_type_id',[4,5])->get();
        $bank = Bank::find($id);
        return view('bank::edit', compact('bank','bank_names','payment_mode','accounts'));
    }

    public function update(Request $request, $id)
    {

            $this->validate($request, [
                'type'           => 'required',
                'bank_name_id'   => 'required',
                'particulars'    => 'required',
                'date'           => 'required',

                'total_amount'   => 'required|numeric',

                'payment_mode'   => 'required',
                'account'        => 'required',
            ]);
        DB::beginTransaction();
          try{

              $data = $request->all();
              $bankacc = explode('/',$data['bank_name_id']);
              $bank = Bank::find($id);

              if(isset($request->invoice_show))
              {
                  $bank->invoice_show         = 1;
              }else
              {
                  $bank->invoice_show         = 0;
              }


              $bank->type                 = $data['type'];
              $bank->contact_id           = $bankacc[0];
              $bank->particulars          = $data['particulars'];
              $bank->date                 =   date('Y-m-d',strtotime($data['date']));
              $bank->cheque_number        = $data['cheque_number'];
              $bank->total_amount         = $data['total_amount'];
              $bank->notes                = $data['notes'];
              $bank->payment_mode_id      = $data['payment_mode'];
              $bank->account_id           = $bankacc[1];
              $bank->bank_account_number  = isset($data['bank_account_number'])?$data['bank_account_number']:Null;

              if($bank->update())
              {
                  JournalEntry::where('bank_id',$id)->delete();
                  $journal_entry = new JournalEntry;
                  $journal_entry->amount              = $data['total_amount'];
                  $journal_entry->contact_id           = $bankacc[0];
                  $journal_entry->debit_credit        =  $data['type']=='Deposit'?0:1;
                  $journal_entry->account_name_id     = $bankacc[1];
                  $journal_entry->jurnal_type         = 'bank';
                  $journal_entry->bank_id             = $bank->id;
                  $journal_entry->created_by          = 1;
                  $journal_entry->updated_by          = 1;
                  $journal_entry->save();

                  $journal_entry = new JournalEntry;
                  $journal_entry->amount              = $data['total_amount'];
                  $journal_entry->contact_id           = $bankacc[0];
                  $journal_entry->debit_credit        =  $data['type']=='Deposit'?1:0;
                  $journal_entry->account_name_id     = $data['payment_mode'];
                  $journal_entry->jurnal_type         = 'bank';
                  $journal_entry->bank_id             = $bank->id;
                  $journal_entry->created_by          = 1;
                  $journal_entry->updated_by          = 1;

                  if($journal_entry->save()){
                      DB::commit();
                      return redirect()
                          ->route('bank_edit', ['id' => $id])
                          ->with('alert.status', 'success')
                          ->with('alert.message', 'Bank updated successfully!');
                  }else{
                      DB::rollBack();
                      return redirect()
                          ->route('bank_edit', ['id' => $id])
                          ->with('alert.status', 'danger')
                          ->with('alert.message', 'Something went to wrong! please check your input field!!!');
                  }




              }

              else
              {
                  DB::rollBack();
                  return redirect()
                      ->route('bank_edit', ['id' => $id])
                      ->with('alert.status', 'danger')
                      ->with('alert.message', 'Something went to wrong! please check your input field!!!');
              }
        }catch (\Exception $exception){
              DB::rollBack();
              return redirect()
                  ->route('bank_edit', ['id' => $id])
                  ->with('alert.status', 'danger')
                  ->with('alert.message', 'Something went to wrong! please check your input field!!!');
          }


    }

    public function destroy($id)
    {
        

        $bank = Bank::find($id);

        if($bank->delete())
        {
            return redirect()
                ->route('bank')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Bank Transaction deleted successfully!!!');
        }

    }




    // report -----------

    public function report()
    {


        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-30 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+0 day')->format('Y-m-d');


        $bank= JournalEntry::join('contact', 'journal_entries.account_name_id', '=', 'contact.account_id')->where('contact.contact_category_id',5)->groupBy('journal_entries.account_name_id')->get();

         return view('bank::bank_report',compact('OrganizationProfile','start','end','bank'));

    }

    public function bankreportfilter(Request $request)
    {

        $this->validate($request, [
            'from_date'           => 'required',
            'to_date'   => 'required',

        ]);
        $OrganizationProfile = OrganizationProfile::find(1);

        $start = $request->from_date;
        $end = $request->to_date;

        $bank= JournalEntry::join('contact', 'journal_entries.account_name_id', '=', 'contact.account_id')->where('contact.contact_category_id',5)->groupBy('journal_entries.account_name_id')->get();

        return view('bank::bank_report',compact('OrganizationProfile','start','end','bank'));

    }


    public function reportDetails($id,$start=null,$end=null)
    {
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = $start;
        $end = date('Y-m-d', strtotime($end . ' +1 day'));


        $bank= JournalEntry::where('account_name_id',$id)->whereBetween('created_at',array($start,$end))->get();


        $bank_name = Contact::where('account_id',$id)->first();

        $end = date('Y-m-d', strtotime($end . ' -1 day'));
        return view('bank::report_details',compact('OrganizationProfile','start','end','bank_report','bank','bank_name','id'));
    }

    public function reportDetailsbyfilter($id,$start=null,$end=null)
    {


        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = $start;
        $end =$end;


        $bank= JournalEntry::where('contact_id',$id)->whereBetween('created_at',array($start,$end))->get();
        $bank_name =  Contact::find($id);

        return view('bank::report_details',compact('OrganizationProfile','start','end','bank_report','bank','bank_name'));
    }

    public function processfilterForm(Request $request, $id) {
        $start  = $request->from_date ;
        $end = $request->to_date;
        $id=  $id;

        return Redirect::to('bank/report'.'/'.$id.'/'.$start.'/'.$end) ;
    }
}
