<?php

namespace App\Modules\Visa\Http\Controllers\visaform;

use App\Lib\Visaformpdf;
use App\Models\Recruit\Recruitorder;
use App\Models\Visa\Visaform;
use App\Models\Visa\Visaformagreement;
use App\Models\Visa\Visaformbulk;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use League\Flysystem\Exception;
use mPDF;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $visaform = Visaform::all();

         return view('visa::visaform.index')->with('visa',$visaform);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pax = Recruitorder::all();
        return view('visa::visaform.create')->with('pax',$pax);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pax_id =  $request->paxid;
        $officedate= $request->officeDate;
        $authorization= $request->authorization;
        $footerNumber= $request->footerNumber;
        $so= $request->so;
        $name= null;
        $gender = null;
        $datebirth = null;
        $relationship = null;
        $i=0;
        $j=0;
        $n =0;
        $x = 0;
        $y=0;
        try{
            $agreementdata = [];
            $visaform = new Visaform();
            $visaform->pax_id = $pax_id;
            $visaform->so = $so;
            $visaform->officeDate = $officedate;
            $visaform->authorization = $authorization;
            $visaform->footerNumber = $footerNumber;
            $visaform->created_by = Auth::id();
            $visaform->updated_by = Auth::id();
            $visaformdata = [];
            if($visaform->save())
            {

                if($request->gender)
                {
                    foreach ($request->gender as $key=>$value)
                    {
                        $m = "s_".++$n.":i_0";
                        if(is_array($request->name[$key])){
                            $visaformdata[$key]['name'] = $name= $request->name[$key][$m];
                        }else{
                            $visaformdata[$key]['name']=  $name=$request->name[$key];
                        }

                        $g= $key;
                        if(is_array($value)){
                            $k = "s_".++$g.":i_1";
                            $visaformdata[$key]['gender']=  $gender=$value[$k];
                        }else{
                            $visaformdata[$key]['gender']= $gender= $value;
                        }
                        $b = "s_".++$i.":i_2";
                        if(is_array($request->dateofBirth[$key])){
                            $visaformdata[$key]['birth'] =  $datebirth= $request->dateofBirth[$key][$b];

                        }else{
                            $visaformdata[$key]['birth']=   $datebirth=$request->dateofBirth[$key];
                        }
                        $r = "s_".++$j.":i_3";
                        if(is_array($request->relationship[$key])){
                            $visaformdata[$key]['relation'] =  $relationship= $request->relationship[$key][$r];
                        }else{
                            $visaformdata[$key]['relation']= $relationship=$request->relationship[$key];
                        }



                    }
                    foreach ($visaformdata as $value)
                    {

                        $v= new Visaformbulk();
                        $v->visaform_id = $visaform->id;
                        $v->name = $value['name'];
                        $v->gender = $value['gender'];
                        $v->dateofBirth = $value['birth'];
                        $v->relationship = $value['relation'];
                        $v->save();

                    }
                }



                if(isset($request->agreementEn))
                {
                    foreach ($request->agreementEn as $key=>$value)
                    {
                        $x= $key;
                        if(is_array($value)){
                            $en = "s_".++$x.":i_0";
                            $agreementdata[$key]['en']= $value[$en];
                        }else{
                            $agreementdata[$key]['en']=  $value;
                        }
                        $ar = "s_".++$y.":i_1";
                        if(is_array($request->agreementAr[$key])){
                            $agreementdata[$key]['ar'] =   $request->agreementAr[$key][$ar];
                        }else{
                            $agreementdata[$key]['ar']= $request->agreementAr[$key];
                        }
                    }
                }


                foreach ($agreementdata as $value)
                {
                    $agre= new Visaformagreement();
                    $agre->agreementEn = $value['en'];
                    $agre->agreementAr = $value['ar'];
                    $agre->visaform_id = $visaform->id;
                    $agre->save();
                }


            }
            return Redirect::route('visaform')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Visa Forms added successfully!');
        }catch (\Illuminate\Database\QueryException $e){
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
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
        $pax = Recruitorder::all();
        $visa =  Visaform::find($id);
        return view('visa::visaform.edit')->with(array('pax'=>$pax,'visa'=>$visa));
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

        $pax_id =  $request->paxid;
        $officedate= $request->officeDate;
        $authorization= $request->authorization;
        $footerNumber= $request->footerNumber;
        $so= $request->so;
        $name= null;
        $gender = null;
        $datebirth = null;
        $relationship = null;

        try{
            $agreementdata = [];
            $visaform =  Visaform::find($id);
            $visaform->pax_id = $pax_id;
            $visaform->so = $so;
            $visaform->officeDate = $officedate;
            $visaform->authorization = $authorization;
            $visaform->footerNumber = $footerNumber;

            $visaform->updated_by = Auth::id();
            $visaformdata = [];
            if($visaform->save())
            {
                if($request->gender)
                {
                    foreach ($request->gender as $key=>$value)
                    {
                       if(is_array($request->name[$key])){
                            $m = array_keys($value)[0];
                            $visaformdata[$key]['name'] =$value[$m];
                        }else{
                            $visaformdata[$key]['name']=  $value;
                        }
                        if(is_array($value)){
                            $k = array_keys($value)[0];
                            $visaformdata[$key]['gender']=  $value[$k];
                        }else{
                            $visaformdata[$key]['gender']= $value;
                        }
                        if(is_array($request->dateofBirth[$key])){
                            $b = array_keys($value)[0];
                            $visaformdata[$key]['birth'] =  $value[$b];
                        }else{
                            $visaformdata[$key]['birth']=  $value;
                        }
                        if(is_array($request->relationship[$key])){
                            $r =array_keys($value)[0];
                            $visaformdata[$key]['relation'] = $value[$r];
                        }else{
                            $visaformdata[$key]['relation']= $value;
                        }
                    }

                 $bulkdata= new \App\Lib\Visaform();
                 $bulkdata->updateformdata($visaformdata,$visaform->id);
                }


               if(isset($request->agreementEn))
                {
                    foreach ($request->agreementEn as $key=>$value)
                    {
                        if(is_array($value)){
                            $en = array_keys($value)[0];
                            $agreementdata[$key]['en']= $value[$en];
                        }else{
                            $agreementdata[$key]['en']=  $value;
                        }
                        if(is_array($request->agreementAr[$key])){
                            $ar = array_keys($value)[0];
                            $agreementdata[$key]['ar'] =   $value[$ar];
                        }else{
                            $agreementdata[$key]['ar']= $value;
                        }
                    }
                }
              $bulkdata->updateAgreementdata($agreementdata,$visaform->id);

            }
            return Redirect::route('visaform')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Visa Forms Updated successfully!');
        }catch (\Illuminate\Database\QueryException $e){
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Data cannot be Update.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bulkdata= new \App\Lib\Visaform();
        if($bulkdata->destroyRow($id))
        {
            return Redirect::route('visaform')->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Visa Forms Deleted!');
        }else
        {
            return Redirect::route('visaform')->withInput()->with('alert.status', 'info')
                ->with('alert.message', 'Visa Forms not Deleted!');
        }
    }

    public function pdf($id)
    {
       $visaformdata = Visaform::find($id);
       $pdf = new Visaformpdf($id);


      $data = array(
          'full_name'=>$pdf->contactinfo(),
          'visaform'=>$visaformdata,
          'recruit_customer'=>$pdf->Recruit_customer(),
          'recruit_order'=>$pdf->RecruitOrder(),
          'flight'=>$pdf->Flight(),
          'visaentry'=> $pdf->IqamaSector(),
          'visaform'=>$visaformdata,
          'Company'=>$pdf->ComapanyName()

      );


      return view('visa')->with($data);
    }

    public function visaPrint($id)
    {
        $visaformdata = Visaform::find($id);
        $pdf = new Visaformpdf($id);


        $data = array(
            'full_name'=>$pdf->contactinfo(),
            'visaform'=>$visaformdata,
            'recruit_customer'=>$pdf->Recruit_customer(),
            'recruit_order'=>$pdf->RecruitOrder(),
            'flight'=>$pdf->Flight(),
            'visaentry'=> $pdf->IqamaSector(),
            'visaform'=>$visaformdata,
            'Company'=>$pdf->ComapanyName()

        );


        return view('visaPrint')->with($data);
    }

    public function statement($id)
    {
        $pdf = new Visaformpdf($id);
        $contact = $pdf->contactinfo();
        $company = $pdf->NameAr();
        $recruit = $pdf->RecruitOrder();
        //return view('note_sheet');
        $agreement = $pdf->Agreement()->agreement;

        $customer= $pdf->Recruit_customer();
        $mpdf = new mPDF('utf-8', 'A4');
        $view =  view('work_agreement',compact('contact','company','recruit','customer','agreement'));
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }

    public function AgreementPaper($id)
    {


        $pdf = new Visaformpdf($id);
        $contact =$pdf->contactinfo();
        $name= $pdf->NameAr();
        $visanumber = $pdf->IqamaSector();
        $recruit = $pdf->RecruitOrder();
        $customer = $pdf->getCustomer();

        $mpdf = new mPDF('utf-8', 'A4');
        $view =  view('rabahinternational',compact('name','visanumber','recruit','contact','customer'));
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }
}
