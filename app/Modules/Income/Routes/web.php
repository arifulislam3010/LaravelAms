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

Route::group(['prefix' => 'income'], function () {
    Route::get('/', 'IncomeWebController@index')->name('income');
    Route::get('create', 'IncomeWebController@create')->name('income_create');
    Route::post('store', 'IncomeWebController@store')->name('income_store');
    Route::get('show/{id}', 'IncomeWebController@show')->name('income_show');
    Route::get('edit/{id}', 'IncomeWebController@edit')->name('income_edit');
    Route::post('update/{id}', 'IncomeWebController@update')->name('income_update');
    Route::get('delete/{id}', 'IncomeWebController@destroy')->name('income_delete');
});

Route::group(['prefix' => 'api/income'], function () {
    Route::get('/get-income-contact-account-tax-name/{id}', 'IncomeApiController@getIncomeContactAccountTaxName')->middleware('auth');
});
