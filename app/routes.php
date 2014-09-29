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
	Route::get('/', 'LoginController@showHome');
	Route::get('/index', 'LoginController@showHome');
});


Route::get('login', 'LoginController@showLogin');
Route::post('authenticate', 'LoginController@authenticateUser');
Route::get('logout', 'LoginController@logoutUser');
