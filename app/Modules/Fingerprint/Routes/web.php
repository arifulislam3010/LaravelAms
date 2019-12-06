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

Route::group(['prefix' => 'fingerprint', 'middleware' => 'auth'], function () {

    Route::get('/', 'FingerprintController@index')->name('fingerprint_index');
    Route::get('/create', 'FingerprintController@create')->name('fingerprint_create');
    Route::post('/store', 'FingerprintController@store')->name('fingerprint_store');
    Route::get('/edit/{id}', 'FingerprintController@edit')->name('fingerprint_edit');
    Route::post('/update/{id}', 'FingerprintController@update')->name('fingerprint_update');
    Route::get('/delete/{id}', 'FingerprintController@delete')->name('fingerprint_delete');


});