<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use mPDF;


class PdfController extends Controller
{
    public function getPdf(){


//        $dompdf = new Dompdf();
//        $view=view('pdf');
//        $dompdf->loadHtml($view);
//
//        $dompdf->setPaper('A4', 'landscape');
//
//        $dompdf->render();
//
//        $dompdf->stream();

    //return view('note_sheet');

    }

    public function medical(){

        return view('medical_slip');

//        $pdf = PDF::loadView('medical_slip');
//        return $pdf->download('invoice.pdf');
    }
    public function potro_1(){

        return view('potro_1');
    }
    public function potro_2(){

        return view('potro_2');
    }
    public function potro_3(){

        return view('potro_3');

//        $dompdf = new Dompdf();
//        $view=view('potro_3');
//        $dompdf->loadHtml($view);
//
//        //$dompdf->setPaper('A4', 'landscape');
//
//        $dompdf->render();
//
//        $dompdf->stream();

//        $pdf = PDF::loadView('potro_3');
//        return $pdf->download('invoice.pdf');

    }

    public function document(){

        //return view('document');

        $mpdf = new mPDF('utf-8', 'A4-L');
        $view =  view('document');

        $mpdf->WriteHTML($view);
        $mpdf->Output();

//        $dompdf = new Dompdf();
//        $view=view('document');
//        $dompdf->loadHtml($view);
//
//        $dompdf->setPaper('A4', 'landscape');
//
//        $dompdf->render();
//
//        $dompdf->stream();

//        $pdf = PDF::loadView('document');
//        return $pdf->download('invoice.pdf');
    }

    public function immegration_1(){

        return view('immigration_1');
    } public function immegration_2(){

        return view('immigration_2');
    }
    public function immegration_3(){

        return view('immigration_3');
    }
  public function immegration_4()
  {
   return view('immigration_4');
  }
  public function note_sheet()
  {
      //return view('note_sheet');
      $mpdf = new mPDF('utf-8', 'A4-L');
      $view =  view('note_sheet');
      $mpdf->WriteHTML($view);
      $mpdf->Output();
  }

    public function rabahinternational(){

       $mpdf = new mPDF('utf-8', 'A4');
        $view =  view('rabahinternational');
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }
    public function visaacceptance(){

        $mpdf = new mPDF('utf-8', 'A4');
        $view =  view('visaacceptance');
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }


    public function work_agreement(){

       //return view('note_sheet');
        $mpdf = new mPDF('utf-8', 'A4');
        $view =  view('work_agreement');
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }


    public function test(){

        $pdf = PDF::loadView('test');
        return $pdf->stream('invoice.pdf');
    }



    public function visa(){

     return view('visa');
    }
    public function billing(){

        $mpdf = new mPDF('utf-8', 'A4-L');
        $view =  view('billing');
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }

    public function mail(){
        return view('email');
    }






}
