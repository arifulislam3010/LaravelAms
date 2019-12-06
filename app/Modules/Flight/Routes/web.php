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
Route::group(['prefix' => 'flight', 'middleware' => 'auth'], function () {

    Route::get('/', 'FlightController@index')->name('flight_index');
    Route::get('/create', 'FlightController@create')->name('flight_create');
    Route::post('/store', 'FlightController@store')->name('flight_store');
    Route::get('/edit/{id}', 'FlightController@edit')->name('flight_edit');
    Route::post('/update/{id}', 'FlightController@update')->name('flight_update');
    Route::get('/delete/{id}', 'FlightController@delete')->name('flight_delete');


});
