<?php

namespace App\Modules\Recrutereport\Http\Controllers;

use App\Models\Company\Company;
use App\Models\Flight\Flight;
use App\Models\Okala\Okala;
use Carbon\Carbon;
use DateTime;
use App\Models\Recruit\Recruitorder;
use App\Models\Visa\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RreportController extends Controller
{

    public function index()
    {
        return view('recrutereport::index');
    }


    public function vendor()
    {
          /*$rvendor= Flight::all()->groupby('vendor_id')->count('paxid');*/
//         $rvendor=Flight::all();
//         $rvendorUnique=$rvendor->unique('vendor_id')->count('id');
        /*$rvendor=DB::table('flight')->select(count('paxid'),'vendor_id')->groupby('vendor_id')->get();*/

        $rvendor=DB::select('SELECT COUNT(\'paxid\') as paxid,vendor_id FROM flight GROUP BY vendor_id');
        $current_time = Carbon::now()->toDayDateTimeString();
        $start =(new DateTime($current_time))->modify('-14 day')->format('Y-m-d');
        $end =(new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $company=Company::find(1);
        return view('recrutereport::vendor',compact('rvendor','start','end','company'));
    }

    public function vendorList($id)
    {

        $rvendor=Flight::where('vendor_id',$id)->get();
        $current_time = Carbon::now()->toDayDateTimeString();
        $start =(new DateTime($current_time))->modify('-14 day')->format('Y-m-d');
        $end =(new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $flight=Flight::whereBetween('created_at',[$start,$end])->get();
        $company=Company::find(1);
        //return $flight;
        //return $id;
        return view('recrutereport::vendorlist',compact('rvendor','company','start','end','flight'));
    }

     public function vendorSearch(Request $request){
         $rvendor=Flight::all();
         $company=Company::find(1);
         $start = date("Y-m-d",strtotime($request->input('from_date'))).' '.'00:00:00';
         $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day")).' '.'00:00:00';
         $flight=Flight::whereBetween('created_at',[$start,$end])->get();
         //return $flight;
         return view('recrutereport::vendor',compact('rvendor','start','end','flight','company'));

     }
    /*public function ticketvendorSearch($id){
        $rvendor=Flight::all();
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-30 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $flight=Flight::whereBetween('created_at',[$start,$end])->where('vendor_id',$id)->get();
        return view('recrutereport::vendorlist',compact('rvendor','start','end','flight','company'));
    }**/

    public function company()
    {
        $company_id = [];
        $pax_ids = [];
        $i = 0;
        $paxIds=Recruitorder::all();
        foreach ($paxIds as $paxId)
        {
            $pax_ids[$i] = $paxId->paxid;
            $company_id[$i] = Visa::find($paxId->registerSerial_id)->company_id;

            $i++;
        }
        $max_value=max($company_id);

        $uniqe=array_fill(0, $max_value+1, 0);

        for($i = 0; $i <= $max_value; $i++)
        {
            $uniqe[$company_id[$i]] = $uniqe[$company_id[$i]] + 1;
        }

        /*$data = [];

        for($i = 0; $i < count($uniqe); $i++)
        {
            if($uniqe[$i] != 0)
            {
                $object = array(
                    'company_name'  => Company::find($i)->name,
                    'okala'         => $uniqe[$i],
                );
                return json_encode($object);
            }

        }
        return json_encode($object);*/


        return view('recrutereport::company',compact ('uniqe'));
    }

    public function companyList()
    {

        $visa_list=Visa::all();

         foreach($visa_list as $all)
        {
             $new = $all->Contact->id;
             $order = Recruitorder::where('id' , $new)->first();
            return $order->paxid;
        }
       /* dd($visa_list);*/


        return view('recrutereport::companyList',compact('visa_list'));
    }

    public function visa()
    {
         $visa=Visa::all();
        return view('recrutereport::visa',compact('visa'));
    }
    public function visalist()
    {

        return view('recrutereport::visalist');
    }
    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
