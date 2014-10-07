<?php

class DoctorController extends \BaseController {

	protected $doctor;

	public function __construct(Doctor $doctor){
		$this->doctor = $doctor;
	}


	public function showIndex()
    {
     // Show a listing of games.
     $doctors = $this->doctor->
     orderBy('name', 'asc')->get();
    return View::make('doctor.doctorIndex', compact('doctors'));

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
	
	public function showDelete($doctorID)
    {
        // Show delete confirmation page.
		$doctor = $this->doctor->find($doctorID);
        return View::make('doctor.deleteDoctorForm', compact('doctor'));
    }
	
	public function handleDelete()
	{
		$doctor = $this->doctor->findOrFail(Input::get('doctor'));
		$doctor->delete();

		return Redirect::to('doctorIndex');	
	}



}
