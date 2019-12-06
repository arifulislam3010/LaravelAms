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

Route::group(['prefix' => 'visa'], function () {

    Route::get('/', 'WebController@index')->name('visa')->middleware('auth');
    Route::get('/show/{id}', 'WebController@show')->name('visa_show')->middleware('auth');
    Route::get('/create', 'WebController@create')->name('visa_create')->middleware('auth');
    Route::post('/store', 'WebController@store')->name('visa_store')->middleware('auth');
    Route::get('/edit/{id}', 'WebController@edit')->name('visa_edit')->middleware('auth');
    Route::post('/update/{id}', 'WebController@update')->name('visa_update')->middleware('auth');
    Route::get('/delete/{id?}', 'WebController@delete')->name('visa_delete')->middleware('auth');
    Route::get('/contact', 'WebController@contact')->name('visa_contact')->middleware('auth');
    Route::get('/pdf/{id}', 'WebController@pdf')->name('visa_pdf')->middleware('auth');

});
Route::group(['prefix' => 'visa/bill'], function () {

    Route::get('/', 'BillWebController@index')->name('visa_bill')->middleware('auth');
    Route::get('/create/{visa?}', 'BillWebController@create')->name('visa_bill_create')->middleware('auth');
    Route::get('/show/{id}/{visa}', 'BillWebController@show')->name('visa_bill_show')->middleware('auth');
    Route::post('/store', 'BillWebController@store')->name('visa_bill_store')->middleware('auth');
    Route::get('/edit/{id}', 'BillWebController@edit')->name('visa_bill_edit')->middleware('auth');
});

Route::group(['prefix' => 'visa/visaacceptance'], function () {
    Route::get('/', 'visaacceptance\WebController@index')->name('visaacceptance')->middleware('auth');
    Route::get('/create', 'visaacceptance\WebController@create')->name('visaacceptance_create')->middleware('auth');
    Route::post('/store', 'visaacceptance\WebController@store')->name('visaacceptance_store')->middleware('auth');
    Route::get('/edit/{id}', 'visaacceptance\WebController@edit')->name('visaacceptance_edit')->middleware('auth');
    Route::post('/update/{id}', 'visaacceptance\WebController@update')->name('visaacceptance_update')->middleware('auth');
    Route::get('/delete/{id?}', 'visaacceptance\WebController@destroy')->name('visaacceptance_destroy')->middleware('auth');

    Route::get('/pdf/{id}', 'visaacceptance\WebController@pdf')->name('visaacceptance_pdf')->middleware('auth');
    Route::get('/print/{id}', 'visaacceptance\WebController@visaPrint')->name('visaacceptance_print')->middleware('auth');
});

Route::group(['prefix' => 'visa/visaform'], function () {
    Route::get('/', 'visaform\WebController@index')->name('visaform')->middleware('auth');
    Route::get('/create', 'visaform\WebController@create')->name('visaform_create')->middleware('auth');
    Route::post('/store', 'visaform\WebController@store')->name('visaform_store')->middleware('auth');
    Route::get('/edit/{id}', 'visaform\WebController@edit')->name('visaform_edit')->middleware('auth');
    Route::post('/update/{id}', 'visaform\WebController@update')->name('visaform_update')->middleware('auth');
    Route::get('/delete/{id?}', 'visaform\WebController@destroy')->name('visaform_destroy')->middleware('auth');

    Route::get('/pdf/{id}', 'visaform\WebController@pdf')->name('visaform_pdf')->middleware('auth');
    Route::get('/print/{id}', 'visaform\WebController@visaPrint')->name('visaform_print')->middleware('auth');
    Route::get('/statement/{id}', 'visaform\WebController@statement')->name('visaform_work_agreement')->middleware('auth');
    Route::get('/paper/{id}', 'visaform\WebController@AgreementPaper')->name('visaform_agreement_paper')->middleware('auth');
  });

