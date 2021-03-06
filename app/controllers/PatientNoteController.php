<?php

class PatientNoteController extends \BaseController {

	protected $patientNote;

	public function __construct(PatientNote $patientNote){
		$this->patientNote = $patientNote;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	 
	 public function show($complaintID)
    {
		$complaint = new Complaint;
		$complaint = $complaint->ofUser(Auth::id())->findOrFail($complaintID);
		
		return View::make('note.showPatientNote', ['complaint' => $complaint]);
    }
	
	public function handleCreate($complaintID)
	{		
		$patientNote = $this->patientNote;
		
		if( ! $patientNote->isValid(['note'=>Input::get('note')]))
				{
				if(Request::ajax())
					{
						return Response::json(array('errors' => $patientNote->errors));
					}
					else
					{
						return Redirect::back()->withInput()->withErrors($patientNote->errors);
					}

				}
		
		$patientNote->note = Input::get('note'); 
		$patientNote->user_id = Auth::id();
		$patientNote->complaint_id = $complaintID;
		$patientNote->save();
	
    	return Redirect::route('show.patientNotes', ['complaint' => $complaintID]);		
		
	}

	
	public function handleEdit($patientNoteID)
	{		
		$patientNote = $this->patientNote->ofUser(Auth::id())->findOrFail($patientNoteID);
		
		if( ! $patientNote->isValid(['note'=>Input::get('note')]))
				{
				if(Request::ajax())
					{
						return Response::json(array('errors' => $patientNote->errors));
					}
					else
					{
						return Redirect::back()->withInput()->withErrors($patientNote->errors);
					}
				}
		
		$patientNote->note = Input::get('note'); 
		$patientNote->save();
	
    	return Redirect::route('show.patientNotes', ['complaint' => $patientNote->complaint->id]);		
	}
	
	
	public function handleDelete($patientNoteID)
	{
		$patientNote = $this->patientNote->ofUser(Auth::id())->findOrFail($patientNoteID);
		$patientNote->delete();
		if(Request::ajax())
					{
						return Response::json(array('success' => true));
					}
					else
					{
						return Redirect::route('show.patientNotes', ['complaint' => $patientNote->complaint->id]);	
					}
		
		
	}
	
}
