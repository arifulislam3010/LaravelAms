<?php

namespace App\Modules\Visa\Http\Controllers;

use App\Models\Company\Company;
use App\Models\Contact\Contact;
use App\Models\MoneyOut\Bill;
use App\Models\Visa\Visa;
use App\Modules\Visa\Http\Requests\CreatePostRequest;
use App\Modules\Visa\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WebController extends Controller
  {

       public function index()
        {

        $visa = Visa::all();
        return view('visa::visa.index')->with('visa',$visa);
        }

/**
*/
      public function create()
      {
            $contact = Contact::all();

            $company = Company::all();

            $bill = Bill::all();

            return view('visa::visa.create')->with(array('contact'=>$contact,'company'=>$company,'bill'=>$bill));
      }

/**
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/

      public function store(CreatePostRequest $request)
      {
    //
         try
         {
             $visa =  new Visa();

             $visa->date = $request->visa_date;
             $visa->local_Reference=$request->local_ref;
             $visa->visaNumber=$request->visa_number;
             $visa->visaIssuedate=$request->issue_date;
             $visa->company_id=$request->company_name;
             $visa->numberofVisa=$request->visa_number;
             $visa->destination=$request->destination;
             $visa->registerSerial=$request->registerSerial;
             $visa->flagNum=$request->flag_num;
             $visa->iqamaNumber= $request->iqamaNumber;
             $visa->iqamaSector=$request->iqamaSector;
             $visa->visaType=$request->visaType;
             $visa->created_by= Auth::id();
             $visa->updated_by=Auth::id();



             if( $visa->save())
             {
                 return Redirect::route('visaacceptance')->withInput()->with('alert.status', 'success')
                     ->with('alert.message', 'Visa Acceptance added successfully!');
             }else{
                 return back()->withInput()->with('alert.status', 'danger')
                     ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
              }
            }catch (\Illuminate\Database\QueryException $e){
             return back()->withInput()->with('alert.status', 'danger')
                 ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
         }



       }

/**
* @param  int  $id
* @return \Illuminate\Http\Response
*/

    public function edit($id)
    {
        $visa = Visa::find($id);
        $contact = Contact::all();
        $company = Company::all();
        $bill = Bill::all();
        return view('visa::visa.edit')->with(array('contact'=>$contact,'company'=>$company,'bill'=>$bill,'visa'=>$visa));

    }

    public function update(UpdatePostRequest $request,$id)
    {

        $visa = Visa::find($id);

        $visa->date = $request->visa_date;
        $visa->local_Reference = $request->local_ref;
        $visa->visaNumber = $request->visa_number;
        $visa->visaIssuedate = $request->issue_date;
        $visa->company_id = $request->company_name;
        $visa->numberofVisa = $request->visa_number;
        $visa->destination = $request->destination;
        $visa->registerSerial = $request->registerSerial;
        $visa->flagNum = $request->flag_num;
        $visa->iqamaNumber = $request->iqamaNumber;
        $visa->iqamaSector = $request->iqamaSector;
        $visa->visaType = $request->visaType;

        $visa->created_by = Auth::id();
        $visa->updated_by = Auth::id();


        if ($visa->save()) {
            return Redirect::route('visa')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Visa updated successfully!');
        } else {
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Data cannot be update.');


        }
    }
    public function delete($id =null)
      {
    //
         $visa = Visa::find($id);

         if(!$visa->bill_id)
         {
          $visa->delete();

          return back()->withInput()->with('alert.status', 'danger')
                                    ->with('alert.message', 'Visa deleted.');
            }else
          {
                return back()->withInput()->with('alert.status', 'alert')
                                          ->with('alert.message', 'You have a bill attached with this entry . Please delete bill first');
          }


       }

      public function contact()
      {


        $contact = Contact::all();
        return response($contact);

      }

      public function pdf($id)
      {

          echo base64_decode($id);

      }

  }


