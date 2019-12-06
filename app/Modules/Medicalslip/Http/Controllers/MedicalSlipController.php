<?php

namespace App\Modules\Medicalslip\Http\Controllers;
use App\Models\Recruit\Recruitorder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MedicalSlip\Medicalslip;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class MedicalSlipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medical = Medicalslip::all();
        return view('medicalslip::index', compact('medical'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medical=MedicalSlip::all();
        $recrut=Recruitorder::all();
        return view('medicalslip::create',compact('medical','recrut'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'test_date' => 'required',
            'medicalcn' => 'required',

        ]);
        if ($validator->fails()) {
            return Redirect::route('medicalslip_create')->withErrors($validator);
        }

        $medical=new MedicalSlip();
        $medical->pax_id=$request->paxid;
        $medical->status =$request->status?$request->status:null;
        $medical->medical_centre=$request->medicalcn;
        $medical->testdate=$request->test_date;
        $medical->comment=$request->comment;
        $medical->created_by=Auth::user()->id;
        $medical->updated_by=Auth::user()->id;
        //dd($medical);

        $medical->save();
        if( $medical->save())
        {
            return Redirect::route('medicalslip')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Silp created successfully!');
        }else{
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Slip cannot be created.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medical=Medicalslip::find($id);
        $recrut=Recruitorder::all();
        return view('medicalslip::edit',compact('medical','recrut'));
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
        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'test_date' => 'required',
            'medicalcn' => 'required',



        ]);
        if ($validator->fails()) {
            return Redirect::route('medicalslip_edit',$id)->withErrors($validator);
        }
        $medical=Medicalslip::find($id);
        $medical->pax_id=$request->paxid;
        $medical->status =$request->status;
        $medical->medical_centre=$request->medicalcn;
        $medical->testdate=$request->test_date;
        $medical->comment=$request->comment;
        $medical->created_by=Auth::user()->id;
        $medical->updated_by=Auth::user()->id;
        $medical->update();

        if( $medical->update())
        {
            return Redirect::route('medicalslip')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Silp Updated successfully!');
        }else{
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Slip cannot be Updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $medical=Medicalslip::find($id);
        $medical->delete();
        return back()->withInput()->with('alert.status', 'danger')
            ->with('alert.message', 'Slip deleted.');
    }
}
