<?php

namespace App\Modules\Recruitment\Http\Controllers;

use App\Models\Recruit\Gamca;
use App\Models\Recruit\Recruitorder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GamcaController extends Controller
{
    public function index()
    {
        $gamca=Gamca::all();
        return view('recruitment::gamca.index', compact('gamca'));
    }

    public function create()
    {
        $order=Recruitorder::all();

        return view('recruitment::gamca.create', compact('order'));
    }

    public function store(Request $request){

//        $validator = Validator::make($request->all(), [
//            'recruit_id' => 'required',
//            'date' => 'required',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect::back()->withErrors($validator);
//        }

        $visa=new Gamca();
        $visa->submission_date=$request->submission_date;
        $visa->delivary_date=$request->delivary_date;
        $visa->comment=$request->comment;
        $visa->recruit_id=$request->recruit_id;
        $visa->created_by=Auth::user()->id;
        $visa->updated_by=Auth::user()->id;
        $visa->save();
        return Redirect::route('gamca_index')->with('create','Gamca Created');

    }


    public function edit($id)
    {
        $order=Recruitorder::all();
        $gamca=Gamca::find($id);
        return view('recruitment::gamca.edit',compact('gamca','order'));
    }



    public function update(Request $request,$id){


        $gamca=Gamca::find($id);
        $gamca->submission_date=$request->submission_date;
        $gamca->delivary_date=$request->delivary_date;
        $gamca->comment=$request->comment;
        $gamca->recruit_id=$request->recruit_id;
        $gamca->created_by=Auth::user()->id;
        $gamca->updated_by=Auth::user()->id;
        $gamca->save();
        return Redirect::route('gamca_index')->with('create','Gamca Updated');

    }


    public function delete($id)
    {
        $gamca=Gamca::find($id);
        $gamca->delete();
        return redirect()->back()->with('delete','Gamca Deleted');

    }







}
