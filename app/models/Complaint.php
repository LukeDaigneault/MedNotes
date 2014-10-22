<?php

class Complaint extends Eloquent {

	protected $table = 'complaints';
	public $timestamps = true;
	public $errors;
	
	public static $rules =[
	'description' => 'required'
	];	
	
	public function scopeOfUser($query, $user_id)
	{
    return $query->where('user_id', '=', $user_id);
	}

	public function patientNotes()
	{
		return $this->hasMany('PatientNote')->orderBy('created_at', 'desc');
	}
	
	public function patient()
	{
		return $this->belongsTo('Patient');
	}
	
	public function isValid($data)
	{
	
    $validation = Validator::make($data, static::$rules);
		
		
		if ($validation->passes()) return true;
		
		$this->errors = $validation->messages();
		
		return false;
		
	}
}