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



<div role="main">

    <div class="app">
        <p style="font-weight: 400;font-size: 20px">তারিখঃ
            <?php
            $currentDate =  $basis[0]->dateOfApplication;
            $engDATE = array(1,2,3,4,5,6,7,8,9,0,January,February,March,April,May,June,July,August,September,October,November,December,Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday);
            $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
বুধবার','বৃহস্পতিবার','শুক্রবার'
            );
            $convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);
            echo "$convertedDATE";
            ?>

        </p>
        <p style="font-weight: 400;font-size: 20px">বরাবর</p>
        <p style="font-weight: 400;font-size: 20px">প্রেসিডেন্ট</p>
        <p style="font-weight: 400;font-size: 20px">গামকা-ঢাকা</p>
        <p style="font-weight: 400;font-size: 20px">বিষয়ঃ মেডিকেল স্লিপের জন্য আবেদন </p>
        <p style="font-weight: 400;font-size: 20px">জনাব,</p>
        <div class="content">
            <p>মসজিদুল আকসা", {!! $basis[0]->country_name !!} মুসলমানদের প্রথম কিবলা যা ধ্বংস করার ঘৃন্য পরিকল্পনা করা হয়েছে! একজন মুসলিম হিসেবে এটা নিজে জানা এবং অন্যকে
                জানানো আপনার জন্য জরুরী।** মসজিদুল আকসা, মুসলমানদের প্রথম কিবলা। এটি জেরুজালেমে অবস্থিত। এই মসজিদটি মুসলমানদের অনেক আবেগের একটি বিষয়।
                কিন্তু এটাকে ধ্বংস করার পরিকল্পনা চলছে!!! উপরের ছবিতে লক্ষ্য করুন, বাম পাশের ছবিতে দেখা যাচ্ছে "আল আকসা" মসজিদ। নিচের ছবিতে দেখুন এর
                কাছেই আরেকটা মসজিদ তৈরি করা হয়েছে, "আল শাখরা মসজিদ" যেটা ডান পাশের ছবিতে দেখানো হয়েছে। কিন্তু এই শাখরা
            </p>
        </div>

        <br>
        <br>

        <table class="table table-bordered">
            <thead>
            <tr style="text-align: center">
                <td style="height: 40px;text-align: center">ক্রমিক নং </td>
                <td style="height: 40px;text-align: center">যাত্রীর নাম</td>
                <td style="height: 40px;text-align: center">পাসপোর্ট নাম্বার</td>

            </tr>
            </thead>
            <?php
            $i=1;
            ?>
            <tbody>
            @foreach($basis as $value)
            <tr>
                <td style="height: 40px">{!! $i++ !!}</td>
                <td>{!! $value->display_name !!}</td>
                <td>{!! $value->passportNumber !!}</td>

            </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <br>

        <div class="content">
            <p>মসজিদুল আকসা", মুসলমানদের প্রথম কিবলা যা ধ্বংস করার ঘৃন্য পরিকল্পনা করা হয়েছে! একজন মুসলিম হিসেবে এটা নিজে জানা এবং অন্যকে
                জানানো আপনার জন্য জরুরী।** মসজিদুল আকসা, মুসলমানদের প্রথম কিবলা। এটি জেরুজালেমে অবস্থিত। এই মসজিদটি মুসলমানদের অনেক আবেগের একটি বিষয়।
                কিন্তু এটাকে ধ্বংস করার পরিকল্পনা চলছে!!! উপরের ছবিতে লক্ষ্য করুন, বাম পাশের ছবিতে দেখা যাচ্ছে "আল আকসা" মসজিদ। নিচের ছবিতে দেখুন এর
                কাছেই আরেকটা মসজিদ তৈরি করা হয়েছে, "আল শাখরা মসজিদ" যেটা ডান পাশের ছবিতে দেখানো হয়েছে। কিন্তু এই শাখরা
            </p>
        </div>

        <br>

        <h4>ধন্যবাদান্তে</h4>


        <h4> <h4>{!! $formbasis->ownerNameBN !!}</h4></h4>
        <h4> <h4>{!! $formbasis->ownerDesignationBN !!}</h4></h4>
        <h4> <h4>{!! $formbasis->companyNameBN !!}</h4></h4>



    </div>






</div> <!-- /container -->

</body>
</html>