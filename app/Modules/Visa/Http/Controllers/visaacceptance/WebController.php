<?php

namespace App\Modules\Visa\Http\Controllers\visaacceptance;

use App\Models\Formbasis\Formbasis;
use App\Models\OrganizationProfile\OrganizationProfile;
use App\Models\Recruit\Recruitorder;
use App\Models\Recruit_Customer\Recruit_customer;
use App\Models\Visa\Visa;
use App\Models\Visa\Visaacceptance;
use App\Modules\Visa\Http\Requests\visaacceptance\CreatePostRequest;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\View;
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
        $visa = Visaacceptance::all();
        return view('visa::visaacceptance.index')->with('visa',$visa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visa = Visa::all();

        return view('visa::visaacceptance.create')->with(array('regSerial'=>$visa));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        try
        {
         $visa = new Visaacceptance();

         $visa->visaentry_id= $request->registerSerial;
         $visa->visaadvice_status= $request->visaadvicestatus;
         $visa->visaadvice_comment= $request->visa_advice_comments;
         $visa->okala_status= $request->okala_status;
         $visa->okala_comment= $request->okala_comments;
         $visa->consulator_status= $request->consulator_status;
         $visa->consulator_comment= $request->consulator_comments;
         $visa->powerofattorny_status= $request->power_status;
         $visa->powerofattorny_comment= $request->power_comments;
         $visa->botaka_status= $request->botaka_status;
         $visa->botaka_comment= $request->botaka_comments;
         $visa->contactform_status= $request->contact_form_status;
         $visa->contactform_comment= $request->contact_form_comments;
         $visa->created_by= Auth::id();
         $visa->updated_by=Auth::id();

           if($visa->save())
              {

                  return Redirect::route('visaacceptance')->withInput()->with('alert.status', 'success')
                      ->with('alert.message', 'Visa Acceptance added successfully!');
              }
              else
              {
                  return back()->withInput()->with('alert.status', 'danger')
                      ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
              }

        }catch (\Illuminate\Database\QueryException $exception)
        {
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
    public function pdf($id)
    {


        $logo = OrganizationProfile::latest()->first();
        $company  = Formbasis::latest()->first();
        $visa = Visaacceptance::find($id);
        $passenger = Recruitorder::where('registerSerial_id', $visa->visaentry->id)->get();


        $data = array(
                  'logo'=>$logo,
                   'company_info'=>$company,
                    'visa'=>$visa,
                    'passenger'=>$passenger
                );
        $mpdf = new mPDF('utf-8', 'A4');
        $view =  view::make('visaacceptance_pdf')->with($data);

        $mpdf->SetTitle('Visa Acceptance file');

        $mpdf->WriteHTML($view);

       // $mpdf->Output('visaacceptance_pdf.pdf','D');
        $mpdf->Output();
    }

    public function visaPrint($id)
    {
        $logo = OrganizationProfile::latest()->first();
        $company  = Formbasis::latest()->first();
        $visa = Visaacceptance::find($id);
        $passenger = Recruitorder::where('registerSerial_id', $visa->visaentry->id)->get();
        $data = array(
            'logo'=>$logo,
            'company_info'=>$company,
            'visa'=>$visa,
            'passenger'=>$passenger
        );
        $mpdf = new mPDF('utf-8', 'A4');
        $view =  view('visaacceptance_pdf')->with($data);
        $mpdf->WriteHTML($view);
        $mpdf->SetTitle('Visa Acceptance file');
        $mpdf->SetJS('print();');
        $mpdf->Output();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visa = Visa::all();
        $singlevisa = Visaacceptance::find($id);
        return view('visa::visaacceptance.edit')->with(array('regSerial'=>$visa,'visa'=>$singlevisa));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, $id)
    {
        try
        {
            $visa = Visaacceptance::find($id);

            $visa->visaentry_id= $request->registerSerial;
            $visa->visaadvice_status= $request->visaadvicestatus;
            $visa->visaadvice_comment= $request->visa_advice_comments;
            $visa->okala_status= $request->okala_status;
            $visa->okala_comment= $request->okala_comments;
            $visa->consulator_status= $request->consulator_status;
            $visa->consulator_comment= $request->consulator_comments;
            $visa->powerofattorny_status= $request->power_status;
            $visa->powerofattorny_comment= $request->power_comments;
            $visa->botaka_status= $request->botaka_status;
            $visa->botaka_comment= $request->botaka_comments;
            $visa->contactform_status= $request->contact_form_status;
            $visa->contactform_comment= $request->contact_form_comments;

            $visa->updated_by=Auth::id();

            if($visa->save())
            {

                return Redirect::route('visaacceptance')->withInput()->with('alert.status', 'success')
                    ->with('alert.message', 'Visa Acceptance Updated successfully!');
            }
            else
            {
                return back()->withInput()->with('alert.status', 'danger')
                    ->with('alert.message', 'Sorry, something went wrong! Data cannot be Updated.');
            }

        }catch (\Illuminate\Database\QueryException $exception)
        {
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        if(is_null($id)){
            return Redirect::route('visaacceptance')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Somthing Wrong!');
        }

        $visa = Visaacceptance::find($id);

        if($visa->delete())
        {
            return Redirect::route('visaacceptance')->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Visa Acceptance Deleted successfully!');
        }else
        {
            return back()->with('alert.status', 'info')
                ->with('alert.message',  'Data Not Deleted.');
        }

    }
}
