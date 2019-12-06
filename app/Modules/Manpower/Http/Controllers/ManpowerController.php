<?php

namespace App\Modules\Manpower\Http\Controllers;

use App\Models\Manpower\Manpower;
use App\Models\Recruit\Recruitorder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ManpowerController extends Controller
{
    public function index()
    {
        $manpower=Manpower::all();
        return view('manpower::manpower.index', compact('manpower'));
    }

    public function create()
    {
       $order=Recruitorder::all();
        return view('manpower::manpower.create',compact('order'));
    }

    public function store(Request $request){

       // dd($request->all());

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'issuingDate' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }


        $input = Input::all();
        $condition = $input['paxid'];

       // dd($condition);



        foreach ($condition as $condition) {
            $manpower = new Manpower();
            $manpower->issuingDate = $input['issuingDate'];
            $manpower->receivingDate = $input['receivingDate'];
            $manpower->comment = $input['comment'];
            $manpower->paxid = $condition;
            $manpower->created_by =Auth::user()->id ;
            $manpower->updated_by =Auth::user()->id ;
            $manpower->save();

        }
        return Redirect::route('manpower_index')->with('create','Manpower Created');


    }


    public function edit($id)
    {
        $order=Recruitorder::all();
        $manpower=Manpower::find($id);
        return view('manpower::manpower.edit',compact('manpower','order'));
    }


    public function update(Request $request,$id){

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'issuingDate' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }



        $manpower=Manpower::find($id);
        $manpower->issuingDate=$request->issuingDate;
        $manpower->receivingDate=$request->receivingDate;
        $manpower->comment=$request->comment;
        $manpower->paxid=$request->paxid;
        $manpower->created_by=Auth::user()->id;
        $manpower->updated_by=Auth::user()->id;
        $manpower->save();

        return Redirect::route('manpower_index')->with('create','Manpower Updated');


    }

    public function delete($id)
    {
        $company=Manpower::find($id);
        $company->delete();
        return Redirect::route('manpower_index')->with('delete','Manpower Deleted');


    }

}
