<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <style>


    </style>

</head>
<body style="font-family: freeserif; font-size: 10pt;">

<div role="main" class="container">

    <div class="col-md-4">
        <img style="width: 60px;height: 70px" src="{!! asset('uploads/op-logo/'.$logo->logo) !!}" alt="">
    </div>
    <div class="row">
        <div class="col-md-4" style="text-align: center;padding-top: -90px;padding-left: 80px">
            <h1 style="font-weight: 900;text-transform: uppercase;color: green;">{!! $logo->company_name !!}</h1>
            <h6 style="font-weight: 400;text-transform: uppercase;font-size: 15px;margin-top: 10px;">({!! $logo->street !!}, {!! $logo->city !!}, {!! $logo->state !!}, {!! $logo->country !!}, {!! $logo->zip_code !!}, {!! $logo->contact_number !!}, {!! $logo->email !!}, {!! $logo->website !!})</h6>
        </div>
    </div>
    <br>

    <div class="row" style="margin: 0;padding: 0">
        <div style="margin: 0;padding: 0">
            <p style="margin: 0;padding: 0;text-transform: uppercase">order id.{!! $t !!}</p>
        </div>
        <div style="margin: 0;padding: 0;padding-top: -15px">
            @if($order->status==0)
                <p style="margin: 0;padding: 0;text-transform: uppercase;text-align: center ">status: <span style="color: red">pending</span></p>
            @else
                <p style="margin: 0;padding: 0;text-transform: uppercase;text-align: center ">status: <span style="color: green">Confirmed</span> </p>
            @endif
        </div>
        <div style="margin: 0;padding-top: -30px;margin-right: 30px">
            <p style="text-align: right;text-transform: uppercase">issue date: {!! $order->issuDate !!}</p>
        </div>
    </div>

    <div class="row" style="border: 1px solid green;margin: 0;padding: 0;height: 180px">
        <div class="col-md-3" style="padding-left: 20px">
            <h5 style="font-size: 13px;padding-top: -10px"> Customer Name:{!! $order->contact['display_name'] !!}</h5>
            <h5 style="font-size: 13px;padding-top: -10px">Contact Number:{!! $order->contact_number !!}</h5>
            <h5 style="font-size: 13px;padding-top: -10px">PNR Creation Date:{!! $order->pnrcreationDate !!}</h5>
            <h5 style="font-size: 13px;padding-top: -10px">Issu Time Limit:{!! $order->issuetimeLimit !!}</h5>
            <h5 style="font-size: 13px;padding-top: -10px">Departure Sector:{!! $order->departureSector !!}</h5>

        </div>
        <div class="col-md-3" style="padding-left: 400px;padding-top: -158px">
            <h5 style="font-size: 13px;;padding-top: -10px">Issued To:{!! $order->contact['first_name'] !!} {!! $order->contact['last_name'] !!}</h5>
            <h5 style="font-size: 13px;;padding-top: -10px">Record Location:{!! $order->recordLocator !!}</h5>
            <h5 style="font-size: 13px;;padding-top: -10px">Ticket Number:{!! $order->ticket_number !!}</h5>
            <h5 style="font-size: 13px;;padding-top: -10px">Document number:{!! $order->documentNumber !!}</h5>
            <h5 style="font-size: 13px;;padding-top: -10px">Return Sector:{!! $order->returnSector !!}</h5>
        </div>
        <div class="col-md-3" style="padding-top: -30px;padding-left: 20px;font-size: 12px">
            <h5 style="float: left;padding-right: 100px;font-size: 12px">Passenger: </h5>
            <h5 style="float: left;padding-right: 150px;font-size: 12px;padding-left: 20px">{!! $order->adultPassenger !!} (Adult) </h5>
            <h5 style="float: left;padding-right: 140px;font-size: 12px;">{!! $order->childPassenger !!} (Children)</h5>
            <h5 style="float: left;font-size: 12px">{!! $order->infantPassenger !!} (Infant) </h5>
        </div>
    </div>
    <br>

    <h4 style="text-transform: uppercase;text-decoration: underline;color: green">departure:</h4>

    <div class="row" style="">
        <div class="col-md-4" style="margin: 0;padding: 0">
            <h6 style="text-transform: uppercase;margin: 0;padding: 0;font-size: 12px"> from :{!! $order->departureFrom !!}</h6>
        </div>
        <div class="col-md-4" style="padding-left: 250px;padding-top: -40px">
            <h6 style="text-transform: uppercase;font-size: 12px">To:{!! $order->arriveTo !!}</h6>
        </div>
        <div class="col-md-4" style="padding-left: 480px;padding-top: -70px;">
            <h6 style="text-transform: uppercase;font-size: 12px">sector:{!! $order->departureSector !!}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h6 style="text-transform: uppercase;padding-top: -40px;font-size: 12px"> date :{!! $order->departureDate !!}</h6>
        </div>
        <div class="col-md-4" style="padding-left: 250px;padding-top: -40px">
            <h6 style="text-transform: uppercase;font-size: 12px">departure time:{!! $order->departureTime !!}</h6>
        </div>
        <div class="col-md-4" style="padding-left: 480px;padding-top: -70px">
            <h6 style="text-transform: uppercase;font-size: 12px">arrival time:{!! $order->arrivalTime !!}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h6 style="text-transform: uppercase;padding-top: -40px;font-size: 12px"> flight code :{!! $order->departureflightCode !!}</h6>
        </div>
        <div class="col-md-4" style="padding-left: 250px;padding-top: -40px">
            <h6 style="text-transform: uppercase;font-size: 12px">flight class:{!! $order->departureflightClass !!}</h6>
        </div>
    </div>

    <br>
    <h4 style="text-transform: uppercase;text-decoration: underline;color: green;margin-top: -20px">return:</h4>

    <div class="row" style="">
        <div class="col-md-4" style="margin: 0;padding: 0">
            <h6 style="text-transform: uppercase;margin: 0;padding: 0;font-size: 12px"> from :{!! $order->departureFrom !!}</h6>
        </div>
        <div class="col-md-4" style="padding-left: 250px;padding-top: -40px">
            <h6 style="text-transform: uppercase;font-size: 12px">To:{!! $order->arriveTo !!}</h6>
        </div>
        <div class="col-md-4" style="padding-left: 480px;padding-top: -70px;">
            <h6 style="text-transform: uppercase;font-size: 12px">sector:{!! $order->departureSector !!}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h6 style="text-transform: uppercase;padding-top: -40px;font-size: 12px"> date :{!! $order->departureDate !!}</h6>
        </div>
        <div class="col-md-4" style="padding-left: 250px;padding-top: -40px">
            <h6 style="text-transform: uppercase;font-size: 12px">departure time:{!! $order->departureTime !!}</h6>
        </div>
        <div class="col-md-4" style="padding-left: 480px;padding-top: -70px">
            <h6 style="text-transform: uppercase;font-size: 12px">arrival time:{!! $order->arrivalTime !!}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h6 style="text-transform: uppercase;padding-top: -40px;font-size: 12px"> flight code :{!! $order->departureflightCode !!}</h6>
        </div>
        <div class="col-md-4" style="padding-left: 250px;padding-top: -40px">
            <h6 style="text-transform: uppercase;font-size: 12px">flight class:{!! $order->departureflightClass !!}</h6>
        </div>
    </div>


    <br>
    <h4 style="text-transform: uppercase;text-decoration: underline;color: green;padding-top: -20px">hotel:</h4>

    <div class="row">
        <div class="col-md-4" style="padding-top: -30px">
            <h6 style="text-transform: uppercase;font-size: 12px"> name :{!! $order->hotel['title'] !!}</h6>
        </div>
        <div class="col-md-4" style="padding-left: 250px;padding-top: -70px">
            <h6 style="text-transform: uppercase;font-size: 12px">country:{!! $order->hotel['country'] !!}</h6>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4" style="padding-top: -30px">
            <h6 style="text-transform: uppercase;font-size: 12px"> address :{!! $order->hotel['address'] !!}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" style="padding-top: -30px">
            <h6 style="text-transform: uppercase;font-size: 12px"> note :{!! $order->hotel['note'] !!}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" style="padding-top: -30px">
            <h6 style="text-transform: uppercase;font-size: 12px"> comment :{!! $order->hotel_note !!}</h6>
        </div>
    </div>

</div>

</body>
</html>