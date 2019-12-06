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

Route::group(['prefix' => 'document'], function () {
    //
    Route::get('/', 'document\WebController@index')->name('document');
    Route::get('/create', 'document\WebController@create')->name('document_create');
    Route::get('/download', 'document\WebController@download')->name('document_download');
    Route::post('/store', 'document\WebController@store')->name('document_store');
    Route::get('/edit/{id}', 'document\WebController@edit')->name('document_edit');
    Route::post('/update/{id}', 'document\WebController@update')->name('document_update');
    Route::get('/delete/{id?}', 'document\WebController@destroy')->name('document_delete');
});

Route::group(['prefix' => 'document/category', 'middleware' => 'auth'], function () {

    //Category Routes
    Route::get('/', 'category\WebController@index')->name('document_category');
    Route::get('/search/{id}', 'category\WebController@search')->name('document_category_search');

    Route::get('/create', 'category\WebController@create')->name('document_category_create');
    Route::post('/store', 'category\WebController@store')->name('document_cateregory_store');
    Route::get('/edit/{id}', 'category\WebController@edit')->name('document_category_edit');
    Route::post('/update/{id}', 'category\WebController@update')->name('document_cateregory_update');
    Route::get('/delete/{id?}', 'category\WebController@destroy')->name('document_cateregory_delete');

});
