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
	 
	  public function show($patientID)
    {
		$patient = new patient;
		$patient = $patient->ofUser(Auth::id())->findOrFail($patientID);
		
		return View::make('complaint.showComplaintForm', ['patient' => $patient]);
    }
	
	public function handleCreate($patientID)
	{		
		$complaint = $this->complaint;
		
		if( ! $complaint->isValid(['description'=>Input::get('description')]))
				{
				if(Request::ajax())
					{
						return Response::json(array('errors' => $complaint->errors));
					}
					else
					{
						return Redirect::back()->withInput()->withErrors($complaint->errors);
					}
					
				}
		
		$complaint->description = Input::get('description'); 
		$complaint->user_id = Auth::id();
		$complaint->patient_id = $patientID;
		$complaint->save();
		
		return Redirect::route('show.complaints', ['patient' => $patientID]);
	
	}

		
	public function handleEdit($complaintID)
	{		
		$complaint = $this->complaint->ofUser(Auth::id())->findOrFail($complaintID);
		
		if( ! $complaint->isValid(['description'=>Input::get('description')]))
				{
				if(Request::ajax())
					{
						return Response::json(array('errors' => $complaint->errors));
					}
					else
					{
						return Redirect::back()->withInput()->withErrors($complaint->errors);
					}
				}
		
		$complaint->description = Input::get('description'); 
		$complaint->save();
		
		return Redirect::route('show.complaints', ['patient' => $complaint->patient->id]);	
		
	}
	
	
	public function handleDelete($complaintID)
	{
		$complaint = $this->complaint->ofUser(Auth::id())->findOrFail($complaintID);
		$complaint->delete();

		return Redirect::route('show.complaints', ['patient' => $complaint->patient->id]);		
	}
	
		
	
}
