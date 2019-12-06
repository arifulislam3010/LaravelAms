<?php

namespace App\Modules\Order\Http\Controllers\Order;

use App\Models\Contact\Contact;
use App\Models\Inventory\Item;
use App\Models\Moneyin\Invoice;
use App\Models\Recruit\Recruitorder;
use App\Models\Visa\Visa;
use App\Modules\Order\Http\Requests\order\CreatePostRequest;
use App\Modules\Order\Http\Requests\order\UpdatePostRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Recruitorder::all();
        return view('order::order.index')->with('order',$order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer =  Contact::all();
        $package = Item::all();
        $registerserial = Visa::all();
        $invoice = Invoice::all();
        return view('order::order.create',compact('customer','package','registerserial','invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
      $visa= Visa::find($request->registerSerial_id);
      $visasell = Recruitorder::where('registerSerial_id',$request->registerSerial_id)->count();




     if($visasell>$visa->numberofVisa){
         return back()->withInput()->with('alert.status', 'danger')
             ->with('alert.message', 'Sorry, No Available visa ! Data cannot be Created.');
     }

      $order =  new Recruitorder();


      $order->customer_id= $request->customer_id;
      $order->package_id=$request->package_id;
      $order->registerSerial_id=$request->registerSerial_id;
      $order->paxid=$request->paxid;
      $order->passportNumber=$request->passportNumber;
      $order->passportnumberbn=$request->passportNumberbn;
      $order->placeofissue=$request->placeofissue;
      $order->passportDate=$request->order_date;
      $order->passportissuedate=$request->issue_date;
      $order->created_by= Auth::id();
      $order->updated_by=Auth::id();


        if ($order->save()) {
            return Redirect::route('order')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Recruiting Order Created successfully!');
        } else {
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Data cannot be Created.');


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
        $order = Recruitorder::find($id);

        $customer =  Contact::all();
        $package = Item::all();
        $registerserial = Visa::all();
        $invoice = Invoice::all();
        return view('order::order.edit',compact('customer','package','registerserial','invoice','order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $order =  Recruitorder::find($id);

        $order->customer_id= $request->customer_id;
        $order->package_id=$request->package_id;
        $order->registerSerial_id=$request->registerSerial_id;
        $order->paxid=$request->paxid;
        $order->passportNumber=$request->passportNumber;
        $order->passportNumberbn=$request->passportNumberbn;
        $order->placeofissue=$request->placeofissue;
        $order->passportDate=$request->order_date;
        $order->passportissuedate=$request->issue_date;
        $order->invoice_id=$request->invoice_id? $request->invoice_id:null;
        $order->updated_by=Auth::id();


        if ($order->save()) {
            return Redirect::route('order')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Recruiting Order Updated successfully!');
        } else {
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Data cannot be Updated.');


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $order = Recruitorder::find($id);

        if(!$order->invoice_id)
        {
            $order->delete();

            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Recruiting Order deleted.');
        }else
        {
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'You have an invoice attached with this entry . Please delete invoice first');
        }

    }
	
	public function pdf()
	{
		$pdf = PDF::loadView('order::form.index');
           return $pdf->download('invoice.pdf');
		
	}
}
