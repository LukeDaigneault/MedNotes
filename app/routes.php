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
	// Routes to edit patients
	Route::get('editPatient/{patient}', ['as' => 'edit.patient', 'uses' => 'PatientController@showEdit']);
	Route::post('editPatient/{patient}', ['as' => 'edit.patient', 'uses' => 'PatientController@handleEdit']);
	//Search for patient
	Route::post('searchPatient', ['as' => 'search.patient', 'uses' => 'PatientController@showSearchResults']);
	// Routes to delete patients
	Route::get('deletePatient/{patient}', ['as' => 'delete.patient', 'uses' => 'PatientController@showDelete']);
	Route::post('deletePatient/{patient}', ['as' => 'delete.patient', 'uses' => 'PatientController@handleDelete']);
	
	//Doctor routes
	Route::get('doctorIndex', ['as' => 'index.doctor', 'uses' => 'DoctorController@showIndex']);
	// Routes to create Doctor
	Route::get('createDoctor', ['as' => 'new.doctor', 'uses' => 'DoctorController@showCreate']);
	Route::post('createDoctor', ['as' => 'create.doctor', 'uses' => 'DoctorController@handleCreate']);
	//Search for Doctor
	Route::post('searchDoctor', ['as' => 'search.doctor', 'uses' => 'DoctorController@showSearchResults']);
	// Routes to Delete Doctors
	Route::get('deleteDoctor/{doctor}', ['as' => 'delete.doctor', 'uses' => 'DoctorController@showDelete']);
	Route::post('deleteDoctor/{doctor}', ['as' => 'delete.doctor', 'uses' => 'DoctorController@handleDelete']);
	// Routes to Edit Doctors
	Route::get('editDoctor/{doctor}', ['as' => 'edit.doctor', 'uses' => 'DoctorController@showEdit']);
	Route::post('editDoctor/{doctor}', ['as' => 'edit.doctor', 'uses' => 'DoctorController@handleEdit']);
	
});




Route::get('login', 'LoginController@showLogin');
Route::post('authenticate', 'LoginController@authenticateUser');
Route::get('logout', 'LoginController@logoutUser');
