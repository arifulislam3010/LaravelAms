<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'recrutereport'], function () {

    Route::get('/', 'RreportController@index')->name('recrutereport')->middleware('auth');
    Route::get('/vendor', 'RreportController@vendor')->name('recrutereport_vendor')->middleware('auth');
    Route::get('/vendorList/{id}', 'RreportController@vendorList')->name('recrutereport_vendorList')->middleware('auth');
    Route::post('/vendor', 'RreportController@vendorSearch')->name('recrutereport_vendorSearch')->middleware('auth');
    Route::get('/ven', 'RreportController@ticketvendorSearch')->name('recrutereport_ticket_vendorSearch')->middleware('auth');
    Route::get('/company', 'RreportController@company')->name('recrutereport_company')->middleware('auth');
    Route::get('/companyList', 'RreportController@companyList')->name('recrutereport_companyList')->middleware('auth');
    Route::get('/visa', 'RreportController@visa')->name('recrutereport_visa')->middleware('auth');
    Route::get('/visalist', 'RreportController@visalist')->name('recrutereport_visa')->middleware('auth');

    /*Route::get('/', function () {
        dd('This is the Recrutereport module index page. Build something great!');
    });*/
});
