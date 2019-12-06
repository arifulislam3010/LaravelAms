<?php

namespace App\Modules\Customer\Http\Controllers\information;

use App\Models\Recruit\Recruitorder;
use App\Models\Recruit_Customer\Recruit_customer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class WebController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $id = $id;
           $Rorder=Recruitorder::where('paxid',$id)->first();
           $customer_info=Recruit_customer::firstOrNew(array('pax_id' => $Rorder->id));
           $customer_info->recruit_id = $Rorder->id;
           $customer_info->pax_id = $Rorder->id;
           $customer_info->save();
           return view('customer::information.edit',compact('id','Rorder','customer_info'));
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
      try{
          $custinfo=Recruit_customer::find(base64_decode($request->id));
          $custinfo->dateOfBirthEN = $request->dateOfBirthEN;
          $custinfo->dateOfBirthBN = $request->dateOfBirthBN;
          $custinfo->placeOfBirth = $request->placeOfBirth;
          $custinfo->gender = $request->gender;
          $custinfo->addressEN = $request->addressEN;
          $custinfo->addressBN = $request->addressBN;
          $custinfo->religionEN = $request->religionEN;
          $custinfo->religionBN = $request->religionBN;
          $custinfo->previousNationality = $request->previousNationality;
          $custinfo->presentNationality = $request->presentNationality;
          $custinfo->maritalStatus = $request->maritalStatus;
          $custinfo->group = $request->group;
          $custinfo->guardianName = $request->guardianName;
          $custinfo->guardianFatherName = $request->guardianFatherName;
          $custinfo->guardianAddressEN = $request->guardianAddressEN;
          $custinfo->guardianReligion = $request->guardianReligion;
          $custinfo->motherName = $request->motherName;
          $custinfo->fatherName = $request->fatherName;
          $custinfo->relationWithCustomer_1 = $request->relationWithCustomer_1;
          $custinfo->relationWithCustomer_2 = $request->relationWithCustomer_2;
          $custinfo->qualification = $request->qualification;
          $custinfo->professionEn = $request->professionEn;
          $custinfo->professionBn = $request->professionBn;
          $custinfo->professionAR = $request->professionAR;
          $custinfo->businessAddressEN = $request->businessAddressEN;
          $custinfo->businessAddressBN = $request->businessAddressBN;
          $custinfo->purposeOfTravel = $request->purposeOfTravel;
          $custinfo->durationOfStay = $request->durationOfStay;
          $custinfo->departureDate = $request->departureDate;
          $custinfo->arrivalDate = $request->arrivalDate;
          $custinfo->visaAdvice = $request->visaAdvice;
          $custinfo->destination = $request->destination;
          $custinfo->save();
          return Redirect::route('customer_information_edit',base64_decode($request->pid))->withInput()->with('alert.status', 'success')
              ->with('alert.message', 'Customer information Updated successfully!');

      }catch (\Exception $d){

          return Redirect::route('customer_information_edit',base64_decode($request->pid))->withInput()->with('alert.status', 'danger')
              ->with('alert.message', 'Customer information not saved !');
      }



    }

}
