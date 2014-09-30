<?php

class LoginController extends \BaseController {


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function showLogin()
	{

		if (Auth::check()) return Redirect::to('/');
		return View::make('login.create');
	}
	
	public function showHome()
	{

		return View::make('index');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function authenticateUser()
	{
		if (Auth::attempt(Input::only('email', 'password'))){
		
			Redirect::to('/');
		
		}
		return Redirect::back()->withInput();
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function logoutUser()
	{
		Auth::logout();
		return Redirect::to('login');
	}


}
