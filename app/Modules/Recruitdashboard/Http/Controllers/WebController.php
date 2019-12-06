<?php

namespace App\Modules\Recruitdashboard\Http\Controllers;

use App\Models\Document\Document;
use App\Models\Fingerprint\Fingerprint;
use App\Models\Flight\Flight;
use App\Models\Manpower\Manpower;
use App\Models\MedicalSlip\Medicalslip;
use App\Models\Mofa\Mofa;
use App\Models\Musaned\Musaned;
use App\Models\Okala\Okala;
use App\Models\Recruit\Recruitorder;
use App\Models\Visa\Visa;
use App\Models\VisaStamp\VisaStamp;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $okala=Okala::all();
        $flight=Flight::all();
        $mofa=Mofa::all();
        $ft=Fingerprint::all();
        $visaentry=[];
        $manpower=Manpower::all();
        $musaned=[];
        $medical=[];
        $visastamp=[];
        $document=[];
        $Rorder=Recruitorder::orderBy('created_at','desc')->get();
        //$Rorder=Recruitorder::where('id',)->get();
       // return $Rorder;

       return view('recruitdashboard::index',compact('okala','flight','mofa','ft','medical','visastamp','Rorder','document','manpower','musaned','visaentry'));
    }


    public function search(Request $request)
    {
        /*$current_time = Carbon::now()->toDayDateTimeString();*/
        $from=date("Y-m-d",strtotime($request->input('from_date'))).' '.'00:00:00';
        $to =date("Y-m-d",strtotime($request->input('to_date')."+1 day")).' '.'00:00:00';
        $okala=Okala::whereBetween('created_at',[ $from,$to])->get();
        $flight=Flight::whereBetween ('created_at',[ $from,$to])->get();
        $mofa=Mofa::whereBetween ('created_at',[ $from,$to])->get();
        $ft=Fingerprint::whereBetween ('created_at',[ $from,$to])->get();
        $visaentry=Visa::whereBetween ('created_at',[ $from,$to])->get();
        $manpower=Manpower::whereBetween ('created_at',[ $from,$to])->get();
        $musaned=Musaned::whereBetween ('created_at',[ $from,$to])->get();
        $medical=Medicalslip::whereBetween ('created_at',[ $from,$to])->get();
        $visastamp=VisaStamp::whereBetween ('created_at',[ $from,$to])->get();
        $document=Document::whereBetween ('created_at',[ $from,$to])->get();
        $Rorder=Recruitorder::whereBetween ('created_at',[ $from,$to])->get();
        //return $okala;
        return view('recruitdashboard::index',compact('okala','flight','mofa','visaentry','Rorder','medical','visastamp','document','musaned','manpower','from','ft','to'));
    }


    public function store(Request $request)
    {

    }


    public function show()
    {
     return view ('recruitdashboard::show');
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
