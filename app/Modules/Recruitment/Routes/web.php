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

Route::group(['prefix' => 'form_basis', 'middleware' => 'auth'], function () {

    Route::get('/edit', 'BasisController@edit')->name('form_basis_edit');
    Route::post('/update/{id}', 'BasisController@update')->name('form_basis_update');

});




Route::group(['prefix' => 'medical_slip_form', 'middleware' => 'auth'], function () {

    Route::get('/', 'MedicalslipController@index')->name('medical_slip_form_index');
    Route::get('/create', 'MedicalslipController@create')->name('medical_slip_form_create');
    Route::post('/store', 'MedicalslipController@store')->name('medical_slip_form_store');
    Route::get('/edit/{id}', 'MedicalslipController@edit')->name('medical_slip_form_edit');
    Route::post('/update/{id}', 'MedicalslipController@update')->name('medical_slip_form_update');
    Route::get('/delete/{id?}', 'MedicalslipController@delete')->name('medical_slip_form_delete');
    Route::get('/download/{id}', 'MedicalslipController@download')->name('medical_slip_form_download');

});


Route::group(['prefix' => 'agreement', 'middleware' => 'auth'], function () {

    Route::get('/', 'AgreementController@index')->name('agreement_index');
    Route::get('/create', 'AgreementController@create')->name('agreement_create');
    Route::post('/store', 'AgreementController@store')->name('agreement_store');
    Route::get('/edit/{id}', 'AgreementController@edit')->name('agreement_edit');
    Route::post('/update/{id}', 'AgreementController@update')->name('agreement_update');
    Route::get('/delete/{id?}', 'AgreementController@delete')->name('agreement_delete');
    Route::get('/download/{id}', 'AgreementController@download')->name('agreement_download');


});

Route::group(['prefix' => 'noobjection', 'middleware' => 'auth'], function () {

    Route::get('/', 'NoObjectionController@index')->name('objection_index');
    Route::post('/match', 'NoObjectionController@match')->name('objection_match');


});


Route::group(['prefix' => 'visaprocess', 'middleware' => 'auth'], function () {

    Route::get('/', 'VisaProcessController@index')->name('visa_process_index');
    Route::get('/create', 'VisaProcessController@create')->name('visa_process_create');
    Route::post('/store', 'VisaProcessController@store')->name('visa_process_store');
    Route::get('/edit/{id}', 'VisaProcessController@edit')->name('visa_process_edit');
    Route::post('/update/{id}', 'VisaProcessController@update')->name('visa_process_update');
    Route::get('/delete/{id?}', 'VisaProcessController@delete')->name('visa_process_delete');
    Route::get('/download/{id}', 'VisaProcessController@download')->name('visa_process_download');


});


Route::group(['prefix' => 'gamca', 'middleware' => 'auth'], function () {

    Route::get('/', 'GamcaController@index')->name('gamca_index');
    Route::get('/create', 'GamcaController@create')->name('gamca_create');
    Route::post('/store', 'GamcaController@store')->name('gamca_store');
    Route::get('/edit/{id}', 'GamcaController@edit')->name('gamca_edit');
    Route::post('/update/{id}', 'GamcaController@update')->name('gamca_update');
    Route::get('/delete/{id?}', 'GamcaController@delete')->name('gamca_delete');

    Route::get('/download/{id}', 'GamcaController@download')->name('gamca_download');


});

//Immigrattion  Route


Route::group(['prefix' => 'immigration', 'middleware' => 'auth'], function () {

    Route::get('/', 'ImmigrationController@index')->name('immigration_index');
    Route::get('/create', 'ImmigrationController@create')->name('immigration_create');
    Route::post('/store', 'ImmigrationController@store')->name('immigration_store');
    Route::get('/edit/{id}', 'ImmigrationController@edit')->name('immigration_edit');
    Route::post('/update/{id}', 'ImmigrationController@update')->name('immigration_update');
    Route::get('/delete/{id?}', 'ImmigrationController@delete')->name('immigration_delete');

    Route::get('/download/{id}', 'ImmigrationController@download')->name('immigration_download');

});



//Note Sheet Route

Route::group(['prefix' => 'note_sheet', 'middleware' => 'auth'], function () {

    Route::get('/', 'NoteSheetController@index')->name('note_sheet_index');
    Route::get('/create', 'NoteSheetController@create')->name('note_sheet_create');
    Route::post('/store', 'NoteSheetController@store')->name('note_sheet_store');
    Route::get('/edit/{id}', 'NoteSheetController@edit')->name('note_sheet_edit');
    Route::post('/update/{id}', 'NoteSheetController@update')->name('note_sheet_update');
    Route::get('/delete/{id?}', 'NoteSheetController@delete')->name('note_sheet_delete');

    Route::get('/download/{id}', 'NoteSheetController@download')->name('note_sheet_download');

});



