<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Models\Document\Category;
use App\Models\Document\Document;
use App\Models\Fingerprint\Fingerprint;
use App\Models\Flight\Flight;
use App\Models\Manpower\Manpower;
use App\Models\MedicalSlip\Medicalslip;
use App\Models\Mofa\Mofa;
use App\Models\Musaned\Musaned;
use App\Models\Okala\Okala;
use App\Models\Recruit\Recruitorder;
use App\Models\VisaStamp\VisaStamp;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WebController extends Controller
{

    public function index()
    {
       $customer=Recruitorder::all();
      return view('customer::index',compact('customer'));
    }


     public function update($id)
    {

       $id = $id;

       $cust=Recruitorder::where('paxid',$id)->first();

       return view('customer::update',compact('cust','id'));
    }

    public function document($id)
    {
       // return "jgjg";
        $id=$id;
        $Rorder=Recruitorder::where('paxid',$id)->first();
        $document=Document::where('pax_id',$Rorder->id)->get();
        return view('customer::document',compact('document'));
    }

    /*public function dedit($id)
    {
        $document=Document::find($id);

        return view('customer::dedit',compact('document'));
    }

    public function dupdate(Request $request, $id)
    {    $document=Document::find($id);
         //$document->created_at=$request->date;
         $document->categoryName=$request->category;
         $document->title=$request->title;
         $document->update();
        return view('customer::document',compact('document'));
    }*/


    public function order($id)
    {
        $id=$id;
        //$Rorder=Recruitorder::where('paxid',$id)->first();
        $order=Recruitorder::where('paxid',$id)->get();
        //return $order;
        return view('customer::order',compact('order','id'));
    }
    public function okala($id)
    {
        $id=$id;
        $Rorder=Recruitorder::where('paxid',$id)->first();
        $okala=Okala::where('paxid',$Rorder->id)->get();
        return view('customer::okala',compact('okala'));
    }

    public function medicalSlip($id)
    {
        $id=$id;
        $Rorder=Recruitorder::where('paxid',$id)->first();
        $medical=Medicalslip::where('pax_id',$Rorder->id)->get();
        //return $medical;

        return view('customer::medical',compact('medical'));
    }

    public function mofa($id)
    {
        $id=$id;
        $Rorder=Recruitorder::where('paxid',$id)->first();
        $mofa=Mofa::where('pax_id',$Rorder->id)->get();
        return view('customer::mofa',compact('mofa'));
    }
    public function musaned($id)
    {
        $id=$id;
        $Rorder=Recruitorder::where('paxid',$id)->first();
        $musa=Musaned::where('pax_id',$Rorder->id)->get();
        return view('customer::musaned',compact('musa'));
    }

    public function stamping($id)
    {
        $id=$id;
        $Rorder=Recruitorder::where('paxid',$id)->first();
        $stamp=VisaStamp::where('pax_id',$Rorder->id)->get();
        return view('customer::stamping',compact('stamp'));
    }

    public function ft($id)
    {

        $id=$id;
        $Rorder=Recruitorder::where('paxid',$id)->first();
        $finger=Fingerprint::where('paxid',$Rorder->id)->get();
        return view('customer::finger',compact('finger','id'));
    }
    public function manpower($id){

        $id=$id;
        $Rorder=Recruitorder::where('paxid',$id)->first();
        $mpower=Manpower::where('paxid',$Rorder->id)->get();
        return view('customer::manpower',compact('mpower'));
    }
    public function flight($id)
    {
        $id=$id;
        $Rorder=Recruitorder::where('paxid',$id)->first();
        $flight=Flight::where('paxid',$Rorder->id)->get();
        return view('customer::flight',compact('flight'));
    }
    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }


    /*public function update(Request $request, $id)
    {

    }*/


    public function destroy($id)
    {

    }
}
