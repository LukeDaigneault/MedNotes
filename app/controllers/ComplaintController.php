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
	
	public function handleCreate($patientID)
	{		
		$complaint = $this->complaint;
		
		if( ! $complaint->isValid(['description'=>Input::get('description')]))
				{
					return Redirect::back()->withInput()->withErrors($complaint->errors);
				}
		
		$complaint->description = Input::get('description'); 
		$complaint->user_id = Auth::id();
		$complaint->patient_id = $patientID;
		$complaint->save();
	
    	return Redirect::route('treat.patient', ['patient' => $patientID]);		
		
	}
	
	 public function showEdit($complaintID)
    {
		$complaint = $this->complaint->ofUser(Auth::id())->findOrFail($complaintID);
				
	    return View::make('complaint.editComplaintForm', ['patient' => $complaint->patient, 'complaint' => $complaint]);
    }
	
	public function handleEdit($complaintID)
	{		
		$complaint = $this->complaint->ofUser(Auth::id())->findOrFail($complaintID);
		
		if( ! $complaint->isValid(['description'=>Input::get('description')]))
				{
					return Redirect::back()->withInput()->withErrors($complaint->errors);
				}
		
		$complaint->description = Input::get('description'); 
		$complaint->save();
	
    	return Redirect::route('treat.patient', ['patient' => $complaint->patient->id]);		
		
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
	
		
	
}
