<?php

class PatientController extends \BaseController {

	protected $patient;

	public function __construct(Patient $patient){
		$this->patient = $patient;
	}


	public function showIndex()
    {
     // Show a listing of games.
     $patients = $this->patient->where('user_id', '=', Auth::id())->
     orderBy('lastName', 'asc')->
     orderBy('firstName', 'asc')->get();
    return View::make('patient.patientIndex', compact('patients'));

    }
    
    public function showSearchResults()
    {
     // Show  the patients that match the search
     $patients = $this->patient->where('firstName', 'LIKE', '%'.Input::get('search').'%')->
     orWhere('lastName', 'LIKE', '%'.Input::get('search').'%')->
     orderBy('lastName', 'asc')->
     orderBy('firstName', 'asc')->get();
    return View::make('patient.patientSearchResults', compact('patients'));

    }

	
	public function showCreate()
	{
		$doctors = Doctor::get();

		return View::make('patient.createPatientForm', compact('doctors'));
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
		
		if(Input::has('doctorsName'))
		{
		$doctor = new Doctor;
		$doctor->name = Input::get('doctorsName');
		$doctor->phoneNumber = Input::get('doctorsPhoneNumber');
		$doctor->address = Input::get('doctorsAddress');
		
			if( ! $doctor->isValid(['name'=>$doctor->name, 'phoneNumber'=>$doctor->phoneNumber, 'address'=>$doctor->address]))
			{
			return Redirect::back()->withInput()->withErrors($doctor->errors);
			}
		
		$doctor->save();
		$patient->doctor_id = $doctor->id;
		}elseif (!(Input::get('doctorsID') == 0))
		{
		$doctor = Doctor::find(Input::get('doctorsID'));
		$patient->doctor_id = $doctor->id;
		}
		
  		$patient->save();

    	return Redirect::to('index');		
		
	}
	
	public function showDelete($patientID)
    {
        // Show delete confirmation page.
		$patient = $this->patient->find($patientID);
        return View::make('patient.deletePatientForm', compact('patient'));
    }
	
	public function handleDelete()
	{
		$patient = $this->patient->findOrFail(Input::get('patient'));
		$patient->delete();

		return Redirect::to('index');	
	}



}
