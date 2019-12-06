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

Route::group(['prefix' => 'Commission/Sales'], function () {
    Route::get('/', 'Sales\PostController@index')->name('sales_commission')->middleware('auth');
    Route::get('/create/{id}', 'Sales\PostController@create')->name('sales_commission_create')->middleware('auth');
    Route::get('/show/{id}', 'Sales\PostController@show')->name('sales_commission_show')->middleware('auth');
    Route::get('/edit/{id}', 'Sales\PostController@edit')->name('sales_commission_edit')->middleware('auth');
    Route::post('/update/{id}', 'Sales\PostController@update')->name('sales_commission_update')->middleware('auth');
    Route::get('/delete/{id?}', 'Sales\PostController@destroy')->name('sales_commission_delete')->middleware('auth');
    Route::post('/store/{agents_id}', 'Sales\PostController@store')->name('sales_commission_store')->middleware('auth');
    Route::get('/select/agent', 'Sales\PostController@agent')->name('sales_commission_agent')->middleware('auth');
});


