<?php

namespace App\Modules\Settings\Http\Controllers\Order\order;

use App\Models\Contact\Contact;
use App\Models\Contact\ContactCategory;
use App\Models\Email\Email;
use App\Models\OrganizationProfile\OrganizationProfile;
use App\Models\Ticket\Ticket_Hotel;
use App\Models\Visa\Ticket\Order\Order;
use App\Models\Visa\Ticket\Order\Ticket_order_tax;
use App\Models\Visa\Ticket\TicketCommission;
use App\Models\Visa\Ticket\TicketTax;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use mPDF;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $order = Order::where('status','=',0)->get();
        //dd($order);

        return view('settings::order.order.pending',compact('order'));
    }

    public function confirmed()
    {
        $order = Order::where('status','=',1)->get();
        //dd($order);

        return view('settings::order.order.confirmed',compact('order'));
    }


    public function create()
    {

        $test=Contact::where('contact_category_id',1)
                        ->orWhere('contact_category_id',2)
                        ->orWhere('contact_category_id',3)
                        ->orWhere('contact_category_id',4)
                        ->orWhere('contact_category_id',5)
                        ->orWhere('contact_category_id',6)
                        ->get();



        $commition=TicketCommission::first();
        $contact = Contact::all();
        $ticket_tax=TicketTax::all();
        $ticket_hotel=Ticket_Hotel::all();
        return view('settings::order.order.create',compact('contact','ticket_tax','ticket_hotel','commition','test'));
    }


    public function store(Request $request)
    {
       // dd($request->all());

        $order = Order::all();
        if (count($order) > 0) {
            $order = Order::orderBy('created_at', 'desc')->first();

            $order_id =explode('-',$order['order_id'])[1];

            $order_id=$order_id+1;

            $t = str_pad($order_id, 6, '0', STR_PAD_LEFT);

            $input = Input::all();
            $condition = $input['ticket_tax_id'];

            if (isset($request->save)) {
                try {
                    $order = new Order();
                    $order->contact_id = $request->contact_id;
                    $order->gdsType = $request->gdsType;
                    $order->pnr = $request->pnr;
                    $order->first_name = $request->first_name;
                    $order->last_name = $request->last_name;
                    $order->contact_number = $request->contact_number;
                    $order->ticket_number = $request->ticket_number;
                    $order->pnrcreationDate = $request->pnrcreationDate;
                    $order->recordLocator = $request->recordLocator;
                    $order->departureflightCode = $request->departureflightCode;
                    $order->departureflightClass = $request->departureflightClass;
                    $order->departureDate = $request->departureDate;
                    $order->departureFrom = $request->departureFrom;
                    $order->arriveTo = $request->arriveTo;
                    $order->departureTime = $request->departureTime;
                    $order->arrivalTime = $request->arrivalTime;
                    $order->returnflightCode = $request->returnflightCode;
                    $order->returnflightbookingClass = $request->returnflightbookingClass;
                    $order->returnflightDate = $request->returnflightDate;
                    $order->returnflightFrom = $request->returnflightFrom;
                    $order->returnflightTo = $request->returnflightTo;
                    $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                    $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                    $order->issuetimeLimit = $request->issuetimeLimit;
                    $order->documentNumber = $request->documentNumber;
                    $order->order_id ='SO-'.$t;

                    //shanto

                    $order->issuDate = $request->issuDate;
                    $order->departureSector = $request->departureSector;
                    $order->returnSector = $request->returnSector;
                    $order->adultPassenger = $request->adultPassenger;
                    $order->childPassenger = $request->childPassenger;
                    $order->infantPassenger = $request->infantPassenger;
                    $order->hotel_note = $request->hotel_note;
                    $order->status = 0;
                    $order->fareAmount = $request->fareAmount;
                    $order->commissionRate = $request->commissionRate;
                    $order->taxOnCommission = $request->taxOnCommission;
                    $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                    $order->vendor_id = $request->vendor_id;

                    $order->created_by = Auth::id();
                    $order->updated_by = Auth::id();
                    $order->save();
                    if ($order) {

                        foreach ($condition as $con) {
                            $ticket_pax = new Ticket_order_tax();
                            $ticket_pax->ticket_order_id = $order->id;
                            $ticket_pax->ticket_tax_id = $con;
                            $ticket_pax->save();
                        }

                        return Redirect::route('ticket_Order_pending')->with('save', 'Pending Data saved!');
                    }

                } catch (\Illuminate\Database\QueryException $ex) {

//                return back()->withInput()->with('alert.status', 'danger')
//                    ->with('alert.message', 'Not saved!');

                    dd($ex);
                }
            } elseif (isset($request->confirm)) {
                try {
                    $order = new Order();
                    $order->contact_id = $request->contact_id;
                    $order->gdsType = $request->gdsType;
                    $order->pnr = $request->pnr;
                    $order->first_name = $request->first_name;
                    $order->last_name = $request->last_name;
                    $order->contact_number = $request->contact_number;
                    $order->ticket_number = $request->ticket_number;
                    $order->pnrcreationDate = $request->pnrcreationDate;
                    $order->recordLocator = $request->recordLocator;
                    $order->departureflightCode = $request->departureflightCode;
                    $order->departureflightClass = $request->departureflightClass;
                    $order->departureDate = $request->departureDate;
                    $order->departureFrom = $request->departureFrom;
                    $order->arriveTo = $request->arriveTo;
                    $order->departureTime = $request->departureTime;
                    $order->arrivalTime = $request->arrivalTime;
                    $order->returnflightCode = $request->returnflightCode;
                    $order->returnflightbookingClass = $request->returnflightbookingClass;
                    $order->returnflightDate = $request->returnflightDate;
                    $order->returnflightFrom = $request->returnflightFrom;
                    $order->returnflightTo = $request->returnflightTo;
                    $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                    $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                    $order->issuetimeLimit = $request->issuetimeLimit;
                    $order->documentNumber = $request->documentNumber;
                    $order->order_id = 'SO-'.$t;

                    //shanto

                    $order->issuDate = $request->issuDate;
                    $order->departureSector = $request->departureSector;
                    $order->returnSector = $request->returnSector;
                    $order->adultPassenger = $request->adultPassenger;
                    $order->childPassenger = $request->childPassenger;
                    $order->infantPassenger = $request->infantPassenger;
                    $order->hotel_note = $request->hotel_note;
                    $order->status = 1;
                    $order->fareAmount = $request->fareAmount;
                    $order->commissionRate = $request->commissionRate;
                    $order->taxOnCommission = $request->taxOnCommission;
                    $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                    $order->vendor_id = $request->vendor_id;

                    $order->created_by = Auth::id();
                    $order->updated_by = Auth::id();
                    $order->saveOrFail();

                    if ($order) {

                        foreach ($condition as $con) {
                            $ticket_pax = new Ticket_order_tax();
                            $ticket_pax->ticket_order_id = $order->id;
                            $ticket_pax->ticket_tax_id = $con;
                            $ticket_pax->save();
                        }
                        return Redirect::route('ticket_Order_confirmed')->with('save', 'Confirmed Data saved!');
                    }

                } catch (\Illuminate\Database\QueryException $ex) {

                    return back()->withInput()->with('alert.status', 'danger')
                        ->with('alert.message', 'Data Not saved!');

                    //dd($ex);
                }
            }
        }else{


            $input = Input::all();
            $condition = $input['ticket_tax_id'];

            if (isset($request->save)) {
                try {
                    $order = new Order();
                    $order->contact_id = $request->contact_id;
                    $order->gdsType = $request->gdsType;
                    $order->pnr = $request->pnr;
                    $order->first_name = $request->first_name;
                    $order->last_name = $request->last_name;
                    $order->contact_number = $request->contact_number;
                    $order->ticket_number = $request->ticket_number;
                    $order->pnrcreationDate = $request->pnrcreationDate;
                    $order->recordLocator = $request->recordLocator;
                    $order->departureflightCode = $request->departureflightCode;
                    $order->departureflightClass = $request->departureflightClass;
                    $order->departureDate = $request->departureDate;
                    $order->departureFrom = $request->departureFrom;
                    $order->arriveTo = $request->arriveTo;
                    $order->departureTime = $request->departureTime;
                    $order->arrivalTime = $request->arrivalTime;
                    $order->returnflightCode = $request->returnflightCode;
                    $order->returnflightbookingClass = $request->returnflightbookingClass;
                    $order->returnflightDate = $request->returnflightDate;
                    $order->returnflightFrom = $request->returnflightFrom;
                    $order->returnflightTo = $request->returnflightTo;
                    $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                    $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                    $order->issuetimeLimit = $request->issuetimeLimit;
                    $order->documentNumber = $request->documentNumber;
                    $order->order_id ='SO-'.str_pad(1, 6, '0', STR_PAD_LEFT);;

                    //shanto

                    $order->issuDate = $request->issuDate;
                    $order->departureSector = $request->departureSector;
                    $order->returnSector = $request->returnSector;
                    $order->adultPassenger = $request->adultPassenger;
                    $order->childPassenger = $request->childPassenger;
                    $order->infantPassenger = $request->infantPassenger;
                    $order->hotel_note = $request->hotel_note;
                    $order->status = 0;
                    $order->fareAmount = $request->fareAmount;
                    $order->commissionRate = $request->commissionRate;
                    $order->taxOnCommission = $request->taxOnCommission;
                    $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                    $order->vendor_id = $request->vendor_id;

                    $order->created_by = Auth::id();
                    $order->updated_by = Auth::id();
                    $order->save();
                    if ($order) {

                        foreach ($condition as $con) {
                            $ticket_pax = new Ticket_order_tax();
                            $ticket_pax->ticket_order_id = $order->id;
                            $ticket_pax->ticket_tax_id = $con;
                            $ticket_pax->save();
                        }

                        return Redirect::route('ticket_Order_pending')->with('save', 'Pending Data saved!');
                    }

                } catch (\Illuminate\Database\QueryException $ex) {

//                return back()->withInput()->with('alert.status', 'danger')
//                    ->with('alert.message', 'Not saved!');

                    dd($ex);
                }
            } elseif (isset($request->confirm)) {
                try {
                    $order = new Order();
                    $order->contact_id = $request->contact_id;
                    $order->gdsType = $request->gdsType;
                    $order->pnr = $request->pnr;
                    $order->first_name = $request->first_name;
                    $order->last_name = $request->last_name;
                    $order->contact_number = $request->contact_number;
                    $order->ticket_number = $request->ticket_number;
                    $order->pnrcreationDate = $request->pnrcreationDate;
                    $order->recordLocator = $request->recordLocator;
                    $order->departureflightCode = $request->departureflightCode;
                    $order->departureflightClass = $request->departureflightClass;
                    $order->departureDate = $request->departureDate;
                    $order->departureFrom = $request->departureFrom;
                    $order->arriveTo = $request->arriveTo;
                    $order->departureTime = $request->departureTime;
                    $order->arrivalTime = $request->arrivalTime;
                    $order->returnflightCode = $request->returnflightCode;
                    $order->returnflightbookingClass = $request->returnflightbookingClass;
                    $order->returnflightDate = $request->returnflightDate;
                    $order->returnflightFrom = $request->returnflightFrom;
                    $order->returnflightTo = $request->returnflightTo;
                    $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                    $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                    $order->issuetimeLimit = $request->issuetimeLimit;
                    $order->documentNumber = $request->documentNumber;
                    $order->order_id = 'SO-'.str_pad(1, 6, '0', STR_PAD_LEFT);;

                    //shanto

                    $order->issuDate = $request->issuDate;
                    $order->departureSector = $request->departureSector;
                    $order->returnSector = $request->returnSector;
                    $order->adultPassenger = $request->adultPassenger;
                    $order->childPassenger = $request->childPassenger;
                    $order->infantPassenger = $request->infantPassenger;
                    $order->hotel_note = $request->hotel_note;
                    $order->status = 1;
                    $order->fareAmount = $request->fareAmount;
                    $order->commissionRate = $request->commissionRate;
                    $order->taxOnCommission = $request->taxOnCommission;
                    $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                    $order->vendor_id = $request->vendor_id;

                    $order->created_by = Auth::id();
                    $order->updated_by = Auth::id();
                    $order->saveOrFail();

                    if ($order) {

                        foreach ($condition as $con) {
                            $ticket_pax = new Ticket_order_tax();
                            $ticket_pax->ticket_order_id = $order->id;
                            $ticket_pax->ticket_tax_id = $con;
                            $ticket_pax->save();
                        }
                        return Redirect::route('ticket_Order_confirmed')->with('save', 'Confirmed Data saved!');
                    }

                } catch (\Illuminate\Database\QueryException $ex) {

                    return back()->withInput()->with('alert.status', 'danger')
                        ->with('alert.message', 'Data Not saved!');

                    //dd($ex);
                }
            }
        }



    }


    public function edit($id)
    {
        $test=Contact::where('contact_category_id',1)
            ->orWhere('contact_category_id',2)
            ->orWhere('contact_category_id',3)
            ->orWhere('contact_category_id',4)
            ->orWhere('contact_category_id',5)
            ->orWhere('contact_category_id',6)
            ->get();

        $order_pax=Ticket_order_tax::where('ticket_order_id',$id)->get();
        //dd($order_pax);
        $ticket_tax=TicketTax::all();
        $ticket_hotel=Ticket_Hotel::all();
        $order = Order::find($id);
        //dd($order);
        $contact = Contact::all();
        return view('settings::order.order.edit',compact('order','contact','ticket_tax','ticket_hotel','order_pax','test'));
    }


    public function update(Request $request,$id)
    {

        $input = Input::all();
        $condition = $input['ticket_tax_id'];

        if ($request->submit!='Save'){

            try{
                $order = Order::find($id);
                $order->contact_id =$request->contact_id;
                $order->gdsType =$request->gdsType;
                $order->pnr =$request->pnr;
                $order->first_name =$request->first_name;
                $order->last_name =$request->last_name;
                $order->contact_number =$request->contact_number;
                $order->ticket_number =$request->ticket_number;
                $order->pnrcreationDate =$request->pnrcreationDate;
                $order->recordLocator =$request->recordLocator;
                $order->departureflightCode =$request->departureflightCode;
                $order->departureflightClass =$request->departureflightClass;
                $order->departureDate =$request->departureDate;
                $order->departureFrom =$request->departureFrom;
                $order->arriveTo =$request->arriveTo;
                $order->departureTime =$request->departureTime;
                $order->arrivalTime =$request->arrivalTime;
                $order->returnflightCode =$request->returnflightCode;
                $order->returnflightbookingClass =$request->returnflightbookingClass;
                $order->returnflightDate =$request->returnflightDate;
                $order->returnflightFrom =$request->returnflightFrom;
                $order->returnflightTo =$request->returnflightTo;
                $order->returnflightdepartureTime =$request->returnflightdepartureTime;
                $order->returnflightarrivalDate =$request->returnflightarrivalDate;
                $order->issuetimeLimit =$request->issuetimeLimit;
                $order->documentNumber =$request->documentNumber;


                //shanto
                $order->issuDate =$request->issuDate;
                $order->departureSector =$request->departureSector;
                $order->returnSector =$request->returnSector;
                $order->adultPassenger =$request->adultPassenger;
                $order->childPassenger =$request->childPassenger;
                $order->infantPassenger =$request->infantPassenger;
                $order->hotel_note =$request->hotel_note;
                $order->status =1;
                $order->fareAmount =$request->fareAmount;
                $order->commissionRate =$request->commissionRate;
                $order->taxOnCommission =$request->taxOnCommission;
                $order->ticket_hotel_id =$request->ticket_hotel_id?$request->ticket_hotel_id:null;
                $order->vendor_id =$request->vendor_id;

                $order->created_by = Auth::id();
                $order->updated_by = Auth::id();
                $order->save();
                if ($order){
                    $delete = Ticket_order_tax::where('ticket_order_id',$id)->delete();
                    foreach ($condition as $con){
                        $ticket_pax=new Ticket_order_tax();
                        $ticket_pax->ticket_order_id=$order->id;
                        $ticket_pax->ticket_tax_id=$con;
                        $ticket_pax->save();
                    }

                    return Redirect::route('ticket_Order_confirmed')->with('up', 'Confirmed Data Update!');
                }

            }catch (\Illuminate\Database\QueryException $ex){

                return back()->withInput()->with('alert.status', 'danger')
                    ->with('alert.message', 'Not saved!');

                //dd($ex);
            }
        }elseif($request->submit!='Save & Confirm'){
            try{
                $order  = Order::find($id);;
                $order->contact_id =$request->contact_id;
                $order->gdsType =$request->gdsType;
                $order->pnr =$request->pnr;
                $order->first_name =$request->first_name;
                $order->last_name =$request->last_name;
                $order->contact_number =$request->contact_number;
                $order->ticket_number =$request->ticket_number;
                $order->pnrcreationDate =$request->pnrcreationDate;
                $order->recordLocator =$request->recordLocator;
                $order->departureflightCode =$request->departureflightCode;
                $order->departureflightClass =$request->departureflightClass;
                $order->departureDate =$request->departureDate;
                $order->departureFrom =$request->departureFrom;
                $order->arriveTo =$request->arriveTo;
                $order->departureTime =$request->departureTime;
                $order->arrivalTime =$request->arrivalTime;
                $order->returnflightCode =$request->returnflightCode;
                $order->returnflightbookingClass =$request->returnflightbookingClass;
                $order->returnflightDate =$request->returnflightDate;
                $order->returnflightFrom =$request->returnflightFrom;
                $order->returnflightTo =$request->returnflightTo;
                $order->returnflightdepartureTime =$request->returnflightdepartureTime;
                $order->returnflightarrivalDate =$request->returnflightarrivalDate;
                $order->issuetimeLimit =$request->issuetimeLimit;
                $order->documentNumber =$request->documentNumber;


                //shanto
                $order->issuDate =$request->issuDate;
                $order->departureSector =$request->departureSector;
                $order->returnSector =$request->returnSector;
                $order->adultPassenger =$request->adultPassenger;
                $order->childPassenger =$request->childPassenger;
                $order->infantPassenger =$request->infantPassenger;
                $order->hotel_note =$request->hotel_note;
                $order->status =0;
                $order->fareAmount =$request->fareAmount;
                $order->commissionRate =$request->commissionRate;
                $order->taxOnCommission =$request->taxOnCommission;
                $order->ticket_hotel_id =$request->ticket_hotel_id?$request->ticket_hotel_id:null;
                $order->vendor_id =$request->vendor_id;

                $order->created_by = Auth::id();
                $order->updated_by = Auth::id();
                $order->saveOrFail();

                if ($order){

                    foreach ($condition as $con){
                        $ticket_pax=new Ticket_order_tax();
                        $ticket_pax->ticket_order_id=$order->id;
                        $ticket_pax->ticket_tax_id=$con;
                        $ticket_pax->save();
                    }
                    return Redirect::route('ticket_Order_pending')->with('update', 'Pending Data Update!');
                }

            }catch (\Illuminate\Database\QueryException $ex){

//                return back()->withInput()->with('alert.status', 'danger')
//                    ->with('alert.message', 'Data Not saved!');

                dd($ex);
            }
        }

    }

    public function destroy($id,$bill=null,$invoice=null){

        $bill=$bill;

        $invoice=$invoice;

        if ($bill && $invoice){

            return redirect()->back()->with('del','You have a Bill/Invoice attached with this order.Pleas delete the bill/invoice first');

        }

        elseif ($bill){
            return redirect()->back()->with('del','You have a Bill attached with this order.Pleas delete the bill first');

        }

        elseif ($invoice){
            return redirect()->back()->with('del','You have a Invoice attached with this order.Pleas delete the Invoice first');

        }else{

            $order=Order::find($id);
            if ($order->status==1){
                if ($order->delete()){

                    $delete = Ticket_order_tax::where('ticket_order_id',$id)->delete();
                }
                return redirect()->back()->with('del','Confirmed Data Deleted');

            }else{

                if ($order->delete()){

                    $delete = Ticket_order_tax::where('ticket_order_id',$id)->delete();
                }
                return redirect()->back()->with('del','Pending Data Deleted');
            }

        }


    }

    public function pendinUpdate($id){

        $order=Order::find($id);
        if ($order->ststus==0){
            $order->status=1;
            $order->save();
            return Redirect::route('ticket_Order_confirmed')->with('alert.status', 'success')
                ->with('alert.message', 'Pending data Confirmed  successfully!');

        }

    }

    public function orderPdf($id){

        $logo=OrganizationProfile::first();
        //dd($logo);

        $order=Order::find($id);
        //dd($order);
        $t = str_pad($order->order_id, 6, '0', STR_PAD_LEFT);
        $pdf = PDF::loadView('settings::order.order.orderPdf',compact('logo','order','t'));
        return $pdf->stream('invoice.pdf');

    }


    public function orderMail($id){

        $order=Order::find($id);

        return view('settings::order.order.mailForm',compact('order'));


    }

    public function orderMailStore(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'email_address' => 'required',
            'subject' => 'required',
            'details' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        $order=Order::find($id);
        $t = str_pad($order->order_id, 6, '0', STR_PAD_LEFT);
        $logo=OrganizationProfile::first();
        $pdf = PDF::loadView('settings::order.order.orderPdf',compact('logo','order','t'));
        $path=uniqid().'.pdf';
        $filename = public_path('path/'.$path);
        $pdf->save($filename);


        $email=new Email();
        $email->to=$request->email_address;
        $email->subject=$request->subject;
        $email->details=$request->details;
        $email->file=$path;
        $email->created_by=Auth::user()->id;
        $email->updated_by=Auth::user()->id;
        $email->save();


        Mail::send('settings::order.order.mail',array('order'=>$order,'logo'=>$logo,'t'=>$t),function($messeg) use ($pdf){

            $messeg->to(Input::get('email_address'))->subject('Welcome to Ontik Technology');


            $messeg->attachData($pdf->output(), "invoice.pdf");

        });


        return redirect()->back()->with('msg','Email sended successfully.Pleas Check your Email');

    }


    public function SendMailShow(){

      try{
          $start = date('Y-m-01');
          $end= date("Y-m-t", strtotime($start) ) ;
          $email=Email::whereBetween('created_at',array($start,$end))->get();
          return view('settings::order.order.ShowSendEmail',compact('email','start','end'));
      }catch (\Exception $ex){
          return back()->with('msg','something wrong');
      }


    }

    public function SendMailShowbyfilter(Request $request){

        try{
            $start = $request->from_date;
            $end= $request->to_date;
            $email=Email::whereBetween('created_at',array($start,$end))->get();
            return view('settings::order.order.ShowSendEmail',compact('email','start','end'));
        }catch (\Exception $ex){
            return back()->with('msg','something wrong');
        }


    }

    public function SendMailShowPerID($id){

        try{
            $email=Email::find($id);
            return view('settings::order.order.ShowSendEmailPerID',compact('email'));
        }catch (\Exception $ex){
            return back()->with('msg','something wrong');
        }


    }











}
