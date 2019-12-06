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


        tr,th{

            border: 1px solid;

        }
        tr,td{
            border: 1px solid;
            text-align: center;
        }



    </style>

</head>
<body style="font-family: freeserif; font-size: 10pt;">

<?php $t=new \App\Lib\Helpers() ?>

<div role="main" style="padding-top: 30px">

    <div id="testdiv">
        <h3  style="text-decoration: underline;">একক বহির্গমন চারপত্রের আবেদন ফরম :  </h3>
        <h4>নিয়োগকারী দেশ এর নাম  :({!! $note2->countryGender !!}) </h4>
        <h4>নিয়োগকারী দেশ এর নাম নিয়োগকারী {!! $formbasis->companyNameBN !!} দেশ এর নাম নিয়োগকারী দেশ({!! $formbasis->licenceBN !!}) এর নাম </h4>
        <br>

        <h4 style="text-align: center">জমার তারিখঃ {!! $t->englishtobangla($note2->applicationDate) !!}</h4>

        <table>

            <tr>
                <td style="height: 40px;width: 20px">নং</td>
                <td style="height: 30px">বিদেশগামী কর্মীর নাম</td>
                <td style="height: 30px">পাসপোর্ট নাম্বার</td>
                <td style="height: 30px">ভিসা/এন ও সি নম্বর ও তারিখ</td>
                <td style="height: 30px">ভিসা এডভাইস নম্বর ও তারিখ</td>
                <td style="height: 30px">নিয়োগকারীর নাম</td>
                <td style="height: 30px">ভিসার সংখ্যা</td>
                <td style="height: 30px">পদের নাম</td>
                <td colspan="3">বেতন ও আনুশাঙ্গিক সুবিধাদি</td>
                <td style="height: 30px">উৎস আইকর এর পরিমাণ</td>
                <td style="height: 30px">কল্যাণ ফী এর পরিমাণ</td>
                <td style="height: 30px">ব্রিফিং প্রদান করা হইয়েছে কিনা/হ্যাঁ</td>
                <td style="height: 30px">মন্তব্য</td>

            </tr>


            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td colspan="1">বেতন</td>
                <td colspan="1">আহার</td>
                <td colspan="1">বি/ভারা</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td >01</td>
                <td>02</td>
                <td>03</td>
                <td>04</td>
                <td>05</td>
                <td>06</td>
                <td>07</td>
                <td>08</td>

                <td colspan="1">09</td>
                <td colspan="1">10</td>
                <td colspan="1">11</td>
                <td>12</td>
                <td>13</td>
                <td>15</td>
                <td>16</td>
            </tr>

            @foreach($note as $value)

            <tr>
                <td style="height: 30px">01</td>
                <td style="height: 30px">{!! $value->display_name !!}</td>
                <td style="height: 30px">{!! $value->passportNumber !!}</td>
                <td style="height: 30px">{!! $value->visaNumber !!}</td>
                <td style="height: 30px">{!! $value->visaAdvice !!}</td>
                <td style="height: 30px">{!! $value->name !!}</td>
                <td style="height: 30px">01</td>
                <td style="height: 30px">{!! $value->professionEn !!}</td>

                <td colspan="1">{!! $value->salary !!}/</td>
                <td colspan="1">{!! $value->mealallowance !!}/</td>
                <td colspan="1">{!! $value->airtransport !!}/</td>

                <td style="height: 30px">{!! $value->sourceIncomeTax !!}</td>
                <td style="height: 30px">{!! $value->welfareFee !!}</td>
                <td style="height: 30px">{!! $value->brifing !!}</td>
                <td style="height: 30px">{!! $value->comment !!}</td>
            </tr>

                @endforeach
        </table>
        <br>

        <div class="content">
            <p style="line-height: 30px;font-size: 15px;">
                মসজিদুল আকসা", মুসলমানদের প্রথম কিবলা যা ধ্বংস করার ঘৃন্য পরিকল্পনা করা হয়েছে! একজন মুসলিম হিসেবে {!! $formbasis->companyNameBN !!}({!! $formbasis->licenceBN !!}) এটা নিজে জানা এবং অন্যকে
                জানানো আপনার জন্য জরুরী।** মসজিদুল আকসা, মুসলমানদের প্রথম কিবলা। এটি জেরুজালেমে অবস্থিত। এই মসজিদটি মুসলমানদের অনেক আবেগের একটি বিষয়।
            </p>
        </div>

        <div class="row" style="position: relative;left: 100px">
            <div class="col-md-2" style="width: 16%;float: left">
                <h5>পরিক্ষিত হইয়েছে কাগজপত্র </h5>
                <h5>সঠিক আছে /নাই<br>{!! $value->infoAttestation !!}</h5>
            </div>


            <div class="col-md-3" style="width: 16%;float: left">
                <h5>পে-অর্ডার নং={!! $value->payOrderNumber !!}</h5>
                <h5>চালান নং={!! $value->chalanNumber!!}</h5>
                <h5>বর্ণিত তথ্যাদি যথাযথ আছে /নাই <br>{!! $value->infoAttestation !!}</h5>
            </div>


            <div class="col-md-3" style="width: 16%;float: left">
                <h5>তাং={!! $t->englishtobangla($value->payOrderDate)!!}</h5>
                <h5>তাং={!! $t->englishtobangla($value->chalanDate) !!}</h5>
                <h5>বহিরগমনে ছাড়পত্র দেওয়া/যাই না<br>{!! $value->certificateAttestation !!}</h5>
            </div>


            <div class="col-md-2" style="width: 20%;float: left">
                <h5>টাকা={!! $value->payOrderAmount !!}</h5>
                <h5>টাকা={!! $value->chalanAmount !!}</h5>
                <h5>বহিরগমনে ছাড়পত্র দেওয়া/যাই না<br>{!! $value->certificateAttestation !!}</h5>
            </div>

            <div class="col-md-2" style="margin-top: 40px;width: 16%;">
                <h5></h5>
                <h5 style="margin-bottom: 10px">এজিঞ্চি মালিক এর সাক্ষর</h5>
            </div>

        </div>

        <br>
        <br>

        <div class="row">

            <div class="col-md-2" style="width: 200px;float: left">
                <h5>সহকারির সাক্ষর</h5>
            </div>
            <div class="col-md-3" style="width: 200px;float: left">
                <h5>সহকারী পরিচালকের সাক্ষর</h5>
            </div>
            <div class="col-md-3" style="width: 150px;float: left">
                <h5>উপ-পরিচালকের</h5>

            </div>
            <div class="col-md-2" style="width: 150px;float: right;">
                <h5>পরিচালকের সাক্ষর</h5>
            </div>
            <div class="col-md-2" style="width: 180px;float: right">
                <h5>প্রস্তাব মত</h5>
            </div>

        </div>
    </div>

</div> <!-- /container -->

</body>
</html>