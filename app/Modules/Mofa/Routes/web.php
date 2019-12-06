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

Route::group(['prefix' => 'mofa'], function () {
    Route::get('/', 'mofa\WebController@index')->name('mofa')->middleware('auth');
    Route::get('/create', 'mofa\WebController@create')->name('mofa_create')->middleware('auth');
    Route::post('/store', 'mofa\WebController@store')->name('mofa_store')->middleware('auth');
    Route::get('/edit/{id}', 'mofa\WebController@edit')->name('mofa_edit')->middleware('auth');
    Route::post('/update/{id}', 'mofa\WebController@update')->name('mofa_update')->middleware('auth');
    Route::get('/delete/{id?}', 'mofa\WebController@delete')->name('mofa_delete')->middleware('auth');
});
