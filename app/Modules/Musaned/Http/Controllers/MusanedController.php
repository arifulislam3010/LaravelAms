<?php

namespace App\Modules\Musaned\Http\Controllers;


use App\Models\Company\Company;
use App\Models\Musaned\Musaned;
use Illuminate\Support\Facades\Validator;
use App\Models\Recruit\Recruitorder;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class MusanedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fibbo=Musaned::all();
        return view('musaned::index', compact('fibbo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fibbo = Musaned::all();
        $recrut=Recruitorder::all();
        $com=Company::all();
        return view('musaned::create', compact('fibbo','recrut','com'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
//            'paxid' => 'required',
//            'isssue_date' => 'required',

        ]);
        if ($validator->fails()) {
            return Redirect::route('musaned_create')->withErrors($validator);
        }
        $fibbo = new Musaned();
        $fibbo->pax_id = $request->paxid;
        $fibbo->issue_date = $request->isssue_date;
        $fibbo->company_id = $request->cpname?$request->cpname:null;
        $fibbo->created_by = Auth::user()->id;
        $fibbo->updated_by = Auth::user()->id;
          //dd($fibbo);
         $fibbo->save();
          if( $fibbo->save())
         {
            return Redirect::route('musaned')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Musaned added successfully!');
        }else{
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fibbo=Musaned::find($id);
        $recrut=Recruitorder::all();
        $com=Company::all();
        return view('musaned::edit', compact('fibbo','recrut','com'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'isssue_date' => 'required',

        ]);
        if ($validator->fails()) {
            return Redirect::route('musaned_edit',$id)->withErrors($validator);
        }
        $fibbo=Musaned::find($id);
        $fibbo->pax_id = $request->paxid;
        $fibbo->issue_date = $request->isssue_date;
        $fibbo->company_id = $request->cpname;
        $fibbo->created_by = Auth::user()->id;
        $fibbo->updated_by = Auth::user()->id;
        //return " $fibbo";
        $fibbo->update();

        if( $fibbo->update())
        {
            return Redirect::route('musaned')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Musaned Updated successfully!');
        }else{
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Data cannot be Updated.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id )
    {

        $fibbo = Musaned::find($id);
        $fibbo->delete();

        return back()->withInput()->with('alert.status', 'danger')
            ->with('alert.message', 'Musaned deleted.');

    }

}

