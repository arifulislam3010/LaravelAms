<?php

namespace App\Modules\Report\Http\Controllers;

use App\Models\Contact\Agent;
use App\Models\ManualJournal\JournalEntry;
use App\Models\Moneyin\Invoice;
use App\Models\OrganizationProfile\OrganizationProfile;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalesCommissionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $OrganizationProfile = OrganizationProfile::find(1);
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-30 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $begin_time = (new DateTime($current_time))->modify('-999999 day')->format('Y-m-d');

        $journal = Invoice::groupBy('agents_id')->whereNotNull('agents_id')->whereBetween('invoice_date',array($start,$end))->selectRaw('sum(total_amount) as sum, count(id) as totalinvoice, agents_id')->get();


        return view('report::salesbyagent',compact('end','start','OrganizationProfile','journal'));
    }


    public function details($id,$start,$end)
    {



        $OrganizationProfile = OrganizationProfile::find(1);
        $start = $start." " ."00:00:00";
        $end = $end." " ."23:59:00";

       $ag= Agent::find($id);
        $journal = JournalEntry::whereBetween('created_at',array($start,$end))->where('jurnal_type','sales_commission')->where('agent_id',$id)->where('debit_credit',0)->get();
        return view('report::single_agent_commission',compact('end','start','OrganizationProfile','journal','id','ag'));
    }

    public function detailsbydate(Request $request)
    {


        $OrganizationProfile = OrganizationProfile::find(1);
        $start = $request->start." " ."00:00:00";
        $end = $request->end." " ."23:59:00";
        $id = $request->id;
        $ag= Agent::find($id);
        $journal = JournalEntry::whereBetween('created_at',array($start, $end))->where('jurnal_type','sales_commission')->where('agent_id',$id)->where('debit_credit',0)->get();
        return view('report::single_agent_commission',compact('end','start','OrganizationProfile','journal','id','ag'));
    }

    public function filterbydate(Request $request)
    {
        $OrganizationProfile = OrganizationProfile::find(1);
        $start =$request->from_date;
        if($request->to_date){
            $end = $request->to_date;
        }else{
            $end  =$start;
        }
       $journal = Invoice::groupBy('agents_id')->whereBetween('invoice_date',array($start, $end))->selectRaw('sum(total_amount) as sum, count(id) as totalinvoice, agents_id')->get();
        return view('report::salesbyagent',compact('end','start','OrganizationProfile','journal'));
    }




}
