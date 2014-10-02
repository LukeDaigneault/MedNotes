<?php
// app/routes.php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



// Bind route parameters.
Route::group(array('before' => 'auth'), function () {
	Route::get('/', 'PatientController@index');
	Route::get('index', ['as' => 'index', 'uses' => 'PatientController@index']);
	Route::get('createPatient', ['as' => 'new.patient', 'uses' => 'PatientController@show']);
	Route::post('createPatient', ['as' => 'create.patient', 'uses' => 'PatientController@storePatient']);
});


Route::get('login', 'LoginController@showLogin');
Route::post('authenticate', 'LoginController@authenticateUser');
Route::get('logout', 'LoginController@logoutUser');
