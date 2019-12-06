<?php

namespace App\Modules\Recruitment\Http\Controllers;

use App\Models\Formbasis\Formbasis;
use App\Models\MedicalSlipForm\MedicalSlipForm;
use App\Models\MedicalSlipFormPax\MedicalSlipFormPax;
use App\Models\Recruit\Recruitorder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use mPDF;

class MedicalslipController extends Controller
{
    public function index(){

        $basis= DB::select("SELECT GROUP_CONCAT(recruitingorder.paxid) as id,medical_slip_form.dateOfApplication ,medical_slip_form_pax.medicalslip_id FROM medical_slip_form JOIN medical_slip_form_pax on medical_slip_form.id= medical_slip_form_pax.medicalslip_id JOIN recruitingorder ON recruitingorder.id= medical_slip_form_pax.recruit_id GROUP BY medical_slip_form_pax.medicalslip_id");


       // $basis= MedicalSlipFormPax::select('medicalslip_id')->groupBy('medicalslip_id')->get();

        //dd($basis);

        return view('recruitment::medicalslipform.index',compact('basis'));
    }

    public function create(){
        $order=Recruitorder::all();
        return view('recruitment::medicalslipform.create',compact('order'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'recruit_id' => 'required',
            'dateOfApplication' => 'required',
            'country_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        $input = Input::all();
        $condition = $input['recruit_id'];



        $medical=new MedicalSlipForm();
        $medical->dateOfApplication=$request->dateOfApplication;
        $medical->country_name=$request->country_name;
        $medical->created_by=Auth::user()->id;
        $medical->updated_by=Auth::user()->id;
        $medical->save();



            if ($medical) {
                foreach ($condition as $cond) {
                $formpax = new MedicalSlipFormPax();
                $formpax->medicalslip_id = $medical->id;
                $formpax->recruit_id = $cond;
                $formpax->save();

            }
                return Redirect::route('medical_slip_form_index')->with('msg', 'data Inserted');
        }


    }

    public function edit($id){
        $rec=Recruitorder::all();

        //$formpax=MedicalSlipFormPax::where('medicalslip_id',$id)->get();

        $query=MedicalSlipForm::find($id);

       // dd($query);

        return view('recruitment::medicalslipform.edit',compact('formpax','rec','query'));
    }


    public function update(Request $request,$id){

        // dd($request->all());


        //$bulk=serialize($request->recruit_id);


        // $unbulk=unserialize($bulk);

        //dd($unbulk);

        $validator = Validator::make($request->all(), [
            'recruit_id' => 'required',
            'dateOfApplication' => 'required',
            'country_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        $input = Input::all();
        $condition = $input['recruit_id'];



        $medical=MedicalSlipForm::find($id);
        $medical->dateOfApplication=$request->dateOfApplication;
        $medical->country_name=$request->country_name;
        $medical->created_by=Auth::user()->id;
        $medical->updated_by=Auth::user()->id;
        $medical->save();




        if ($medical){
            $delete = MedicalSlipFormPax::where('medicalslip_id',$id)->delete();
            foreach ($condition as $cond) {
                $formpax = new MedicalSlipFormPax();
                $formpax->medicalslip_id = $medical->id;
                $formpax->recruit_id = $cond;
                $formpax->save();

            }

            return redirect()->back()->with('msg','data Updated');
        }

    }


    public function delete($id){

        $formpax=MedicalSlipForm::find($id);

        if ($formpax->delete()){

            $delete = MedicalSlipFormPax::where('medicalslip_id',$id)->delete();
        }

        return redirect()->back()->with('msg','data Deleted');
    }


    public function download($id){


        $basis= DB::select("SELECT medical_slip_form.dateOfApplication,medical_slip_form.country_name ,medical_slip_form_pax.medicalslip_id,contact.display_name,recruitingorder.passportNumber FROM medical_slip_form JOIN medical_slip_form_pax on medical_slip_form.id= medical_slip_form_pax.medicalslip_id JOIN recruitingorder ON recruitingorder.id= medical_slip_form_pax.recruit_id JOIN contact ON contact.id= recruitingorder.customer_id WHERE medical_slip_form.id= :id",array('id'=>$id));
           // dd($basis);
        $formbasis=Formbasis::first();

        $mpdf = new mPDF('utf-8', 'A4-P');
        $view =  view('recruitment::medicalslipform.medical_slip',compact('basis','formbasis'));
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }
}
