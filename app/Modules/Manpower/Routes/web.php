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

Route::group(['prefix' => 'manpower', 'middleware' => 'auth'], function () {

    Route::get('/', 'ManpowerController@index')->name('manpower_index');
    Route::get('/create', 'ManpowerController@create')->name('manpower_create');
    Route::post('/store', 'ManpowerController@store')->name('manpower_store');
    Route::get('/edit/{id}', 'ManpowerController@edit')->name('manpower_edit');
    Route::post('/update/{id}', 'ManpowerController@update')->name('manpower_update');
    Route::get('/delete/{id}', 'ManpowerController@delete')->name('manpower_delete');


});

