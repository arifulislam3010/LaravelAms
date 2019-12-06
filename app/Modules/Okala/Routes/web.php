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


Route::group(['prefix' => 'okala', 'middleware' => 'auth'], function () {

    Route::get('/', 'OkalaController@index')->name('okala_index');
    Route::get('/create', 'OkalaController@create')->name('okala_create');
    Route::post('/store', 'OkalaController@store')->name('okala_store');
    Route::get('/edit/{id}', 'OkalaController@edit')->name('okala_edit');
    Route::post('/update/{id}', 'OkalaController@update')->name('okala_update');
    Route::get('/delete/{id}', 'OkalaController@delete')->name('okala_delete');


});





