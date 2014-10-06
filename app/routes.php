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
	Route::get('/', 'PatientController@showIndex');
	Route::get('index', ['as' => 'index', 'uses' => 'PatientController@showIndex']);
	// Routes to create patients
	Route::get('createPatient', ['as' => 'new.patient', 'uses' => 'PatientController@showCreate']);
	Route::post('createPatient', ['as' => 'create.patient', 'uses' => 'PatientController@handleCreate']);
	//Search for patient
	Route::post('searchPatient', ['as' => 'search.patient', 'uses' => 'PatientController@showSearchResults']);
	// Routes to delete patients
	Route::get('deletePatient/{patient}', ['as' => 'delete.patient', 'uses' => 'PatientController@showDelete']);
	Route::post('deletePatient/{patient}', ['as' => 'delete.patient', 'uses' => 'PatientController@handleDelete']);
});


Route::get('login', 'LoginController@showLogin');
Route::post('authenticate', 'LoginController@authenticateUser');
Route::get('logout', 'LoginController@logoutUser');
