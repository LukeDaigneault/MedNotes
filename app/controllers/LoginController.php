<?php

class LoginController extends \BaseController {


	/**
	 * Show the login form
	 */
	public function showLogin()
	{

		if (Auth::check()) return Redirect::to('/');
		return View::make('login.loginForm');
	}
	


	/**
	 * Attempt to authenticate the user
	 *
	 * @return Response
	 */
	public function authenticateUser()
	{
		if (Auth::attempt(Input::only('email', 'password'))){
		
			Redirect::to('index');
		
		}
		return Redirect::back()->withInput();
	}



	/**
	 * Logout the user
	 */
	public function logoutUser()
	{
		Auth::logout();
		return Redirect::to('login');
	}


}
