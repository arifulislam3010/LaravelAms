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

Route::group(['prefix' => 'medicalslip', 'middleware' => 'auth'], function () {

    Route::get('/', 'MedicalSlipController@index')->name('medicalslip');
    Route::get('/create', 'MedicalSlipController@create')->name('medicalslip_create');
    Route::post('/store', 'MedicalSlipController@store')->name('medicalslip_store');
    Route::get('/edit/{id}', 'MedicalSlipController@edit')->name('medicalslip_edit');
    Route::get('/show/{id}', 'MedicalSlipController@show')->name('medicalslip_show');
    Route::post('/update/{id}', 'MedicalSlipController@update')->name('medicalslip_update');
    Route::get('/delete/{id}', 'MedicalSlipController@delete')->name('medicalslip_delete');
   /* Route::get('/', function () {
        dd('This is the Medicalslip module index page. Build something great!');
    });*/
});
