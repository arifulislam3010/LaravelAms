<?php

namespace App\Modules\Flight\Http\Controllers;

use App\Models\Contact\Contact;
use App\Models\Flight\Flight;
use App\Models\Recruit\Recruitorder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FlightController extends Controller
{
    public function index()
    {
        $flight=Flight::all();
        return view('flight::flight.index', compact('flight'));
    }

    public function create()
    {
        $order=Recruitorder::all();
        $vendor=Contact::all();
        return view('flight::flight.create',compact('order','vendor'));
    }

    public function store(Request $request){

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'carrierName' => 'required',
            'flightDate' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }


        $input = Input::all();
        $condition = $input['paxid'];

        // dd($condition);



        foreach ($condition as $condition) {

            $flight = new Flight();
            $flight->carrierName = $input['carrierName'];
            $flight->flightDate = $input['flightDate'];
            $flight->country = $input['country'];
            $flight->comment = $input['comment'];
            $flight->vendor_id = $input['vendor_id']? $input['vendor_id']:null;
            $flight->paxid = $condition;
            $flight->created_by =Auth::user()->id ;
            $flight->updated_by =Auth::user()->id ;
            $flight->save();

        }
        return Redirect::route('flight_index')->with('create','Flight Created');

    }

    public function edit($id)
    {
        $order=Recruitorder::all();
        $flight=Flight::find($id);
        $vendor=Contact::all();
        return view('flight::flight.edit',compact('flight','order','vendor'));
    }


    public function update(Request $request,$id){

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'carrierName' => 'required',
            'flightDate' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }


            $flight=Flight::find($id);
            $flight->carrierName = $request->carrierName;
            $flight->flightDate = $request->flightDate;
            $flight->country = $request->country;
            $flight->comment = $request->comment;
            $flight->vendor_id = $request->vendor_id?$request->vendor_id:null;
            $flight->paxid =  $request->paxid;
            $flight->created_by =Auth::user()->id ;
            $flight->updated_by =Auth::user()->id ;
            $flight->save();

        return Redirect::route('flight_index')->with('create','Flight Updated');

    }

    public function delete($id)
    {
        $company=Flight::find($id);
        $company->delete();
        return Redirect::route('flight_index')->with('delete','Manpower Deleted');


    }
}
