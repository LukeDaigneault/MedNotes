<?php

class PatientController extends \BaseController {

	public function index()
    {
     // Show a listing of games.
     $patients = Patient::where('user_id', '=', Auth::id())->get();
    return View::make('index', compact('patients'));

    }

	
	public function show()
	{

		return View::make('createPatient');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storePatient()
	{
		$patient = new Patient;
		$patient->firstName = Input::get('firstName');
		$patient->lastName = Input::get('lastName');
		$patient->homePhone = Input::get('homePhone');
		$patient->mobilePhone = Input::get('mobilePhone');
		$patient->address = Input::get('address');

		$dob_orig = strtotime(Input::get('dob'));
		$dob = date("Y-m-d", $dob_orig );		
		
		$patient->dob = $dob;
		$patient->email = Input::get('email');
		$patient->user_id = Auth::id();
		
  		$patient->save();

    	return Redirect::action('index');		
		
		//return Redirect::back()->withInput();
	}



}
