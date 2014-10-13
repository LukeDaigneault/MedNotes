<?php

class DoctorController extends \BaseController {

	protected $doctor;

	public function __construct(Doctor $doctor){
		$this->doctor = $doctor;
	}


	public function showIndex()
    {
     // Show a listing of games.
     $doctors = $this->doctor->ofUser(Auth::id())->
     orderBy('name', 'asc')->get();
    return View::make('doctor.doctorIndex', compact('doctors'));

    }
 
	public function showCreate()
	{	
		return View::make('doctor.createDoctorForm');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function handleCreate()
	{
		if( ! $this->doctor->isValid(Input::all()))
		{
		return Redirect::back()->withInput()->withErrors($this->doctor->errors);
		}					
		
		
		$doctor = new Doctor;
		$doctor->name = Input::get('name');
		$doctor->phoneNumber = Input::get('phoneNumber');
		$doctor->address = Input::get('address');
		$doctor->user_id = Auth::id();
				
		$doctor->save();

    	return Redirect::to('doctorIndex');		
		
	}
	
	public function showDelete($doctorID)
    {
        // Show delete confirmation page.
		$doctor = $this->doctor->ofUser(Auth::id())->findOrFail($doctorID);
        return View::make('doctor.deleteDoctorForm', compact('doctor'));
    }
	
	public function handleDelete($doctorID)
	{
		$doctor = $this->doctor->ofUser(Auth::id())->findOrFail($doctorID);
		$doctor->delete();

		return Redirect::to('doctorIndex');	
	}


	
		public function showEdit($doctorID)
	{	
		$doctor = $this->doctor->find($doctorID);
		
		return View::make('doctor.editDoctorForm', compact('doctor'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function handleEdit($doctorID)
	{
		if( ! $this->doctor->isValid(Input::all(), $doctorID))
		{
		return Redirect::back()->withInput()->withErrors($this->doctor->errors);
		}					
		
		$doctor = $this->doctor->findOrFail($doctorID);
		
		$doctor->name = Input::get('name');
		$doctor->phoneNumber = Input::get('phoneNumber');
		$doctor->address = Input::get('address');
				
		$doctor->save();

    	return Redirect::to('doctorIndex');		
		
	}

}
