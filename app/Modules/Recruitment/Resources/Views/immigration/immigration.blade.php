<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">


</head>
<body style="font-family: freeserif; font-size: 10pt;">

<?php $convert=new \App\Lib\Helpers() ?>

<div class="theme-showcase" role="main">

    <div class="app">
        <h4 class="pull-right" style="padding-right: 50px;text-align: right;">তারিখঃ{!! $convert->englishtobangla($immigration->applicationDate) !!}</h4>
        <h4>বরাবর</h4>
        <h4>মহাপরিচালক</h4>
        <h4>জনশক্তি,কর্মসংস্থান ও প্রসিক্ষনবুরু</h4>
        <h4>৭১-৭২,পুরাতন-এলিফেন্ত রোড,</h4>
        <h4>নিউ ইস্কাতন রোড,ঢাকা-১০০০ ।</h4>
        <br>
        <br>
        <h4>দৃষ্টি আকরসনঃ পরিচালক (বহির্গমন) ।</h4>
        <br>

        <h4>বিষয়ঃ {!! $immigration->country_name !!} আরবগামি {!! $convert->bn2enNumber($immigration->total_person) !!}({!! $convert->number($immigration->total_person) !!})জন অসত্তাইত পুরুষ ({!! $convert->number($immigration->gender) !!})কর্মীর বহির্গমন ছাড়পত্রের জন্য আবেদন ।</h4>
        <br>
        <br>
        <h4>জনাব,</h4>
        <div class="content">
            <p>
                {!! $immigration->country_name !!} আকসা", মুসলমানদের প্রথম {!! $convert->bn2enNumber($immigration->total_person) !!}({!! $convert->number($immigration->total_person) !!}) যা ধ্বংস করার ঘৃন্য ({!! $convert->number($immigration->gender) !!}) করা হয়েছে! একজন মুসলিম হিসেবে এটা নিজে জানা এবং অন্যকে
                জানানো আপনার জন্য জরুরী।** মসজিদুল আকসা, মুসলমানদের প্রথম কিবলা। এটি জেরুজালেমে অবস্থিত। এই মসজিদটি মুসলমানদের অনেক আবেগের একটি বিষয়।
                কিন্তু এটাকে ধ্বংস করার পরিকল্পনা চলছে!!! উপরের ছবিতে লক্ষ্য করুন, বাম পাশের ছবিতে দেখা যাচ্ছে "আল আকসা" মসজিদ। নিচের ছবিতে দেখুন এর
                কাছেই আরেকটা মসজিদ তৈরি করা হয়েছে, "আল শাখরা মসজিদ" যেটা ডান পাশের ছবিতে দেখানো হয়েছে। কিন্তু এই শাখরা
            </p>
            <br>
            <p>
                মসজিদুল আকসা", মুসলমানদের প্রথম কিবলা যা ধ্বংস করার ঘৃন্য পরিকল্পনা করা হয়েছে! একজন মুসলিম হিসেবে এটা নিজে জানা এবং অন্যকে
                জানানো আপনার জন্য জরুরী।** মসজিদুল আকসা, মুসলমানদের প্রথম কিবলা। এটি জেরুজালেমে অবস্থিত। এই মসজিদটি মুসলমানদের অনেক আবেগের একটি বিষয়।
            </p>
        </div>

        <br>
        <br>
        <h4>ধন্যবাদান্তে</h4>
        <br>
        <br>
        <br>

        <h4>{!! $formbasis->ownerNameBN !!}</h4>
        <h4>{!! $formbasis->ownerDesignationBN !!}</h4>

    </div>

