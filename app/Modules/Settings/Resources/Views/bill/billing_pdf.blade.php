<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <style>
         body{
         text-transform:uppercase;
        }

     table#header tr td {
       text-align: center;
       text-transform:uppercase;
       width: 33%;
       font-size: 12px;
       font-weight: bold;

     }

         table#body tr td {
             text-align: center;


         }
         table#body tr tr:first-child td {
             border-bottom: 1px solid grey;
             padding: 10px;
         }


    </style>
</head>

<body>

<table id="header"  style="width: 100%">
  <tr>
      <td>modele serial</td>
      <td> Agent Billing Details</td>
      <td>42-3 014522 air chennel international</td>

  </tr>

</table>
<hr  style="height: 2px; color: #0a001f" />
<table id="body"  style="width: 100%; text-align: right; vertical-align: top; font-size: 10px;">

    <tr>
        <td style="border-bottom: 1px solid black; padding: 7px;">SERIAL</td>
        <td style="border-bottom: 1px solid black; padding: 7px;">DOCUMENT <br/> NUMBER</td>
        <td style="border-bottom: 1px solid black; padding: 7px;">Issue Date</td>
        <td style="border-bottom: 1px solid black; padding: 7px;">Transection <br/> Amount</td>
        <td style="border-bottom: 1px solid black; padding: 7px;">FARE Amount</td>
        <td style="border-bottom: 1px solid black; padding: 7px; width: 100px;"> <br/>TAX </td>
        <td style="border-bottom: 1px solid black; padding: 7px;"> <br/>Commission Rate </td>
        <td style="border-bottom: 1px solid black; padding: 7px;"> <br/>Amt Rate </td>
        <td style="border-bottom: 1px solid black; padding: 7px;width: 100px;"> Tax on Comm </td>
        <td style="border-bottom: 1px solid black; padding: 7px;"> Balance <br> Payable</td>


    </tr>


    <?php $i=1; ?>

    {{--@for($i=0;$i<18;$i++)--}}
    @foreach($order as $value)

        @foreach($value->tax as $item)
            {!! $t=($value->fareAmount)*(($item->amount)/100) !!} BD<br>
            <?php $b+=$t; ?>
        @endforeach

    <tr>
        <td>{!! $i++ !!}</td>
        <td>{!! $value->documentNumber !!}</td>
        <td>{!! $value->issuDate !!}</td>
        <td>{!! $balance=($value->fareAmount)+$b !!}</td>
        <td>{!! $value->fareAmount !!}</td>


        <td width="50px">
            @foreach($value->tax as $item)
            {!! ($value->fareAmount)*(($item->amount)/100) !!}-({!! $item->title !!})<br>
            @endforeach

        </td>


        <td>{!! $value->commissionRate !!}</td>
        <td>{!! $amt=($value->fareAmount)*(($value->commissionRate)/100) !!}</td>
        <td> -{!! $tax=(($value->fareAmount)*(($value->commissionRate)/100))*(($value->taxOnCommission)/100) !!} </td>
        <td> {!! ($balance-$amt)+$tax !!} </td>
    </tr>

            <?php $b=0; ?>

    @endforeach



    {{--@endfor--}}
</table>

@if(count($order)==0)
    <div style="padding-top: 50px; ">

        <p style="text-align: center;color: red;">There is no Billing Found</p>
    </div>

@endif

</body>

</html>