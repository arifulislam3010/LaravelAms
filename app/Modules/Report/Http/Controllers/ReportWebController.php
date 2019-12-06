<?php

namespace App\Modules\Report\Http\Controllers;

use App\Lib\BalanceSheet;
use App\Lib\Report;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManualJournalRequest;

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
use DatePeriod;
use DateInterval;
use App\Models\Moneyin\PaymentReceiveEntryModel;
use App\Models\Moneyin\PaymentReceives;
use App\Models\Moneyin\Invoice;
use App\Models\Moneyin\InvoiceEntry;
use App\Models\Branch\Branch;
use App\Models\Inventory\Product;
use App\Models\Inventory\ProductPhase;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemCategory;
use App\Models\Inventory\ProductPhaseItem;
use App\Models\Inventory\ProductPhaseItemAdd;
use App\Models\Inventory\Stock;
use App\Models\OrganizationProfile\OrganizationProfile;
use App\Models\PaymentMode\PaymentMode;
use DB;
class ReportWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountTransactions()
    {
        $accounts = Account::all();

        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-0 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $begin_time = (new DateTime($current_time))->modify('-999999 day')->format('Y-m-d');

        $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->get();
        $opening_debit =  JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$begin_time,$start])->where('debit_credit',1)->get();
        $opening_credit =  JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$begin_time,$start])->where('debit_credit',0)->get();
        $opening_balance = $opening_debit[0]['amount'] - $opening_credit[0]['amount'];

        $OrganizationProfile = OrganizationProfile::find(1);
        return view('report::account_transactions',compact('JournalEntry','start','end','accounts','OrganizationProfile','opening_balance'));
    }

    
    public function accountTransactionsSearch(Request $request)
    {
        $accounts = Account::all();

        $start = date("Y-m-d",strtotime($request->input('from_date'))).' '.'00:00:00';
        
        $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day")).' '.'00:00:00';
        $data = $request->all();
        $OrganizationProfile = OrganizationProfile::find(1);
        if($data['report_account_id']>0)
        {

            $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->where('account_name_id',$request->report_account_id)->get();
            $opening_debit =  JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$start,$end])->where('debit_credit',1)->where('account_name_id',$request->report_account_id)->get();
            $opening_credit =  JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$start,$end])->where('debit_credit',0)->where('account_name_id',$request->report_account_id)->get();
            $opening_balance = $opening_debit[0]['amount'] - $opening_credit[0]['amount'];
        }else
        {

            $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->get();
            $opening_debit =  JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$start,$end])->where('debit_credit',1)->get();
            $opening_credit =  JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$start,$end])->where('debit_credit',0)->get();
            $opening_balance = $opening_debit[0]['amount'] - $opening_credit[0]['amount'];
        }

        return view('report::account_transactions',compact('JournalEntry','start','end','accounts','OrganizationProfile','opening_balance'));
    }

    public function accountTransactionsAccountSearch($id)
    {
         $accounts = Account::all();

        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-0 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $begin_time = (new DateTime($current_time))->modify('-999999 day')->format('Y-m-d');

        $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->where('account_name_id',$id)->get();
        $opening_debit =  JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$begin_time,$start])->where('debit_credit',1)->where('account_name_id',$id)->get();
        $opening_credit =  JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$begin_time,$start])->where('debit_credit',0)->where('account_name_id',$id)->get();
        $opening_balance = $opening_debit[0]['amount'] - $opening_credit[0]['amount'];

        $OrganizationProfile = OrganizationProfile::find(1);
        return view('report::account_transactions',compact('JournalEntry','start','end','accounts','OrganizationProfile','opening_balance'));

    }



    public function accountGeneralLedger()
    {

        $accounts = Account::orderby('account_name', 'ASC')->get();
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-0 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $begin_time = (new DateTime($current_time))->modify('-999999 day')->format('Y-m-d');

        $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->get();
        $OpeningJournalEntry =  JournalEntry::whereBetween('created_at',[$begin_time,$start])->get();
        return view('report::account_general_ledger',compact('JournalEntry','start','end','accounts','OrganizationProfile','OpeningJournalEntry'));
    }

    
    public function accountGeneralLedgerSearch(Request $request)
    {
        $OrganizationProfile = OrganizationProfile::find(1);
        $accounts = Account::orderby('account_name', 'ASC')->get();
        $start = date("Y-m-d",strtotime($request->input('from_date')));
        $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day"));
        $current_time = Carbon::now()->toDayDateTimeString();
        
        $begin_time = (new DateTime($current_time))->modify('-999999 day')->format('Y-m-d');

        $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->get();
        $OpeningJournalEntry =  JournalEntry::whereBetween('created_at',[$begin_time,$start])->get();

        return view('report::account_general_ledger',compact('JournalEntry','start','end','accounts','OrganizationProfile','OpeningJournalEntry'));
    }




    public function accountJournal()
    {
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-30 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->get();
        $journal = [];
        $k = 0;
        foreach ($JournalEntry  as $JournalEntryData)
        {

                if($JournalEntryData->jurnal_type == 'invoice') {

                    $i = 0;
                    foreach ($journal as $journalData) {
                        if ($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->invoice_id) {
                            $i = 1;
                        }else{
                            $i = 2;
                        }
                    }
                    if($i == 0 || $i == 2)
                    {
                        $journal[$k++] = [

                            'journal_type' => $JournalEntryData->jurnal_type,
                            'journal_id' => $JournalEntryData->invoice_id,
                        ];
                    }


                }elseif($JournalEntryData->jurnal_type == "paymentreceive2" || $JournalEntryData->jurnal_type == "paymentreceive1")
                {

                    $i = 0;
                    foreach ($journal as $journalData) {

                        if ($journalData['journal_id'] == $JournalEntryData->payment_receives_id) {
                          $i = 1;
                        }else{
                            $i = 2;
                        }
                    }
                    if($i == 0 || $i == 2)
                    {
                        $journal[$k++] = [

                            'journal_type' => $JournalEntryData->jurnal_type,
                            'journal_id' => $JournalEntryData->payment_receives_id,
                        ];
                    }
                }elseif($JournalEntryData->jurnal_type == "bill")
                {
                    $i = 0;
                    foreach ($journal as $journalData) {
                        if ($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->bill_id) {
                            $i = 1;
                        }else{
                            $i = 2;
                        }
                    }
                    if($i == 0 || $i == 2)
                    {
                        $journal[$k++] = [

                            'journal_type' => $JournalEntryData->jurnal_type,
                            'journal_id' => $JournalEntryData->bill_id,
                        ];
                    }
                }elseif($JournalEntryData->jurnal_type == "11" || $JournalEntryData->jurnal_type == "12")
                {
                    $i = 0;
                    foreach ($journal as $journalData) {
                        if ($journalData['journal_id'] == $JournalEntryData->credit_note_id) {
                            $i = 1;
                        }else{
                            $i = 2;
                        }
                    }
                    if($i == 0 || $i == 2)
                    {
                        $journal[$k++] = [

                            'journal_type' => $JournalEntryData->jurnal_type,
                            'journal_id' => $JournalEntryData->credit_note_id,
                        ];
                    }
                }elseif($JournalEntryData->jurnal_type == "journal")
                {

                    $i = 0;
                    foreach ($journal as $journalData) {

                        if ($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->journal_id) {
                            $i = 1;
                        }else{
                            $i = 2;
                        }
                    }
                    if($i == 0 || $i == 2)
                    {
                        $journal[$k++] = [

                            'journal_type' => $JournalEntryData->jurnal_type,
                            'journal_id' => $JournalEntryData->journal_id,
                        ];
                    }

                }elseif($JournalEntryData->jurnal_type == "bank")
                {

                    $i = 0;
                    foreach ($journal as $journalData) {

                        if ($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->bank_id) {
                            $i = 1;
                        }else{
                            $i = 2;
                        }
                    }
                    if($i == 0 || $i == 2)
                    {
                        $journal[$k++] = [

                            'journal_type' => $JournalEntryData->jurnal_type,
                            'journal_id' => $JournalEntryData->bank_id,
                        ];
                    }

                }

        }

        return view('report::account_journal',compact('JournalEntry','start','end','OrganizationProfile','journal'));
    }

    
    public function accountJournalSearch(Request $request)
    {
        $OrganizationProfile = OrganizationProfile::find(1);
        $start = date("Y-m-d",strtotime($request->input('from_date')));
        $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day"));
        $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->get();

        $journal = [];
        $k = 0;
        foreach ($JournalEntry  as $JournalEntryData)
        {

            if($JournalEntryData->jurnal_type == 'invoice') {

                $i = 0;
                foreach ($journal as $journalData) {
                    if ($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->invoice_id) {
                        $i = 1;
                    }else{
                        $i = 2;
                    }
                }
                if($i == 0 || $i == 2)
                {
                    $journal[$k++] = [

                        'journal_type' => $JournalEntryData->jurnal_type,
                        'journal_id' => $JournalEntryData->invoice_id,
                    ];
                }


            }elseif($JournalEntryData->jurnal_type == "paymentreceive2" || $JournalEntryData->jurnal_type == "paymentreceive1")
            {

                $i = 0;
                foreach ($journal as $journalData) {

                    if ($journalData['journal_id'] == $JournalEntryData->	payment_receives_id) {
                        $i = 1;
                    }else{
                        $i = 2;
                    }
                }
                if($i == 0 || $i == 2)
                {
                    $journal[$k++] = [

                        'journal_type' => $JournalEntryData->jurnal_type,
                        'journal_id' => $JournalEntryData->	payment_receives_id,
                    ];
                }
            }elseif($JournalEntryData->jurnal_type == "bill")
            {
                $i = 0;
                foreach ($journal as $journalData) {
                    if ($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->bill_id) {
                        $i = 1;
                    }else{
                        $i = 2;
                    }
                }
                if($i == 0 || $i == 2)
                {
                    $journal[$k++] = [

                        'journal_type' => $JournalEntryData->jurnal_type,
                        'journal_id' => $JournalEntryData->bill_id,
                    ];
                }
            }elseif($JournalEntryData->jurnal_type == "11" || $JournalEntryData->jurnal_type == "12")
            {
                $i = 0;
                foreach ($journal as $journalData) {
                    if ($journalData['journal_id'] == $JournalEntryData->credit_note_id) {
                        $i = 1;
                    }else{
                        $i = 2;
                    }
                }
                if($i == 0 || $i == 2)
                {
                    $journal[$k++] = [

                        'journal_type' => $JournalEntryData->jurnal_type,
                        'journal_id' => $JournalEntryData->credit_note_id,
                    ];
                }
            }elseif($JournalEntryData->jurnal_type == "journal")
            {

                $i = 0;
                foreach ($journal as $journalData) {

                    if ($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->journal_id) {
                        $i = 1;
                    }else{
                        $i = 2;
                    }
                }
                if($i == 0 || $i == 2)
                {
                    $journal[$k++] = [

                        'journal_type' => $JournalEntryData->jurnal_type,
                        'journal_id' => $JournalEntryData->journal_id,
                    ];
                }

            }elseif($JournalEntryData->jurnal_type == "payment_made")
            {

                $i = 0;
                foreach ($journal as $journalData) {

                    if ($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->payment_made_id) {
                        $i = 1;
                    }else{
                        $i = 2;
                    }
                }
                if($i == 0 || $i == 2)
                {
                    $journal[$k++] = [

                        'journal_type' => $JournalEntryData->jurnal_type,
                        'journal_id' => $JournalEntryData->payment_made_id,
                    ];
                }

            }elseif($JournalEntryData->jurnal_type == "expense")
            {

                $i = 0;
                foreach ($journal as $journalData) {

                    if ($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->expense_id) {
                        $i = 1;
                    }else{
                        $i = 2;
                    }
                }
                if($i == 0 || $i == 2)
                {
                    $journal[$k++] = [

                        'journal_type' => $JournalEntryData->jurnal_type,
                        'journal_id' => $JournalEntryData->expense_id,
                    ];
                }

            }

        }
        return view('report::account_journal',compact('JournalEntry','start','end','Journal','OrganizationProfile','journal'));
    }



    public function accountTrialBalance()
    {
        $account = Account::all(); 
        $accountType = AccountType::all();
        $parentAccountType = ParentAccountType::all();
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-30 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->get();
        return view('report::account_trial_balance',compact('JournalEntry','start','end','OrganizationProfile','account','accountType','parentAccountType'));
    }

    
    public function accountTrialBalanceSearch(Request $request)
    {
        $OrganizationProfile = OrganizationProfile::find(1);
        $account = Account::all(); 
        $accountType = AccountType::all();
        $parentAccountType = ParentAccountType::all();
        $start = date("Y-m-d",strtotime($request->input('from_date')));
        $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day"));
        $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->get();
        return view('report::account_trial_balance',compact('JournalEntry','start','end','OrganizationProfile','account','accountType','parentAccountType'));
    }


    public function ProfitLoss()
    {
        $accounts = Account::all();
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-14 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->get();

      //  dd($JournalEntry);
        return view('report::profit_loss',compact('JournalEntry','start','end','accounts','OrganizationProfile'));
    }
    public function ProfitAndLoss()
    {
        $accounts = Account::all();
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = date('d-M-Y',strtotime(date('Y-01-01')));
        $end = date('d-M-Y',strtotime(date('Y-12-31')));

       $operatingincome = Account::where('account_type_id',15)->get();
       $costofgoods = Account::where('account_type_id',18)->get();
       $operatingExpense = Account::where('account_type_id',17)->get();
       $nonoperatingix = Account::whereIn('account_type_id',array(16,19))->get();



        //  dd($JournalEntry);
        return view('report::profitloss.profit_loss',compact('start','end','accounts','OrganizationProfile','operatingincome','costofgoods','operatingExpense','nonoperatingix'));
    }

    public function BalanceAndSheet()
    {
        $accounts = Account::all();
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = date('Y-m-d',strtotime(date('Y-01-01')));
        $end = date('Y-m-d');

        $BalanceSheet=new BalanceSheet();
        $BalanceSheet->setDate($start,$end);
        $netprofit =  new Report();
        $netprofit->definedate($start,$end);
        $Totalnetprofit= $netprofit->netprofit();

        $current_asset=$BalanceSheet->current_asset();
        $cash=$BalanceSheet->cash();
        $others_asset=$BalanceSheet->others_asset();
        $others_current_asset=$BalanceSheet->others_current_asset();
        $bank=$BalanceSheet->bank();
        $stock=$BalanceSheet->stock();
        $FixedAsset=$BalanceSheet->FixedAsset();

        $currentLibilities=$BalanceSheet->currentLibilities();
        $longTermLibilities=$BalanceSheet->longTermLibilities();
        $currentYearEarning=$BalanceSheet->currentYearEarning();
        $start = date('d-M-Y',strtotime(date('Y-01-01')));
        $end = date('d-M-Y');
      return view('report::BalanceSheet.index',compact('currentYearEarning','longTermLibilities','currentLibilities','FixedAsset','stock','bank','others_current_asset' ,'others_asset','cash','current_asset','start','end','accounts','OrganizationProfile','Totalnetprofit'));
    }
    public function BalanceAndSheetbyfilter(Request $request)
    {
        $end = $request->to_date;
        $year = date('Y',strtotime($end));
        $accounts = Account::all();
        $OrganizationProfile = OrganizationProfile::find(1);
        $start = date('Y-m-d', strtotime("first day of january " . date($year)));

        $BalanceSheet=new BalanceSheet();
        $BalanceSheet->setDate($start,$end);
        $netprofit =  new Report();
        $netprofit->definedate($start,$end);
        $Totalnetprofit= $netprofit->netprofit();

        $current_asset=$BalanceSheet->current_asset();
        $cash=$BalanceSheet->cash();
        $others_asset=$BalanceSheet->others_asset();
        $others_current_asset=$BalanceSheet->others_current_asset();
        $bank=$BalanceSheet->bank();
        $stock=$BalanceSheet->stock();
        $FixedAsset=$BalanceSheet->FixedAsset();

        $currentLibilities=$BalanceSheet->currentLibilities();
        $longTermLibilities=$BalanceSheet->longTermLibilities();
        $currentYearEarning=$BalanceSheet->currentYearEarning();
        $start = date('d-M-Y',strtotime($start));
        $end =  date('d-M-Y',strtotime($end));
        return view('report::BalanceSheet.index',compact('currentYearEarning','longTermLibilities','currentLibilities','FixedAsset','stock','bank','others_current_asset' ,'others_asset','cash','current_asset','start','end','accounts','OrganizationProfile','Totalnetprofit'));
    }

    public function ProfitAndLossbyfilter(Request $request)
    {
        $accounts = Account::all();
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = $request->from_date?$request->from_date:date('d-M-Y',strtotime(date('Y-01-01')));;
        $end = $request->to_date?$request->to_date:$start;

        $start = date('d-M-Y',strtotime($start));
        $end = date('d-M-Y',strtotime($end));
       $operatingincome = Account::where('account_type_id',15)->get();
       $costofgoods = Account::where('account_type_id',18)->get();
       $operatingExpense = Account::where('account_type_id',17)->get();
       $nonoperatingix = Account::whereIn('account_type_id',array(16,19))->get();



         // dd($request->all());
        return view('report::profitloss.profit_lossbyfilter',compact('start','end','accounts','OrganizationProfile','operatingincome','costofgoods','operatingExpense','nonoperatingix'));
    }



    public function CashFlowStatement()
    {
        $accounts = Account::all();
        $OrganizationProfile = OrganizationProfile::find(1);

        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-14 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->get();
        return view('report::cash_flow_statement',compact('JournalEntry','start','end','accounts','OrganizationProfile'));
    }



    public function BalanceSheet()
    {
        $accounts = Account::all();
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-14 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $JournalEntry =  JournalEntry::whereBetween('created_at',[$start,$end])->get();
        // foreach ($JournalEntry as $key ) {

        //     return $JournalEntry->AccountType->id;
            
        // }
        return view('report::balance_sheet',compact('JournalEntry','start','end','accounts','OrganizationProfile'));
    }



    public function customer()
    {
        $accounts = Account::all();
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-14 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $invoice =  Invoice::select('customer_id', DB::raw('count(*) as total'),DB::raw('SUM(total_amount) as total_sales'))->whereBetween('created_at',[$start,$end])->groupBy('customer_id')->get();
        $paymentreceives =  PaymentReceives::select('customer_id', DB::raw('count(*) as total'),DB::raw('SUM(amount) as total_receives'),DB::raw('SUM(excess_payment) as total_excess_payment'))->whereBetween('created_at',[$start,$end])->groupBy('customer_id')->get();
        $customerReport = [];
        foreach ($invoice as $key => $invoiceData) {
            $count = 0;
            foreach ($paymentreceives as $key => $paymentreceivesData) {
                if ($invoiceData->customer_id == $paymentreceivesData->customer_id) {
                $count = 1;
                    $customerReport[] =[
                         'customer_id'          => $invoiceData->customer_id,
                         'display_name'         => $invoiceData->customer->display_name,
                         'invoices'             => $invoiceData->total,
                         'total_sales'          => $invoiceData->total_sales,
                         'paymentreceives'      => $paymentreceivesData->total,
                         'total_receives'       => $paymentreceivesData->total_receives,
                         'total_excess_payment' => $paymentreceivesData->total_excess_payment,
                         'due'                  => $invoiceData->total_sales - ($paymentreceivesData->total_receives-$paymentreceivesData->total_excess_payment),
                    ];
                }
            }

             if($count == 0)
            {
                $customerReport[] =[
                     'customer_id'          => $invoiceData->customer_id,
                     'display_name'         => $invoiceData->customer->display_name,
                     'invoices'             => $invoiceData->total,
                     'total_sales'          => $invoiceData->total_sales,
                     'paymentreceives'      => 0,
                     'total_receives'       => 0,
                     'total_excess_payment' => 0,
                     'due'                  => $invoiceData->total_sales,
                ];
            }
        }
        return view('report::customer',compact('customerReport','start','end','accounts','OrganizationProfile'));
    }

    public function customerSearch(Request $request)
    {

        $accounts = Account::all();
        $OrganizationProfile = OrganizationProfile::find(1);
        $start = date("Y-m-d",strtotime($request->input('from_date'))).' '.'00:00:00';
        $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day")).' '.'00:00:00';

        $invoice =  Invoice::select('customer_id', DB::raw('count(*) as total'),DB::raw('SUM(total_amount) as total_sales'))->whereBetween('created_at',[$start,$end])->groupBy('customer_id')->get();
        $paymentreceives =  PaymentReceives::select('customer_id', DB::raw('count(*) as total'),DB::raw('SUM(amount) as total_receives'),DB::raw('SUM(excess_payment) as total_excess_payment'))->whereBetween('created_at',[$start,$end])->groupBy('customer_id')->get();
        $customerReport = [];
        foreach ($invoice as $key => $invoiceData) {
            $count = 0;
            foreach ($paymentreceives as $key => $paymentreceivesData) {
                if ($invoiceData->customer_id == $paymentreceivesData->customer_id) {
                    $count = 1;
                    $customerReport[] =[
                         'customer_id'          => $invoiceData->customer_id,
                         'display_name'         => $invoiceData->customer->display_name,
                         'invoices'             => $invoiceData->total,
                         'total_sales'          => $invoiceData->total_sales,
                         'paymentreceives'      => $paymentreceivesData->total,
                         'total_receives'       => $paymentreceivesData->total_receives,
                         'total_excess_payment' => $paymentreceivesData->total_excess_payment,
                         'due'                  => $invoiceData->total_sales - ($paymentreceivesData->total_receives-$paymentreceivesData->total_excess_payment),
                    ];
                }
            }

            if($count==0)
            {
                $customerReport[] =[
                     'customer_id'          => $invoiceData->customer_id,
                     'display_name'         => $invoiceData->customer->display_name,
                     'invoices'             => $invoiceData->total,
                     'total_sales'          => $invoiceData->total_sales,
                     'paymentreceives'      => 0,
                     'total_receives'       => 0,
                     'total_excess_payment' => 0,
                     'due'                  => $invoiceData->total_sales,
                ];
            }
        }
        return view('report::customer',compact('customerReport','start','end','accounts','OrganizationProfile'));
    }

    public function customerDetails($id)
    {
        $accounts = Account::all();
        $contact = Contact::find($id);
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-14 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $paymentMode = PaymentMode::all();




        $invoices =  Invoice::whereBetween('created_at',[$start,$end])->where('customer_id',$id)->get();
        $PaymentReceives = PaymentReceives::where('customer_id',$id)->whereBetween('created_at',[$start,$end])->get();
        $PaymentReceiveEntrysdata = array();
        foreach ($PaymentReceives as $key => $PaymentReceive) {
            $PaymentReceiveEntrysdata[$key] = PaymentReceiveEntryModel::where('payment_receives_id',$PaymentReceive->id)->get();
        }


        $customer_report = [];

        $begin = new DateTime($start);
        $enddate = new DateTime($end);
        $enddate = $enddate->modify( '+1 day' );

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$enddate);
        foreach($daterange as $date){
            foreach ($invoices as $key => $invoice) {
                if($date->format('Y-m-d') == $invoice->updated_at->format('Y-m-d')){
                    $customer_report[] = [
                    'id'              => $invoice->id,
                    'invoice_number'  => $invoice->invoice_number,
                    'type'            => "invoice",
                    'invoice_date'    => $invoice->invoice_date,
                    'payment_date'    => $invoice->payment_date,
                    'total_amount'    => $invoice->total_amount,
                    'created_at'      => $invoice->created_at,
                    'updated_at'      => $invoice->updated_at, 
                    ];    
                }
            }

            foreach ($PaymentReceiveEntrysdata as $key => $PaymentReceiveEntrys) {
            foreach ($PaymentReceiveEntrys as $key => $PaymentReceiveEntry) {

                if($date->format('Y-m-d') == $PaymentReceiveEntry->updated_at->format('Y-m-d')){
                    $customer_report[] = [
                    'id'                     => $PaymentReceiveEntry->id,
                    'invoice_number'         => $PaymentReceiveEntry->invoice->invoice_number,
                    'type'                   => "paymentreceiveinvoice",
                    'payment_receives_id'    => $PaymentReceiveEntry->payment_receives_id,
                    'payment_mode'           => $PaymentReceiveEntry->paymentReceive->payment_mode_id,
                    'amount'                 => $PaymentReceiveEntry->amount,
                    'created_at'             => $PaymentReceiveEntry->created_at,
                    'updated_at'             => $PaymentReceiveEntry->updated_at, 
                    ];
                }
            }
            }

            foreach ($PaymentReceives as $key => $PaymentReceive) {
                if($PaymentReceive->excess_payment > 0)
                {
                    if($date->format('Y-m-d') == $PaymentReceive->updated_at->format('Y-m-d')){
                        $customer_report[] = [
                        'id'                     => $PaymentReceive->id,
                        'type'                   => "paymentreceive",
                        'payment_mode'           => $PaymentReceive->payment_mode_id,
                        'payment_date'           => $PaymentReceive->payment_date,
                        'amount'                 => $PaymentReceive->excess_payment,
                        'created_at'             => $PaymentReceive->created_at,
                        'updated_at'             => $PaymentReceive->updated_at, 
                        ];
                    }
                }
            }
        }
        return view('report::customer_details',compact('customer_report','start','end','accounts','contact','OrganizationProfile'));
    }

    public function customerDetailsSearch(Request $request,$id)
    {
       

        $accounts = Account::all();
        $contact = Contact::find($id);
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = date("Y-m-d",strtotime($request->input('from_date'))).' '.'00:00:00';
        $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day")).' '.'00:00:00';
        $paymentMode = PaymentMode::all();




        $invoices =  Invoice::whereBetween('created_at',[$start,$end])->where('customer_id',$id)->get();
        $PaymentReceives = PaymentReceives::where('customer_id',$id)->whereBetween('created_at',[$start,$end])->get();
        $PaymentReceiveEntrysdata = array();
        foreach ($PaymentReceives as $key => $PaymentReceive) {
            $PaymentReceiveEntrysdata[$key] = PaymentReceiveEntryModel::where('payment_receives_id',$PaymentReceive->id)->get();
        }


        $customer_report = [];

        $begin = new DateTime($start);
        $enddate = new DateTime($end);
        $enddate = $enddate->modify( '+1 day' );

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$enddate);
        foreach($daterange as $date){
            foreach ($invoices as $key => $invoice) {
                if($date->format('Y-m-d') == $invoice->updated_at->format('Y-m-d')){
                    $customer_report[] = [
                    'id'              => $invoice->id,
                    'invoice_number'  => $invoice->invoice_number,
                    'type'            => "invoice",
                    'invoice_date'    => $invoice->invoice_date,
                    'payment_date'    => $invoice->payment_date,
                    'total_amount'    => $invoice->total_amount,
                    'created_at'      => $invoice->created_at,
                    'updated_at'      => $invoice->updated_at, 
                    ];    
                }
            }

            foreach ($PaymentReceiveEntrysdata as $key => $PaymentReceiveEntrys) {
            foreach ($PaymentReceiveEntrys as $key => $PaymentReceiveEntry) {

                if($date->format('Y-m-d') == $PaymentReceiveEntry->updated_at->format('Y-m-d')){
                    $customer_report[] = [
                    'id'                     => $PaymentReceiveEntry->id,
                    'invoice_number'         => $PaymentReceiveEntry->invoice->invoice_number,
                    'type'                   => "paymentreceiveinvoice",
                    'payment_receives_id'    => $PaymentReceiveEntry->payment_receives_id,
                    'payment_mode'           => $PaymentReceiveEntry->paymentReceive->payment_mode_id,
                    'amount'                 => $PaymentReceiveEntry->amount,
                    'created_at'             => $PaymentReceiveEntry->created_at,
                    'updated_at'             => $PaymentReceiveEntry->updated_at, 
                    ];
                }
            }
            }

            foreach ($PaymentReceives as $key => $PaymentReceive) {
                if($PaymentReceive->excess_payment > 0)
                {
                    if($date->format('Y-m-d') == $PaymentReceive->updated_at->format('Y-m-d')){
                        $customer_report[] = [
                        'id'                     => $PaymentReceive->id,
                        'type'                   => "paymentreceive",
                        'payment_mode'           => $PaymentReceive->payment_mode_id,
                        'payment_date'           => $PaymentReceive->payment_date,
                        'amount'                 => $PaymentReceive->excess_payment,
                        'created_at'             => $PaymentReceive->created_at,
                        'updated_at'             => $PaymentReceive->updated_at, 
                        ];
                    }
                }
            }
        }
        return view('report::customer_details',compact('customer_report','start','end','accounts','contact','OrganizationProfile'));

    }


    public function item()
    {

        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-14 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $item =  Item::all();
        return view('report::item',compact('item','start','end','OrganizationProfile'));
    }



    public function itemDetails($id)
    {
        $item =  Item::all();
        $item_report =  Item::find($id);
        $InvoiceEntry = InvoiceEntry::where('item_id',$id)->get();
        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-14 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');

        return view('report::item_details',compact('InvoiceEntry','start','end','item_report','item','OrganizationProfile'));
    }



        // $Product_phase_item_adds_array = [];
        // $Product_phase_item_list_array = [];
        // $i = 0;
        // $j = 0;
        // $OrganizationProfile = OrganizationProfile::find(1);

        // $Product =  Product::find($id);
        // $Product_phases =  Product::find($id)->productPhases;
        // $m = 0;
        // foreach ($Product_phases as $Product_phase) {

        //     $Product_phase_items = ProductPhase::find($Product_phase->id)->productPhaseItems;
        //     $k = 0;

        //     foreach ($Product_phase_items as $Product_phase_item) {

        //         $Product_phase_item_adds = ProductPhaseItem::find($Product_phase_item->id)->productPhaseItemAdds;

                
        //         if(count($Product_phase_item_adds)>0)
        //         {

        //             $Product_phase_item_adds_array[$i++] = $Product_phase_item_adds;

        //         }


        //         foreach ($Product_phase_item_adds as $Product_phase_item_add) {

        //             $item = ProductPhaseItemAdd::find($Product_phase_item_add->id)->item;

        //             if(count($item)>0)
        //             {

        //                 $Product_phase_item_list_array[$i++] = $item;
        //             }
        //         }
        //     }
        // }


        // $all_items = Item::all();
        
        // $item_report = [];
        // $n = 0;
        // foreach ($all_items as $all_item) {
        //     $total = 0;
        //     foreach ($Product_phase_item_adds_array as $Product_phase_item_adds_arrays) {
               
        //         foreach ($Product_phase_item_adds_arrays as $Product_phase_item_adds_arrayss) {
        //             if($all_item->id == $Product_phase_item_adds_arrayss->item_id)
        //             {

        //                 $total = $total+$Product_phase_item_adds_arrayss->total;
        //                 $amount = $all_item->item_sales_rate*$total;
        //                 $item_report[$n] =  [
        //                     'item_id'       => $all_item->id,
        //                     'item_name'     => $all_item->item_name,
        //                     'total'         => $total,
        //                     'amount'        => $amount,
        //                 ];
        //             }
        //        }

        //     }
        //     $n++;
        // }
        


        // $Products =  Product::all();




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cashbook()
    {
        $accounts = Account::all();

        $current_time = Carbon::now()->toDayDateTimeString();

        $start = (new DateTime($current_time))->modify('-0 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $begin_time = (new DateTime($current_time))->modify('-999999 day')->format('Y-m-d');
        $account_type = Account::where('account_type_id',4)->get();
        $JournalEntrys = [];
        
        $total_cash_inhand = 0;
        $total_cash_inhand_debit = 0;
        $total_cash_inhand_credit = 0;
        $total_current_cash_inhand_debit = 0;
        $total_current_cash_inhand_credit = 0;
        foreach ($account_type as $key => $value) {

            $JournalEntrys[] =  JournalEntry::whereBetween('created_at',[$start,$end])->where('account_name_id',$value->id)->get();

            // current cash in hand 
            $current_cash_inhand_debit = JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$start,$end])->where('account_name_id',$value->id)->where('debit_credit',1)->get();
            
            $current_cash_inhand_credit = JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$start,$end])->where('account_name_id',$value->id)->where('debit_credit',0)->get();
            $total_current_cash_inhand_debit = $total_current_cash_inhand_debit+$current_cash_inhand_debit[0]['amount'];
            $total_current_cash_inhand_credit = $total_current_cash_inhand_credit+$current_cash_inhand_credit[0]['amount'];
            $current_cash_in_hand = $total_current_cash_inhand_debit-$total_current_cash_inhand_credit;


            // total cash in hand
            $cash_inhand_debit = JournalEntry::select(DB::raw('SUM(amount) as cash_inhand'))->whereBetween('created_at',[$begin_time,$start])->where('account_name_id',$value->id)->where('debit_credit',1)->get();
            $cash_inhand_credit = JournalEntry::select(DB::raw('SUM(amount) as cash_inhand'))->whereBetween('created_at',[$begin_time,$start])->where('account_name_id',$value->id)->where('debit_credit',0)->get();

            $total_cash_inhand_debit = $total_cash_inhand_debit+(int)$cash_inhand_debit[0]['cash_inhand'];
            $total_cash_inhand_credit = $total_cash_inhand_credit+(int)$cash_inhand_credit[0]['cash_inhand'];
            $total_cash_inhand = $total_cash_inhand_debit-$total_cash_inhand_credit;
          
        }

        $OrganizationProfile = OrganizationProfile::find(1);
        return view('report::cash_book',compact('JournalEntrys','start','end','accounts','OrganizationProfile','total_cash_inhand','current_cash_in_hand','total_current_cash_inhand_debit','total_current_cash_inhand_credit','total_cash_inhand_debit','total_cash_inhand_credit'));
    }


    public function cashbooksearch(Request $request)
    {
        $accounts = Account::all();

        $current_time = Carbon::now()->toDayDateTimeString();
        $start = date("Y-m-d",strtotime($request->input('from_date'))).' '.'00:00:00';
        $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day")).' '.'00:00:00';

        $begin_time = (new DateTime($current_time))->modify('-999999 day')->format('Y-m-d');
        $account_type = Account::where('account_type_id',4)->get();
        $JournalEntrys = [];
        
        $total_cash_inhand = 0;
        $total_cash_inhand_debit = 0;
        $total_cash_inhand_credit = 0;
        $total_current_cash_inhand_debit = 0;
        $total_current_cash_inhand_credit = 0;
        foreach ($account_type as $key => $value) {

            $JournalEntrys[] =  JournalEntry::whereBetween('created_at',[$start,$end])->where('account_name_id',$value->id)->get();

            // current cash in hand 
            $current_cash_inhand_debit = JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$start,$end])->where('account_name_id',$value->id)->where('debit_credit',1)->get();
            
            $current_cash_inhand_credit = JournalEntry::select(DB::raw('SUM(amount) as amount'))->whereBetween('created_at',[$start,$end])->where('account_name_id',$value->id)->where('debit_credit',0)->get();
            $total_current_cash_inhand_debit = $total_current_cash_inhand_debit+$current_cash_inhand_debit[0]['amount'];
            $total_current_cash_inhand_credit = $total_current_cash_inhand_credit+$current_cash_inhand_credit[0]['amount'];
            $current_cash_in_hand = $total_current_cash_inhand_debit-$total_current_cash_inhand_credit;


            // total cash in hand
            $cash_inhand_debit = JournalEntry::select(DB::raw('SUM(amount) as cash_inhand'))->whereBetween('created_at',[$begin_time,$start])->where('account_name_id',$value->id)->where('debit_credit',1)->get();
            $cash_inhand_credit = JournalEntry::select(DB::raw('SUM(amount) as cash_inhand'))->whereBetween('created_at',[$begin_time,$start])->where('account_name_id',$value->id)->where('debit_credit',0)->get();

            $total_cash_inhand_debit = $total_cash_inhand_debit+(int)$cash_inhand_debit[0]['cash_inhand'];
            $total_cash_inhand_credit = $total_cash_inhand_credit+(int)$cash_inhand_credit[0]['cash_inhand'];
            $total_cash_inhand = $total_cash_inhand_debit-$total_cash_inhand_credit;

          
        }

       
        $OrganizationProfile = OrganizationProfile::find(1);
        return view('report::cash_book',compact('JournalEntrys','start','end','accounts','OrganizationProfile','total_cash_inhand','current_cash_in_hand','total_current_cash_inhand_debit','total_current_cash_inhand_credit','total_cash_inhand_debit','total_cash_inhand_credit'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
