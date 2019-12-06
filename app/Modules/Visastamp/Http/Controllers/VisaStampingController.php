<?php

namespace App\Modules\Visastamp\Http\Controllers;

use App\Models\VisaStamp\VisaStamp;
use App\Models\Recruit\Recruitorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VisaStampingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stamp=VisaStamp::all();
        return view('visastamp::index',compact('stamp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stamp=VisaStamp::all();
        $recrut=Recruitorder::all();
      return view('visastamp::create',compact('stamp','recrut'));
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
            'paxid.*' => 'required',
            /*'send_date' => 'required',
            'return_date' => 'required',
            'comment' => 'required',*/

        ]);

        if ($validator->fails()) {
            return Redirect::route('visastamp_create')->withErrors($validator);
        }

        $input = Input::all();
        $paxIds = $input['paxid'];

        foreach ($paxIds as $paxId) {

            VisaStamp::updateOrCreate(
                    [
                        'pax_id' => $paxId
                    ],
                    [
                        'pax_id' => $paxId,
                        'send_date' => $input['send_date'],
                        'return_date' => $input['return_date'],
                        'comment' => $input['comment'],
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id
                    ]
            );

        }

    /*    if($)*/

        return Redirect::route('visastamp')->withInput()->with('alert.status', 'success')
               ->with('alert.message', 'Visastamp Updated successfully!');

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
    /*public function edit($id)
    {
        $stamp=VisaStamp::find($id);
        $recrut=Recruitorder::all();
        return view('visastamp::edit',compact('stamp','recrut'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'send_date' => 'required',
            'return_date' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::route('visastamp_edit')->withErrors($validator);
        }

        $input = Input::all();
        $condition = $input['paxid'];
        //dd($condition);

        foreach ($condition as $con) {

            $stamp=VisaStamp::find($id);
            $stamp->pax_id = $con;
            $stamp->send_date = $input['send_date'];
            $stamp->return_date = $input['return_date'];
            $stamp->comment = $input['comment'];
            $stamp->created_by = Auth::user()->id;
            $stamp->updated_by = Auth::user()->id;
            $stamp->update();

        }
        if ($stamp->update()) {

            return Redirect::route('visastamp')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Stamp Updated successfully!');
        } else {
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Stamp cannot be Problem.');
        }

    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $stamp=VisaStamp::find($id);
        $stamp->delete();
        return redirect()->back()->with('delete','Visastamp Deleted');
        /*return back()->withInput()->with('alert.status', 'danger')
            ->with('alert.message', 'Visastamp deleted.');*/
    }
}
