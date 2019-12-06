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

Route::group(['prefix' => 'customer','middleware' => 'auth'], function () {

    Route::get('/', 'WebController@index')->name('customer');
    Route::get('/update/{id}', 'WebController@update')->name('customer_update');
    Route::get('/document/{id}', 'WebController@document')->name('customer_document');
    Route::get('/flight/{id}', 'WebController@flight')->name('customer_flight');
    Route::get('/manpower/{id}', 'WebController@manpower')->name('customer_manpower');
    Route::get('/ft/{id}', 'WebController@ft')->name('customer_ft');
    Route::get('/stamping/{id}', 'WebController@stamping')->name('customer_stamping');
    /*Route::get('/dedit/{id}', 'WebController@dedit')->name('customer_dedit');
    Route::post('/dupdate/{id}', 'WebController@dupdate')->name('customer_dupdate');
    Route::get('/ddelete/{id}', 'WebController@ddelete')->name('customer_ddelete');*/
    Route::get('/order/{id}', 'WebController@order')->name('customer_order');
    Route::get('/okala/{id}', 'WebController@okala')->name('customer_okala');
    Route::get('/medicalSlip/{id}', 'WebController@medicalSlip')->name('customer_medicalSlip');
    Route::get('/mofa/{id}', 'WebController@mofa')->name('customer_mofa');
    Route::get('/musaned/{id}', 'WebController@musaned')->name('customer_musaned');


    /*Route::get('/', function () {
        dd('This is the Customer module index page. Build something great!');
    });*/
});


Route::group(['prefix' => 'customer/information','middleware' => 'auth'], function () {

    Route::get('/', 'information\WebController@index')->name('customer_information');
    Route::get('/edit/{id}', 'information\WebController@edit')->name('customer_information_edit');
    Route::post('/update/{id}', 'information\WebController@update')->name('customer_information_update');


});

Route::group(['prefix' => 'customer/account','middleware' => 'auth'], function () {

    Route::get('/{id}', 'account\WebController@index')->name('customer_account');
    Route::get('/edit/{id}', 'account\WebController@edit')->name('customer_account_edit');
    Route::post('/update/{id}', 'account\WebController@update')->name('customer_account_update');


});
