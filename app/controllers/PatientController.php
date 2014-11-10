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
		return View::make('patient.patientIndex', compact('patients'));

    }

	
	public function showCreate()
	{
		return View::make('patient.createPatientForm');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function handleCreate()
	{
	
		$patient = $this->patient;
		if( ! $this->patient->isValid(Input::all()))
			{
				if(Request::ajax())
					{
						return Response::json(array('errors' => $patient->errors));
					}
				else
					{
						return Redirect::back()->withInput()->withErrors($patient->errors);
					}
			}
				
		$patient->firstName = Input::get('firstName');
		$patient->lastName = Input::get('lastName');
		$patient->homePhone = Input::get('homePhone');
		$patient->mobilePhone = Input::get('mobilePhone');
		$patient->address = Input::get('address');

		$dob = DateTime::createFromFormat('d/m/Y', Input::get('dob'));		
		
		$patient->dob = $dob;
		$patient->email = Input::get('email');
		$patient->user_id = Auth::id();
		$patient->save();
		if(Request::ajax())
			{
				return Response::json(array('success' => true));
			}
		else
			{
				return Redirect::to('index');		
			}	
					
	}
	
	public function handleDelete($patientID)
	{
		$patient = $this->patient->ofUser(Auth::id())->findOrFail($patientID);
		if(is_object($patient->history) )$patient->history->delete();
		$patient->delete();
		if(Request::ajax())
					{
						return Response::json(array('success' => true));
					}
					else
					{
						return Redirect::to('index');
					}
				

			
	}
	
	public function showEdit($patientID)
    {
        // Show delete confirmation page.
		$patient = $this->patient->ofUser(Auth::id())->findOrFail($patientID);
		
        return View::make('patient.editPatientForm', ['patient' => $patient]);
    }
	
	public function handleEdit($patientID)
	{
		$patient = $this->patient;
		
		if( ! $this->patient->isValid(Input::all(), $patientID))
			{
				if(Request::ajax())
					{
						return Response::json(array('errors' => $patient->errors));
					}
				else
					{
						return Redirect::back()->withInput()->withErrors($patient->errors);
					}
			}

		$patient = $patient->ofUser(Auth::id())->findOrFail($patientID);
		
		$patient->firstName = Input::get('firstName');
		$patient->lastName = Input::get('lastName');
		$patient->homePhone = Input::get('homePhone');
		$patient->mobilePhone = Input::get('mobilePhone');
		$patient->address = Input::get('address');

	
		$dob = DateTime::createFromFormat('d/m/Y', Input::get('dob'));		
		
		$patient->dob = $dob;
		$patient->email = Input::get('email');
		
		$patient->save();

		if(Request::ajax())
			{
				return Response::json(array('success' => true));
			}
		else
			{
				return Redirect::to('index');		
			}		
		
	}
	
	public function showAddReferrer($patientID)
    {
        $patient = $this->patient->ofUser(Auth::id())->findOrFail($patientID);
		$doctors = new Doctor;
		$doctors = $doctors->ofUser(Auth::id())->get();
		
        return View::make('patient.attachReferrerForm', ['patient' => $patient, 'doctors' => $doctors]);

    }
	
	public function handleAddReferrer($patientID)
	{
		$doctor = new Doctor;
		$patient = $this->patient->ofUser(Auth::id())->findOrFail($patientID);
		
		if(Input::has('name'))
		{
			
			if( ! $doctor->isValid(Input::all()))
				{
				if(Request::ajax())
					{
						return Response::json(array('errors' => $doctor->errors));
					}
				else
					{
						return Redirect::back()->withInput()->withErrors($doctor->errors);
					}
			}
			
			$doctor->name = Input::get('name');
			$doctor->phoneNumber = Input::get('phoneNumber');
			$doctor->address = Input::get('address');
			$doctor->user_id = Auth::id();
			
			$doctor->save();
			$patient->doctor()->associate($doctor);
		}
		elseif (Input::get('doctorsID') != 0)
		{
			$doctor = $doctor->ofUser(Auth::id())->findOrFail(Input::get('doctorsID'));
			$patient->doctor()->associate($doctor);
		}
		else
		{
				$patient->doctor_id = null;
		}
		
  		$patient->save();

		if(Request::ajax())
			{
				return Response::json(array('success' => true));
			}
		else
			{
				return Redirect::to('index');		
			}		
		
	}
	
	public function showTreat($patientID)
    {

		$patient = $this->patient->ofUser(Auth::id())->findOrFail($patientID);
			
        return View::make('patient.treatPatientForm', compact('patient'));
    }


}