<?php

        $immi=new \App\Lib\Helpers();

    ?>


    <div class="popup">
        <div class="content">
            <p style="line-height: 30px;font-size: 18px;">মসজিদুল আকসা",<span style="font-size: 18px">{!! $formbasis->companyNameBN !!}({!! $formbasis->licenceBN !!})</span>, মুসলমানদের প্রথম কিবলা যা ধ্বংস করার ঘৃন্য পরিকল্পনা{!! $immi->englishtobangla($immigration->applicationDate) !!} করা হয়েছে! একজন মুসলিম হিসেবে এটা নিজে জানা এবং অন্যকে
                জানানো আপনার জন্য জরুরী।** মসজিদুল আকসা, মুসলমানদের প্রথম কিবলা। এটি জেরুজালেমে অবস্থিত। এই মসজিদটি মুসলমানদের অনেক আবেগের একটি বিষয়।{!! $immigration->country_name !!}
                কিন্তু {!! $immi->bn2enNumber($immigration->total_person) !!}({!! $immi->number($immigration->total_person) !!}) এটাকে ধ্বংস করার পরিকল্পনা চলছে!!! উপরের ছবিতে লক্ষ্য করুন, বাম পাশের ছবিতে দেখা যাচ্ছে "আল আকসা" মসজিদ। নিচের ছবিতে দেখুন এর
                কাছেই আরেকটা মসজিদ তৈরি করা হয়েছে, "আল শাখরা মসজিদ" যেটা ডান পাশের ছবিতে দেখানো হয়েছে। কিন্তু এই শাখরা
            </p>
        </div>
        <br>
        <h4 style="text-decoration: underline;text-align: center;">জর্ডানগামী {!! $immi->bn2enNumber($immigration->total_person) !!}({!! $immi->number($immigration->total_person) !!}) জন মহিলা গ্রিহকরমির বিবরন</h4>
        <br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <td style="height: 40px;text-align: center">ক্রমি নং</td>
                <td style="height: 40px;text-align: center">কর্মীর নাম</td>
                <td style="height: 40px;text-align: center">পাসপোর্ট নং</td>
                <td style="height: 40px;text-align: center">জন্ম তারিখ</td>
                <td style="height: 40px;text-align: center">ভিসা এডভাইচ নম্বর</td>
                <td style="height: 40px;text-align: center">পেশা</td>

            </tr>
            </thead>
            <tbody>

            <?php
            $i=1;
            $contact= new \App\Lib\Immigration();

            ?>

            @foreach($immigrationpax as $value)
            <tr>
                <td style="height: 30px;text-align: center">{!! $i++ !!}</td>
                <td style="height: 30px;text-align: center">{!! $contact->contact($value->pax_id)->customer->display_name !!}</td>
                <td style="height: 30px;text-align: center">{!! $contact->contact($value->pax_id)->passportNumber !!}</td>
                <td style="height: 30px;text-align: center">{!! $contact->recruit_customer($value->pax_id)->dateOfBirthEN !!}</td>
                <td style="height: 30px;text-align: center">{!! $contact->recruit_customer($value->pax_id)->visaAdvice !!}</td>
                <td style="height: 30px;text-align: center">{!! $contact->recruit_customer($value->pax_id)->professionEn !!}</td>


            </tr>
                @endforeach

            </tbody>
        </table>

        <div class="content">
            <p style="line-height: 30px;font-size: 18px;">
                মসজিদুল আকসা", মুসলমানদের প্রথম কিবলা যা ধ্বংস করার ঘৃন্য পরিকল্পনা করা হয়েছে! একজন মুসলিম হিসেবে এটা নিজে জানা এবং অন্যকে
                জানানো আপনার জন্য জরুরী।** মসজিদুল আকসা, মুসলমানদের প্রথম কিবলা। এটি জেরুজালেমে অবস্থিত। এই মসজিদটি মুসলমানদের অনেক আবেগের একটি বিষয়।
                কিন্তু এটাকে ধ্বংস করার পরিকল্পনা চলছে!!! উপরের ছবিতে লক্ষ্য করুন, বাম পাশের ছবিতে দেখা যাচ্ছে "আল আকসা" মসজিদ। নিচের ছবিতে দেখুন এর
                কাছেই আরেকটা মসজিদ তৈরি করা হয়েছে, "আল শাখরা মসজিদ" যেটা ডান পাশের ছবিতে দেখানো হয়েছে। কিন্তু এই শাখরা
            </p>
        </div>
        <br>

        <h4 style="line-height: 30px;font-size: 18px; margin-left: 30px;">আল শাখরা মসজিদ" যেটা ডান(আল শাখরা মসজিদ" যেটা ডান)পৃষ্ঠা নং </h4>
    </div>


    <div class="popup_3">
        <div class="content">
            <p style="line-height: 30px;font-size: 18px;">
                / নতানুচ্চেদ ............... হতে ...............পর্যন্ত সদই দেখা যেতে পারে।সংশ্লিষ্ট রিক্রুটিং এজেঞ্চি কর্তৃক দাখিলকৃত ০২(দুই) জন সৌদি আরবগামি কর্মীর ভিসা সঠিক আছে এবং পেশা বিভিন্ন মর্মে বহির্গমন শাখাই কর্মরত অনুবাদক এর নিকট হতে মতামত পাওয়া গেচে।কর্মীর প্রশিক্ষন সনদ সঠিক আছে।
            </p>
            <p style="line-height: 30px;font-size: 18px;">মসজিদুল আকসা", মুসলমানদের প্রথম কিবলা যা ধ্বংস করার ঘৃন্য পরিকল্পনা করা হয়েছে! একজন মুসলিম হিসেবে এটা নিজে জানা এবং অন্যকে
                জানানো আপনার জন্য জরুরী।** মসজিদুল আকসা, মুসলমানদের প্রথম কিবলা। এটি জেরুজালেমে অবস্থিত। এই মসজিদটি মুসলমানদের অনেক আবেগের একটি বিষয়।
                কিন্তু এটাকে ধ্বংস করার পরিকল্পনা চলছে!!! উপরের ছবিতে লক্ষ্য করুন, বাম পাশের ছবিতে দেখা যাচ্ছে "আল আকসা" মসজিদ। নিচের ছবিতে দেখুন এর
                কাছেই আরেকটা মসজিদ তৈরি করা হয়েছে, "আল শাখরা মসজিদ" যেটা ডান পাশের ছবিতে দেখানো হয়েছে। কিন্তু এই শাখরা
            </p>
        </div>
        <br>
        <h4 style="text-decoration: underline;text-align: center;">জর্ডানগামী ০৩(তিন) জন মহিলা গ্রিহকরমির বিবরন</h4>
        <br>

        <table class="table table-bordered">
            <thead>
            <tr style="text-align: center">
                <td style="height: 40px;text-align: center;width: 10%">ফী সমুহ</td>
                <td style="height: 40px;text-align: center">জনপ্রতি হার</td>
                <td style="height: 40px;text-align: center;width: 10%">করমির সংখ্যা</td>
                <td style="height: 40px;text-align: center;width: 10%">মোট টাকা</td>
                <td style="height: 40px;text-align: center;width: 30%">পে অর্ডার নং তারিখ,ব্যাংক ও শাখার নাম</td>
                <td style="height: 40px;text-align: center;width: 20%">মন্তব্য</td>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="height: 30px;text-align: center">কল্যাণ ফী</td>
                <td style="height: 30px;text-align: center">{!! $immigration->unitWelfareFee !!}/</td>
                <td style="vertical-align:middle;text-align: center;" rowspan="3">{!! $immi->bn2enNumber($immigration->total_person) !!} জন </td>
                <td style="height: 30px;text-align: center">{!! ($immigration->unitWelfareFee)*($immigration->total_person) !!}/</td>
                <td style="vertical-align:middle;text-align: center;" rowspan="3">{!! $immi->englishtobangla($immigration->applicationDate) !!} {!! $immigration->payOrderDetails !!}</td>
                <td style="height: 30px;text-align: center">{!! $immigration->WelfareComment !!}</td>
            </tr>
            <tr style="height: 100px;text-align: center">
                <td style="vertical-align: middle;height: 60px;text-align: center">আইকর</td>
                <td style="height: 60px;text-align: center">
                    <h6>{!! $immigration->unitIncomeTaxNAFee !!}/</h6>
                    <p>(অসত্তাইত ভিসার ক্ষেত্রে)</p>
                    <h6>{!! $immigration->unitIncomeTaxSAFee !!}/</h6>
                    <p>(শুধু মাত্র সৌদি আরব ক্ষেত্রে)</p>
                </td>
                <td style="vertical-align: middle;height: 60px;text-align: center">
                    @if($immigration->incomeTaxType==0)
                        {!! ($immigration->unitIncomeTaxNAFee)*($immigration->total_person) !!}
                        @else
                        {!! ($immigration->unitIncomeTaxSAFee)*($immigration->total_person) !!}
                    @endif
                </td>
                <td style="vertical-align: middle;height: 60px;text-align: center">{!! $immigration->incomeTaxComment !!}</td>

            </tr>
            <tr>
                <td style="height: 30px;text-align: center">স্মার্ট কার্ড ফী</td>
                <td style="height: 30px;text-align: center">{!! $immigration->unitSmartCardFee !!}/</td>
                <td style="height: 30px;text-align: center">{!! ($immigration->unitSmartCardFee)*($immigration->total_person) !!}/</td>
                <td style="height: 30px;text-align: center">{!! $immigration->SmartCardComment !!}</td>

            </tr>
            </tbody>
        </table>

        <div class="content">
            <p style="line-height: 30px;font-size: 18px;">
               / এমতাবস্থাই সংশ্লিষ্ট রিক্রুটিং এজেঞ্চি কর্তৃক আবেদনক্রিত ০৭ (সাত) জন সৌদি আরবগামি পুরুষ কর্মীর একক বহির্গমন ছাড়পত্র অনুমুদন করা যেতে পারে।
            </p>
        </div>
    </div>

</div> <!-- /container -->

</body>
</html>