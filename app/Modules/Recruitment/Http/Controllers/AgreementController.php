<?php

namespace App\Modules\Recruitment\Http\Controllers;

use App\Models\Agreement\Agreement_Paper;
use App\Models\Agreement\Agreement_Paper_Pax;
use App\Models\Formbasis\Formbasis;
use App\Models\Recruit\Recruitorder;
use App\Models\Recruit_Customer\Recruit_customer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use mPDF;

class AgreementController extends Controller
{
    public function index(){

        $basis= DB::select("SELECT GROUP_CONCAT(recruitingorder.paxid) as id,agreement_paper.country_name ,agreement_paper_pax.agreement_paper_id FROM agreement_paper JOIN agreement_paper_pax on agreement_paper.id= agreement_paper_pax.agreement_paper_id JOIN recruitingorder ON recruitingorder.id= agreement_paper_pax.recruit_id GROUP BY agreement_paper_pax.agreement_paper_id");

        //dd($basis);

        return view('recruitment::agreement.index',compact('basis'));
    }

    public function create(){
        $order=Recruitorder::all();
        return view('recruitment::agreement.create',compact('order'));
    }

    public function store(Request $request){

        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'recruit_id' => 'required',
            'country_name' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        $input = Input::all();
        $condition = $input['recruit_id'];



        $agreement=new Agreement_Paper();
        $agreement->country_name=$request->country_name;
        $agreement->gender=$request->gender;
        $agreement->created_by=Auth::user()->id;
        $agreement->updated_by=Auth::user()->id;
        $agreement->save();



        if ($agreement) {
            foreach ($condition as $cond) {
                $agreementpax = new Agreement_Paper_Pax();
                $agreementpax->agreement_paper_id = $agreement->id;
                $agreementpax->recruit_id = $cond;
                $agreementpax->save();

            }
            return Redirect::route('agreement_index')->with('msg', 'Data Inserted');
        }


    }

    public function edit($id){
        $rec=Recruitorder::all();

        $query=Agreement_Paper::find($id);

        // dd($formpax);

        return view('recruitment::agreement.edit',compact('formpax','rec','query'));
    }

    public function update(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'recruit_id' => 'required',
            'gender' => 'required',
            'country_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        $input = Input::all();
        $condition = $input['recruit_id'];


        $agreement=Agreement_Paper::find($id);
        $agreement->country_name=$request->country_name;
        $agreement->gender=$request->gender;
        $agreement->created_by=Auth::user()->id;
        $agreement->updated_by=Auth::user()->id;
        $agreement->save();




        if ($agreement){
            $delete = Agreement_Paper_Pax::where('agreement_paper_id',$id)->delete();
            foreach ($condition as $cond) {
                $formpax = new Agreement_Paper_Pax();
                $formpax->agreement_paper_id = $agreement->id;
                $formpax->recruit_id = $cond;
                $formpax->save();

            }

            return Redirect::route('agreement_index')->with('msg', 'Data Updated');
        }

    }

    public function delete($id){

        $formpax=Agreement_Paper::find($id);
        //dd($formpax);

        if ($formpax->delete()){

            $delete = Agreement_Paper_Pax::where('agreement_paper_id',$id)->delete();
        }

        return redirect()->back()->with('msg','Data Deleted');
    }



    public function download($id){


        $agreement= DB::select("SELECT agreement_paper.country_name,agreement_paper.gender,contact.display_name,agreement_paper_pax.agreement_paper_id,recruitingorder.passportNumber FROM agreement_paper JOIN agreement_paper_pax on agreement_paper.id= agreement_paper_pax.agreement_paper_id JOIN recruitingorder ON recruitingorder.id= agreement_paper_pax.recruit_id JOIN contact ON contact.id= recruitingorder.customer_id where agreement_paper.id= :id",array('id'=>$id));
        $agreement2= DB::select("SELECT agreement_paper.country_name,agreement_paper.gender,contact.display_name,agreement_paper_pax.agreement_paper_id,recruitingorder.passportNumber FROM agreement_paper JOIN agreement_paper_pax on agreement_paper.id= agreement_paper_pax.agreement_paper_id JOIN recruitingorder ON recruitingorder.id= agreement_paper_pax.recruit_id JOIN contact ON contact.id= recruitingorder.customer_id where agreement_paper.id= :id",array('id'=>$id));
        //dd($agreement);
        //$agreement2= DB::select("SELECT agreement_paper.country_name,agreement_paper.gender,contact.display_name,agreement_paper_pax.agreement_paper_id,recruitingorder.passportNumber FROM agreement_paper JOIN agreement_paper_pax on agreement_paper.id= agreement_paper_pax.agreement_paper_id JOIN recruitingorder ON recruitingorder.id= agreement_paper_pax.recruit_id JOIN contact ON contact.id= recruitingorder.customer_id",array('id'=>$id));
         //dd($agreement2);
        $formbasis=Formbasis::first();
       // dd($formbasis);
        $customer=Recruit_customer::first();

        $mpdf = new mPDF('utf-8', 'A4-P');
        $view =  view('recruitment::agreement.agreement_paper',compact('agreement','agreement2','formbasis','customer'));
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }


}
