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

Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLogin']);
Route::post('authenticate', ['as' => 'authenticate', 'uses' => 'LoginController@authenticateUser']);
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logoutUser']);

Route::get('mailTest', ['as' => 'mailTest', 'uses' => 'EmailController@SendTest']);

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
	Route::delete('deletePatient/{patient}', ['as' => 'delete.patient', 'uses' => 'PatientController@handleDelete']);
	// Routes to treat patients
	Route::get('treatPatient/{patient}', ['as' => 'treat.patient', 'uses' => 'PatientController@showTreat']);
		
	
	//History routes
	// Routes to create History
	Route::get('createHistory/{patient}', ['as' => 'new.history', 'uses' => 'HistoryController@showCreate']);
	Route::post('createHistory/{patient}', ['as' => 'create.history', 'uses' => 'HistoryController@handleCreate']);
	// Routes to Edit History
	Route::get('editHistory/{patient}', ['as' => 'edit.history', 'uses' => 'HistoryController@showEdit']);
	Route::post('editHistory/{patient}', ['as' => 'edit.history', 'uses' => 'HistoryController@handleEdit']);
	
	//Complaint routes
	Route::get('showComplaints/{patient}', ['as' => 'show.complaints', 'uses' => 'ComplaintController@show']);
	// Routes to create History
	Route::post('createComplaint/{patient}', ['as' => 'create.complaint', 'uses' => 'ComplaintController@handleCreate']);
	// Routes to Edit History
	Route::post('editComplaint/{complaint}', ['as' => 'edit.complaint', 'uses' => 'ComplaintController@handleEdit']);
	// Routes to delete patients
	Route::delete('deleteComplaint/{complaint}', ['as' => 'delete.complaint', 'uses' => 'ComplaintController@handleDelete']);
	
	//PatientNote routes
	Route::get('showNotes/{complaint}', ['as' => 'show.patientNotes', 'uses' => 'PatientNoteController@show']);
	// Routes to create PatientNote
	Route::post('createPatientNote/{complaint}', ['as' => 'create.patientNote', 'uses' => 'PatientNoteController@handleCreate']);
	// Routes to Edit PatientNote
	Route::post('editPatientNote/{patientNote}', ['as' => 'edit.patientNote', 'uses' => 'PatientNoteController@handleEdit']);
	// Routes to delete PatientNote
	Route::delete('deletePatientNote/{patientNote}', ['as' => 'delete.patientNote', 'uses' => 'PatientNoteController@handleDelete']);
	
	
	
	//Doctor routes
	Route::get('doctorIndex', ['as' => 'index.doctor', 'uses' => 'DoctorController@showIndex']);
	// Routes to create Doctor
	Route::get('createDoctor', ['as' => 'new.doctor', 'uses' => 'DoctorController@showCreate']);
	Route::post('createDoctor', ['as' => 'create.doctor', 'uses' => 'DoctorController@handleCreate']);
	//Search for Doctor
	Route::post('searchDoctor', ['as' => 'search.doctor', 'uses' => 'DoctorController@showSearchResults']);
	// Routes to Delete Doctors
	Route::get('deleteDoctor/{doctor}', ['as' => 'delete.doctor', 'uses' => 'DoctorController@showDelete']);
	Route::delete('deleteDoctor/{doctor}', ['as' => 'delete.doctor', 'uses' => 'DoctorController@handleDelete']);
	// Routes to Edit Doctors
	Route::get('editDoctor/{doctor}', ['as' => 'edit.doctor', 'uses' => 'DoctorController@showEdit']);
	Route::post('editDoctor/{doctor}', ['as' => 'edit.doctor', 'uses' => 'DoctorController@handleEdit']);
	
});
