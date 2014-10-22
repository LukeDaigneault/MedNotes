<?php

class PatientNote extends Eloquent {

	protected $table = 'patientNotes';
	public $timestamps = true;
	public $errors;
	
	public static $rules =[
	'note' => 'required'
	];
	
	public function scopeOfUser($query, $user_id)
	{
    return $query->where('user_id', '=', $user_id);
	}
	
	public function complaint()
	{
		return $this->belongsTo('Complaint');
	}
	
	
	public function isValid($data)
	{
	
    $validation = Validator::make($data, static::$rules);
		
		
		if ($validation->passes()) return true;
		
		$this->errors = $validation->messages();
		
		return false;
		
	}
}