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

Route::get('/', 'HomeController@index');
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

	Route::get ( 'admin/profile', 'AdminProfileController@show' );

    Route::get ( 'admin/kkpdata', 'Admin\AdminKKPDataController@index' );

    // STEP 1
    Route::get ( 'admin/kkpdata/create_account', 'Admin\AdminKKPDataController@create_step1' );
    Route::post ( 'admin/kkpdata/process_step1', 'Admin\AdminKKPDataController@process_step1' );
    Route::post ( 'admin/kkpdata/process_edit_step1/{id}', 'Admin\AdminKKPDataController@process_edit_step1' );
    Route::get ( 'admin/kkpdata/edit/{id}', 'Admin\AdminKKPDataController@edit_step1' );

    // STEP 2
    Route::get ( 'admin/kkpdata/step2/{id}', 'Admin\AdminKKPDataController@step2' );
    Route::post ( 'admin/kkpdata/process_step2/{id}', 'Admin\AdminKKPDataController@process_step2' );

    // STEP 3
    Route::get ( 'admin/kkpdata/step3/{id}', 'Admin\AdminKKPDataController@step3' );
    Route::post ( 'admin/kkpdata/process_step3/{id}', 'Admin\AdminKKPDataController@process_step3' );

    // STEP 4
    Route::get ( 'admin/kkpdata/step4/{id}', 'Admin\AdminKKPDataController@step4' );
    Route::post ( 'admin/kkpdata/process_step4/{id}', 'Admin\AdminKKPDataController@process_step4' );

    // STEP 5
    Route::get ( 'admin/kkpdata/step5/{id}', 'Admin\AdminKKPDataController@step5' );
    Route::post ( 'admin/kkpdata/process_step5/{id}', 'Admin\AdminKKPDataController@process_step5' );

    // STEP 6
    Route::get ( 'admin/kkpdata/step6/{id}', 'Admin\AdminKKPDataController@step6' );
    Route::post ( 'admin/kkpdata/process_step6/{id}', 'Admin\AdminKKPDataController@process_step6' );

    // STEP 7
    Route::get ( 'admin/kkpdata/step7/{id}', 'Admin\AdminKKPDataController@step7' );
    Route::post ( 'admin/kkpdata/process_step7/{id}', 'Admin\AdminKKPDataController@process_step7' );

    // STEP 8
    Route::get ( 'admin/kkpdata/step8/{id}', 'Admin\AdminKKPDataController@step8' );
    Route::post ( 'admin/kkpdata/process_step8/{id}', 'Admin\AdminKKPDataController@process_step8' );

    // STEP 9
    Route::get ( 'admin/kkpdata/step9/{id}', 'Admin\AdminKKPDataController@step9' );
    Route::post ( 'admin/kkpdata/process_step9/{id}', 'Admin\AdminKKPDataController@process_step9' );

    // STEP 10
    Route::get ( 'admin/kkpdata/step10/{id}', 'Admin\AdminKKPDataController@step10' );
    Route::post ( 'admin/kkpdata/process_step10/{id}', 'Admin\AdminKKPDataController@process_step10' );

    // STEP 11
    Route::get ( 'admin/kkpdata/step11/{id}', 'Admin\AdminKKPDataController@step11' );
    Route::post ( 'admin/kkpdata/process_step11/{id}', 'Admin\AdminKKPDataController@process_step11' );
    Route::get ( 'admin/kkpdata/delete/{id}/{section}/{file}', 'Admin\AdminKKPDataController@deletefile' );

    // STEP 12
    Route::get ( 'admin/kkpdata/step12/{id}', 'Admin\AdminKKPDataController@step12' );
    Route::post ( 'admin/kkpdata/process_step12/{id}', 'Admin\AdminKKPDataController@process_step12' );

    // STEP 13
    Route::get ( 'admin/kkpdata/step13/{id}', 'Admin\AdminKKPDataController@step13' );
    Route::post ( 'admin/kkpdata/process_step13/{id}', 'Admin\AdminKKPDataController@process_step13' );

    // STEP 14
    Route::get ( 'admin/kkpdata/step14/{id}', 'Admin\AdminKKPDataController@step14' );
    Route::post ( 'admin/kkpdata/process_step14/{id}', 'Admin\AdminKKPDataController@process_step14' );

    // STEP 15
    Route::get ( 'admin/kkpdata/step15/{id}', 'Admin\AdminKKPDataController@step15' );
    Route::post ( 'admin/kkpdata/process_step15/{id}', 'Admin\AdminKKPDataController@process_step15' );

    // STEP 16
    Route::get ( 'admin/kkpdata/step16/{id}', 'Admin\AdminKKPDataController@step16' );
    Route::post ( 'admin/kkpdata/process_step16/{id}', 'Admin\AdminKKPDataController@process_step16' );

    // STEP 17
    Route::get ( 'admin/kkpdata/step17/{id}', 'Admin\AdminKKPDataController@step17' );
    Route::post ( 'admin/kkpdata/process_step17/{id}', 'Admin\AdminKKPDataController@process_step17' );

    Route::get ( 'admin/kkpdata/delete/{id}', 'Admin\AdminKKPDataController@delete' );

});