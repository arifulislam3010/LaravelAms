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

Route::group(['prefix' => 'bank'], function () {
    Route::get('/', 'HomeController@index')->name('bank');
    Route::get('create', 'HomeController@create')->name('bank_create');
    Route::post('store', 'HomeController@store')->name('bank_store');
    Route::get('show/{id}', 'HomeController@show')->name('bank_show');
    Route::get('edit/{id}', 'HomeController@edit')->name('bank_edit');
    Route::post('update/{id}', 'HomeController@update')->name('bank_update');
    Route::get('delete/{id}', 'HomeController@destroy')->name('bank_delete');

    // report
    Route::get('/report', 'HomeController@report')->name('bank_report');
    Route::post('/report', 'HomeController@bankreportfilter')->name('bank_report_filter');
    Route::get('/report/{id}/{start}/{end}', 'HomeController@reportDetails')->name('bank_report_details');
    Route::post('/report/{id}', 'HomeController@processfilterForm')->name('bank_report_form');


});


