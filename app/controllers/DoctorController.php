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
	$doctor = $this->doctor;
		if( ! $this->doctor->isValid(Input::all()))
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

    	if(Request::ajax())
				{
					return Response::json(array('success' => true));
				}
			else
				{
					return Redirect::to('doctorIndex');
				}	
		
	}
	
	public function handleDelete($doctorID)
	{
		$doctor = $this->doctor->ofUser(Auth::id())->findOrFail($doctorID);
		$doctor->delete();

		if(Request::ajax())
				{
					return Response::json(array('success' => true));
				}
			else
				{
					return Redirect::to('doctorIndex');
				}	
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
		$doctor = $this->doctor->findOrFail($doctorID);
		
		if( ! $doctor->isValid(Input::all(), $doctorID))
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
				
		$doctor->save();
		
		if(Request::ajax())
				{
					return Response::json(array('success' => true));
				}
			else
				{
					return Redirect::to('doctorIndex');
				}
   		
	}

}
