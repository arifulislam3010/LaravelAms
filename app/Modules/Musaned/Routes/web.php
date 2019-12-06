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

Route::group(['prefix' => 'musaned'], function () {

    Route::get('/', 'MusanedController@index')->name('musaned');
    Route::get('/create', 'MusanedController@create')->name('musaned_create');
    Route::post('/store', 'MusanedController@store')->name('musaned_store');
    Route::get('/edit/{id}', 'MusanedController@edit')->name('musaned_edit');
    Route::get('/show/{id}', 'MusanedController@show')->name('musaned_show');
    Route::post('/update/{id}', 'MusanedController@update')->name('musaned_update');
    Route::get('/delete/{id}', 'MusanedController@delete')->name('musaned_delete');

    /*Route::get('/', function () {
        dd('This is the Musaned module index page. Build something great!');
    });*/
});
