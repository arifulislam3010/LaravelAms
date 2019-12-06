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

Route::group(['prefix' => 'visastamp'], function () {

    Route::get('/', 'VisaStampingController@index')->name('visastamp');
    Route::get('/create', 'VisaStampingController@create')->name('visastamp_create');
    Route::post('/store', 'VisaStampingController@store')->name('visastamp_store');
    Route::get('/edit/{id}', 'VisaStampingController@edit')->name('visastamp_edit');
    Route::get('/show/{id}', 'VisaStampingController@show')->name('visastamp_show');
    Route::post('/update/{id}', 'VisaStampingController@update')->name('visastamp_update');
    Route::get('/delete/{id}', 'VisaStampingController@delete')->name('visastamp_delete');

    /*Route::get('/', function () {
        dd('This is the Visastamp module index page. Build something great!');
    });*/
});
