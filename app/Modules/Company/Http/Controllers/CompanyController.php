<?php

namespace App\Modules\Company\Http\Controllers;

use App\Models\Company\Company;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index()
    {
        $company=Company::all();
        return view('company::company.index', compact('company'));
    }

    public function create()
    {
        return view('company::company.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }


            $result=new Company();

            $result->name=$request->name;
            $result->company_code=$request->company_code;
            $result->salary=$request->salary;
            $result->mealallowance=$request->mealallowance;
            $result->airtransport=$request->airtransport;
            $result->referencename=$request->referencename;
            /* extra field */
            $result->nameAr = $request->nameAr;
            $result->contactNumber =$request->contactNumber;
            $result->companyAddress = $request->companyAddress;
            $result->created_by=Auth::user()->id;
            $result->updated_by=Auth::user()->id;
            $result->save();
            return Redirect::route('company_index')->with('create','Company Created');

    }

    public function edit($id)
    {
        $company=Company::find($id);
        return view('company::company.edit',compact('company'));
    }


    public function update(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'company_code' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }



        $result=Company::find($id);
        $result->name=$request->name;
        $result->company_code=$request->company_code;
        $result->salary=$request->salary;
        $result->mealallowance=$request->mealallowance;
        $result->airtransport=$request->airtransport;
        $result->referencename=$request->referencename;
        /* extra field */
        $result->nameAr = $request->nameAr;
        $result->contactNumber =$request->contactNumber;
        $result->companyAddress = $request->companyAddress;

        $result->created_by=Auth::user()->id;
        $result->updated_by=Auth::user()->id;
        $result->save();
        return Redirect::route('company_index')->with('create','Company Updated');

    }

    public function delete($id)
    {
        $company=Company::find($id);
        $company->delete();
        return redirect()->back()->with('delete','Company Deleted');

    }



}
