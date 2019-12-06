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

Route::group(['prefix' => 'order'], function () {

    Route::get('/', 'Order\WebController@index')->name('order')->middleware('auth');
    Route::get('/create', 'Order\WebController@create')->name('order_create')->middleware('auth');
    Route::post('/store', 'Order\WebController@store')->name('order_store')->middleware('auth');
    Route::get('/edit/{id}', 'Order\WebController@edit')->name('order_edit')->middleware('auth');
    Route::post('/update/{id}', 'Order\WebController@update')->name('order_update')->middleware('auth');
    Route::get('/delete/{id?}', 'Order\WebController@delete')->name('order_delete')->middleware('auth');
	Route::get('/pdf', 'Order\WebController@pdf')->name('order_pdf')->middleware('auth');

});

Route::group(['prefix' => 'order/invoice'], function () {

    Route::get('/', 'invoice\InvoiceWebController@index')->name('order_invoice')->middleware('auth');
    Route::get('create/{order?}', 'invoice\InvoiceWebController@create')->name('order_invoice_create')->middleware('auth');
    Route::post('store', 'invoice\InvoiceWebController@store')->name('order_invoice_store')->middleware('auth');
    Route::get('show/{id}/{order}', 'invoice\InvoiceWebController@show')->name('order_invoice_show')->middleware('auth');
    Route::get('edit/{id}', 'InvoiceWebController@edit')->name('order_invoice_edit')->middleware('auth');
    Route::post('update/{id}', 'InvoiceWebController@update')->name('invoice_update')->middleware('auth');
    Route::get('delete/{id}', 'InvoiceWebController@destroy')->name('invoice_delete')->middleware('auth');


});

Route::group(['prefix' => 'order/accounts'], function () {

    Route::get('/', 'accounts\WebController@index')->name('order_accounts')->middleware('auth');
    Route::get('/create', 'accounts\WebController@create')->name('order_accounts_create')->middleware('auth');
    Route::post('/store', 'accounts\WebController@store')->name('order_accounts_store')->middleware('auth');
    Route::get('/edit/{id}', 'accounts\WebController@edit')->name('order_accounts_edit')->middleware('auth');
    Route::post('/update/{id}', 'accounts\WebController@update')->name('order_accounts_update')->middleware('auth');
    Route::get('/delete/{id?}', 'accounts\WebController@destroy')->name('order_accounts_delete')->middleware('auth');


});

Route::group(['prefix' => 'order/recruit/expense'], function () {

    Route::get('/', 'expense\WebController@index')->name('order_expense_accounts')->middleware('auth');
    Route::get('/create', 'expense\WebController@create')->name('order_expense_accounts_create')->middleware('auth');
    Route::post('/store', 'expense\WebController@store')->name('order_expense_accounts_store')->middleware('auth');
    Route::post('/store/expense/{id}', 'expense\WebController@storeExpense')->name('order_expense_accounts_storeExpense')->middleware('auth');
    Route::get('/edit/{id}', 'expense\WebController@edit')->name('order_expense_accounts_edit')->middleware('auth');
    Route::post('/update/{id}', 'expense\WebController@update')->name('order_expense_accounts_update')->middleware('auth');
    Route::get('/delete/{id?}/{ex?}', 'expense\WebController@destroy')->name('order_expenses_delete')->middleware('auth');
    Route::get('/expense/{id}/{ex?}', 'expense\WebController@expense')->name('order_from_expense')->middleware('auth');


});

Route::group(['prefix' => 'order/expense/sector'], function () {

    Route::get('/', 'expensesector\WebController@index')->name('order_expense_sector')->middleware('auth');
    Route::get('/create', 'expensesector\WebController@create')->name('order_expense_sector_create')->middleware('auth');
    Route::post('/store', 'expensesector\WebController@store')->name('order_expense_sector_store')->middleware('auth');
    Route::get('/edit/{id}', 'expensesector\WebController@edit')->name('order_expense_sector_edit')->middleware('auth');
    Route::post('/update/{id}', 'expensesector\WebController@update')->name('order_expense_sector_update')->middleware('auth');
    Route::get('/delete/{id?}', 'expensesector\WebController@destroy')->name('order_expense_sector_delete')->middleware('auth');
    Route::get('/search/{id?}', 'expensesector\WebController@search')->name('order_expense_sector_search')->middleware('auth');


});