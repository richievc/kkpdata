<?php
/*
 |--------------------------------------------------------------------------
 | Front End Routes
 |--------------------------------------------------------------------------
 | 
 |
 */

Auth::routes();


/**
 * KKPData Routes
 */

/**
 * KKPData Routes
 */
Route::get('/', function() {
    return Redirect::to('/home');
});
Route::get('home', 'KKPDataController@index');

Route::get('kkpdata/survey/begin', 'KKPDataController@beginSurvey');
Route::get('kkpdata/survey/background', 'KKPDataController@surveyBackground');
Route::get('kkpdata/survey/background/{id}', 'KKPDataController@surveyBackground');
Route::get('kkpdata/survey/property/{id}', 'KKPDataController@surveyProperty');
Route::get('kkpdata/survey/environmental/{id}', 'KKPDataController@surveyEnvironmental');
Route::get('kkpdata/survey/documents/{id}', 'KKPDataController@surveyDocuments');

Route::post('kkpdata/process_step1', 'KKPDataController@process_step1');
Route::post('kkpdata/process_edit_step1/{id}', 'KKPDataController@process_edit_step1');
Route::post('kkpdata/process_step2/{id}', 'KKPDataController@process_step2');
Route::post('kkpdata/process_step3/{id}', 'KKPDataController@process_step3');
Route::post('kkpdata/process_step4/{id}', 'KKPDataController@process_step4');

Route::get('kkpdata/survey/complete_overview/{id}', 'KKPDataController@overview');

Route::get('kkpdata/survey/remove_file/{id}/{file}', 'KKPDataController@removeFile');

/********************************************************************
 * Admin Controllers
 */

Route::group ([ 'middleware' => 'admin' ], function () {

    // Taxonomy
    CRUD::resource('admin/taxonomy', 'Admin\TaxonomyCrudController');

	Route::get ( 'admin/profile', 'Admin\AdminProfileController@show' );


    Route::get ( 'admin/kkpdata', 'Admin\AdminKKPDataController@index' );

});






























