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

Route::group(['prefix' => 'company', 'middleware' => 'auth'], function () {

    Route::get('/', 'CompanyController@index')->name('company_index');
    Route::get('/create', 'CompanyController@create')->name('company_create');
    Route::post('/store', 'CompanyController@store')->name('company_store');
    Route::get('/edit/{id}', 'CompanyController@edit')->name('company_edit');
    Route::post('/update/{id}', 'CompanyController@update')->name('company_update');
    Route::get('/delete/{id}', 'CompanyController@delete')->name('company_delete');


});


