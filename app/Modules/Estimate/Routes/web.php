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

Route::group(['prefix' => 'estimate'], function () {
    Route::get('/', 'EstimateWebController@index')->name('estimate')->middleware('auth');
    Route::get('/create', 'EstimateWebController@create')->name('estimate_create')->middleware('auth');
    Route::post('/store', 'EstimateWebController@store')->name('estimate_store')->middleware('auth');
    Route::get('/show/{id}', 'EstimateWebController@show')->name('estimate_show')->middleware('auth');
    Route::get('/edit/{id}', 'EstimateWebController@edit')->name('estimate_edit')->middleware('auth');
    Route::post('/update/{id}', 'EstimateWebController@update')->name('estimate_update')->middleware('auth');
    Route::get('/delete/{id}', 'EstimateWebController@destroy')->name('estimate_destroy')->middleware('auth');
    Route::get('/pdf/{id}', 'EstimateWebController@pdf')->name('estimate_pdf')->middleware('auth');
    Route::get('/print/{id}', 'EstimateWebController@Toprint')->name('estimate_print')->middleware('auth');
    Route::get('/entry/terms', 'EstimateEntryWebController@terms')->name('estimateentry_pdf')->middleware('auth');
    Route::get('/convert/to/invoice/{id}', 'EstimateWebController@invoice')->name('estimateentry_invoice')->middleware('auth');
    Route::post('/convert/to/invoice/{id}', 'EstimateWebController@invoice_store')->name('estimateentry_invoice_store')->middleware('auth');
});

Route::group(['prefix' => 'api/estimate', 'middleware' => 'auth'], function () {

    Route::get('/get-item-rate/{id}', 'EstimateApiController@getItemRate')->middleware('auth');
    Route::get('/get-invoice-entry/{id}', 'EstimateApiController@getInvoiceEntry')->middleware('auth');
    Route::get('/get-due-balance/{id}', 'EstimateApiController@getDueBalance')->middleware('auth');
    Route::get('/get-credit-available/{invoice_id}/{credit_note_id}', 'EstimateApiController@creditAvailable')->middleware('auth');

});
