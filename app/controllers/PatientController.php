<?php

class PatientController extends \BaseController {

	protected $patient;

	public function __construct(Patient $patient){
		$this->patient = $patient;
	}


	public function showIndex()
    {
     // Show a listing of games.
     $patients = $this->patient->ofUser(Auth::id())->
     orderBy('lastName', 'asc')->
     orderBy('firstName', 'asc')->get();
    return View::make('patient.patientIndex', compact('patients'));

    }
    
    public function showSearchResults()
    {
     // Show  the patients that match the search
     $patients = $this->patient->ofUser(Auth::id())->
	 where('firstName', 'LIKE', '%'.Input::get('search').'%')->
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
		$doctor->user_id = Auth::id();
		
			if( ! $doctor->isValid(['name'=>$doctor->name, 'phoneNumber'=>$doctor->phoneNumber, 'address'=>$doctor->address]))
				{
				return Redirect::back()->withInput()->withErrors($doctor->errors);
				}
		
		$doctor->save();
		$patient->doctor()->associate($doctor);
		}
		else
		{
		$doctor = Doctor::find(Input::get('doctorsID'));
		$patient->doctor()->associate($doctor);
		}
		
  		$patient->save();

    	return Redirect::to('index');		
		
	}
	
	public function showDelete($patientID)
    {
        // Show delete confirmation page.
		$patient = $this->patient->ofUser(Auth::id())->findOrFail($patientID);
	
        return View::make('patient.deletePatientForm', compact('patient'));
    }
	
	public function handleDelete($patientID)
	{
		$patient = $this->patient->ofUser(Auth::id())->findOrFail($patientID);
		$patient->delete();

		return Redirect::to('index');	
	}
	
	public function showEdit($patientID)
    {
        // Show delete confirmation page.
		$patient = $this->patient->ofUser(Auth::id())->findOrFail($patientID);
		$refDoctor = $patient->doctor;
		$doctors = Doctor::get();
		
        return View::make('patient.editPatientForm', ['patient' => $patient, 'doctors' => $doctors, 'refDoctor' => $refDoctor]);
    }
	
	public function handleEdit($patientID)
	{
		if( ! $this->patient->isValid(Input::all(), $patientID))
		{
		return Redirect::back()->withInput()->withErrors($this->patient->errors);
		}
	
		$patient = $this->patient->ofUser(Auth::id())->findOrFail($patientID);
		
		$patient->firstName = Input::get('firstName');
		$patient->lastName = Input::get('lastName');
		$patient->homePhone = Input::get('homePhone');
		$patient->mobilePhone = Input::get('mobilePhone');
		$patient->address = Input::get('address');

		$dob_orig = strtotime(Input::get('dob'));
		$dob = date("Y-m-d", $dob_orig );		
		
		$patient->dob = $dob;
		$patient->email = Input::get('email');
		
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
			$patient->doctor()->associate($doctor);
		}
		elseif (!(Input::get('doctorsID') == 0))
		{
				$doctor = Doctor::find(Input::get('doctorsID'));
				$patient->doctor()->associate($doctor);
		}
		else{
				$patient->doctor_id = null;
		}
		
  		$patient->save();

		return Redirect::to('index');		
		
	}


}
