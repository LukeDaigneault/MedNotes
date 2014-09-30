<?php

class UserController extends \BaseController {


	
	public function show()
	{

		return View::make('createPatient');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeUser()
	{
		if (Auth::attempt(Input::only('email', 'password'))){
		
			Redirect::to('/');
		
		}
		return Redirect::back()->withInput();
	}



}
