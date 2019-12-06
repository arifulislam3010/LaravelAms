<?php

namespace App\Modules\Fingerprint\Http\Controllers;

use App\Models\Fingerprint\Fingerprint;
use App\Models\Recruit\Recruitorder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FingerprintController extends Controller
{

    public function index()
    {
        $finger=Fingerprint::all();
        return view('fingerprint::fingerprint.index', compact('finger'));
    }

    public function create()
    {
        $order=Recruitorder::all();
        return view('fingerprint::fingerprint.create',compact('order'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'assignedDate' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }


            $result=new Fingerprint();
            $result->assignedDate=$request->assignedDate;
            $result->receivingDate=$request->receivingDate;
            $result->comment=$request->comment;
            $result->paxid=$request->paxid;
            $result->created_by=Auth::user()->id;
            $result->updated_by=Auth::user()->id;
            $result->save();
            return Redirect::route('fingerprint_index')->with('create','Finger print Created');


    }

    public function edit($id)
    {
        $order=Recruitorder::all();
        $finger=Fingerprint::find($id);
        return view('fingerprint::fingerprint.edit',compact('finger','order'));
    }

    public function update(Request $request,$id){

       // dd($request->all());

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }


            $result=Fingerprint::find($id);
            $result->assignedDate=$request->assignedDate;
            $result->receivingDate=$request->receivingDate;
            $result->comment=$request->comment;
            $result->paxid=$request->paxid;
            $result->created_by=Auth::user()->id;
            $result->updated_by=Auth::user()->id;
            $result->save();
            return Redirect::route('fingerprint_index')->with('create','Finger print Updated');


    }

    public function delete($id)
    {
        $company=Fingerprint::find($id);
        $company->delete();
        return Redirect::route('fingerprint_index')->with('delete','Finger print Deleted');


    }


}
