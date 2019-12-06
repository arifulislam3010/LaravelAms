<?php

namespace App\Modules\Okala\Http\Controllers;

use App\Models\Okala\Okala;
use App\Models\Recruit\Recruitorder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OkalaController extends Controller
{
    public function index()
    {
        $okala=Okala::all();
        return view('okala::okala.index', compact('okala'));
    }

    public function create()
    {
        $order=Recruitorder::all();
        return view('okala::okala.create',compact('order'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        //dd($request->all());


        if ($request->status==1){

            $result=new Okala();
            $result->date=$request->date;
            $result->comment=$request->comment;
            $result->status=1;
            $result->paxid=$request->paxid;
            $result->created_by=Auth::user()->id;
            $result->updated_by=Auth::user()->id;
            $result->save();
            return Redirect::route('okala_index')->with('create','Okala Created');

        }
        else{
            $result=new Okala();
            $result->date=$request->date;
            $result->comment=$request->comment;
            $result->status=0;
            $result->paxid=$request->paxid;
            $result->created_by=Auth::user()->id;
            $result->updated_by=Auth::user()->id;
            $result->save();
            return Redirect::route('okala_index')->with('create','Okala Created');
        }

    }

    public function edit($id)
    {
        $order=Recruitorder::all();
        $okala=Okala::find($id);
        return view('okala::okala.edit',compact('okala','order'));
    }

    public function update(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        //dd($request->all());


        if ($request->status==1){

            $result=Okala::find($id);
            $result->date=$request->date;
            $result->comment=$request->comment;
            $result->status=1;
            $result->paxid=$request->paxid;
            $result->created_by=Auth::user()->id;
            $result->updated_by=Auth::user()->id;
            $result->save();
            return Redirect::route('okala_index')->with('msg','Okala Updated');

        }
        else{
            $result=Okala::find($id);
            $result->date=$request->date;
            $result->comment=$request->comment;
            $result->status=0;
            $result->paxid=$request->paxid;
            $result->created_by=Auth::user()->id;
            $result->updated_by=Auth::user()->id;
            $result->save();
            return Redirect::route('okala_index')->with('msg','Okala Updated');
        }

    }

    public function delete($id)
    {
        $company=Okala::find($id);
        $company->delete();
        return redirect()->back()->with('delete','Okala Deleted');

    }

}
