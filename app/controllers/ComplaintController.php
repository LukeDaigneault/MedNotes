<?php

class ComplaintController extends \BaseController {

	protected $complaint;

	public function __construct(Complaint $complaint){
		$this->complaint = $complaint;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	 
	 public function showCreate($patientID)
    {
		$patient = new Patient;
		$patient = $patient->ofUser(Auth::id())->findOrFail($patientID);
		
	    return View::make('complaint.createComplaintForm', compact('patient'));
    }
	
	public function handleCreate($patientID)
	{		
		$complaint = $this->complaint;
		
		$complaint->description = Input::get('description'); 
		$complaint->user_id = Auth::id();
		$complaint->patient_id = $patientID;
		$complaint->save();
	
    	return Redirect::route('treat.patient', ['patient' => $patientID]);		
		
	}
	
	public function showDelete($complaintID)
    {
        // Show delete confirmation page.
		$complaint = $this->complaint->ofUser(Auth::id())->findOrFail($complaintID);
			
        return View::make('complaint.deleteComplaintForm', ['patient' => $complaint->patient, 'complaint' => $complaint]);
    }
	
	public function handleDelete($complaintID)
	{
		$complaint = $this->complaint->ofUser(Auth::id())->findOrFail($complaintID);
		$complaint->delete();
		
		return Redirect::route('treat.patient', ['patient' => $complaint->patient->id]);	
	}
	
	public function showEdit($patientID)
    {
        // Show delete confirmation page.
		$patient = $this->patient->ofUser(Auth::id())->findOrFail($patientID);
		$doctors = Doctor::get();
		
        return View::make('patient.editPatientForm', ['patient' => $patient, 'doctors' => $doctors]);
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
			
			if( ! $doctor->isValid(['name'=>$doctor->name, 'phoneNumber'=>$doctor->phoneNumber, 'address'=>$doctor->address]))
				{
					return Redirect::back()->withInput()->withErrors($doctor->errors);
				}
			
			$doctor = new Doctor;
			$doctor->name = Input::get('doctorsName');
			$doctor->phoneNumber = Input::get('doctorsPhoneNumber');
			$doctor->address = Input::get('doctorsAddress');
			
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
