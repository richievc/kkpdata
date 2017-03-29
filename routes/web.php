<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

/*
 |--------------------------------------------------------------------------
 | Front End Routes
 |--------------------------------------------------------------------------
 | 
 |
 */
Route::get('/', function () {
    return redirect()->to('admin/login');
});

Route::group ([ 'middleware' => 'admin' ], function () {

    // Taxonomy
    CRUD::resource('admin/taxonomy', 'Admin\TaxonomyCrudController');

	Route::get ( 'admin/profile', 'AdminProfileController@show' );

    Route::get ( 'admin/kkpdata', 'Admin\AdminKKPDataController@index' );

    Route::get ( 'admin/kkpdata/create_account', 'Admin\AdminKKPDataController@create_step1' );
    Route::post ( 'admin/kkpdata/process_step1', 'Admin\AdminKKPDataController@process_step1' );

    Route::get ( 'admin/kkpdata/step2/{id}', 'Admin\AdminKKPDataController@step2' );
    Route::post ( 'admin/kkpdata/process_step2/{id}', 'Admin\AdminKKPDataController@process_step2' );

    Route::get ( 'admin/kkpdata/step3/{id}', 'Admin\AdminKKPDataController@step3' );
    Route::post ( 'admin/kkpdata/process_step3/{id}', 'Admin\AdminKKPDataController@process_step3' );

    Route::get ( 'admin/kkpdata/step4/{id}', 'Admin\AdminKKPDataController@step4' );
    Route::post ( 'admin/kkpdata/process_step4/{id}', 'Admin\AdminKKPDataController@process_step4' );

    Route::get ( 'admin/kkpdata/step5/{id}', 'Admin\AdminKKPDataController@step5' );
    Route::post ( 'admin/kkpdata/process_step5/{id}', 'Admin\AdminKKPDataController@process_step5' );

    Route::get ( 'admin/kkpdata/step6/{id}', 'Admin\AdminKKPDataController@step6' );
    Route::post ( 'admin/kkpdata/process_step6/{id}', 'Admin\AdminKKPDataController@process_step6' );






























});