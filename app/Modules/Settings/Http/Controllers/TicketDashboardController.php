<?php

namespace App\Modules\Settings\Http\Controllers;

use App\Models\Visa\Ticket\Order\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TicketDashboardController extends Controller
{
    public function dashboard(){

        $t= Carbon::today()->format('Y-m-d');

       // $order=Order::whereBtween('created_at',[date('Y-m-d')."".'00:00:00',date('Y-m-d')."".'23:59:59'])->get();

        $order=Order::whereDate('created_at',$t)->get();

        return view('settings::dashboard.index',compact('order','t'));
    }

    public function filter(Request $request){

        $validator = Validator::make($request->all(), [
            'from_date' => 'required|max:255',
            'to_date' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::route('ticket_dashboard_index')->withErrors($validator);
        }

        $start = date("Y-m-d",strtotime($request->input('from_date')));
        $end = date("Y-m-d",strtotime($request->input('to_date')));

        $order = Order::whereBetween('created_at', [$start, $end])->get();
        $t= Carbon::today()->format('Y-m-d');

        //dd($order);

        return view('settings::dashboard.index',compact('order','t'));
    }
}
