<?php

class PatientController extends \BaseController {

	protected $patient;

	public function __construct(Patient $patient){
		$this->patient = $patient;
	}


	public function index()
    {
     // Show a listing of games.
     $patients = $this->patient->where('user_id', '=', Auth::id())->get();
    return View::make('index', compact('patients'));

    }

	
	public function showCreate()
	{

		return View::make('createPatient');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function handleCreate()
	{
		if( ! $this->patient->isValid(Input::all()))
		{
		return Redirect::back()->withInput()->withErrors($this->patient->errors);
		}
	
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

    	return Redirect::route('index');		
		
	}
	
	public function showDelete($patientID)
    {
        // Show delete confirmation page.
		$patient = Patient::find($patientID);
        return View::make('deletePatient', compact('patient'));
    }
	
	public function handleDelete()
	{
		$patient = Patient::findOrFail(Input::get('patient'));
		$patient->delete();

		return Redirect::route('index');	
	}



}
