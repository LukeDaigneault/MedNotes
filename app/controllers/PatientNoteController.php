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
		
		return View::make('note.showPatientNote', ['patient' => $complaint->patient, 'complaint' => $complaint]);
    }
	
	 public function showCreate($complaintID)
    {
		$complaint = new Complaint;
		$complaint = $complaint->ofUser(Auth::id())->findOrFail($complaintID);
		
	    return View::make('note.createPatientNoteForm', ['patient' => $complaint->patient, 'complaint' => $complaint]);
    }
	
	public function handleCreate($complaintID)
	{		
		$patientNote = $this->patientNote;
		
		if( ! $patientNote->isValid(['note'=>Input::get('note')]))
				{
					return Redirect::back()->withInput()->withErrors($patientNote->errors);
				}
		
		$patientNote->note = Input::get('note'); 
		$patientNote->user_id = Auth::id();
		$patientNote->complaint_id = $complaintID;
		$patientNote->save();
	
    	return Redirect::route('show.patientNotes', ['complaint' => $patientNote->complaint->id]);		
		
	}
	
	 public function showEdit($patientNoteID)
    {
        // Show delete confirmation page.
		$patientNote = $this->patientNote->ofUser(Auth::id())->findOrFail($patientNoteID);
			
        return View::make('note.editPatientNoteForm', ['patient' => $patientNote->complaint->patient, 'complaint' => $patientNote->complaint, 'patientNote' => $patientNote]);
    }
	
	public function handleEdit($patientNoteID)
	{		
		$patientNote = $this->patientNote->ofUser(Auth::id())->findOrFail($patientNoteID);
		
		if( ! $patientNote->isValid(['note'=>Input::get('note')]))
				{
					return Redirect::back()->withInput()->withErrors($patientNote->errors);
				}
		
		$patientNote->note = Input::get('note'); 
		$patientNote->save();
	
    	return Redirect::route('show.patientNotes', ['complaint' => $patientNote->complaint->id]);		
		
	}
	
	
	public function showDelete($patientNoteID)
    {
        // Show delete confirmation page.
		$patientNote = $this->patientNote->ofUser(Auth::id())->findOrFail($patientNoteID);
			
        return View::make('note.deletePatientNoteForm', ['patient' => $patientNote->complaint->patient, 'complaint' => $patientNote->complaint, 'patientNote' => $patientNote]);
    }
	
	public function handleDelete($patientNoteID)
	{
		$patientNote = $this->patientNote->ofUser(Auth::id())->findOrFail($patientNoteID);
		$patientNote->delete();
		
		return Redirect::route('show.patientNotes', ['complaint' => $patientNote->complaint->id]);	
	}
	
}
