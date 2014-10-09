<?php

class Patient extends Eloquent {

	protected $table = 'patients';
	public $timestamps = true;
	public $errors;
	
	public static $rules =[
	'firstName' => 'required|alpha',
	'lastName' => 'required|alpha',
	'address' => 'alpha_num_spaces',
	'homePhone' => 'numeric|required_without:mobilePhone',
	'mobilePhone' => 'numeric|required_without:homePhone',
	'email' => 'required|email|unique:patients',
	'dob' => 'required|date_format:d/m/Y'
	];	

	public function doctor()
	{
		return $this->belongsTo('Doctor');
	}

	public function complaints()
	{
		return $this->hasMany('Complaints');
	}

	public function history()
	{
		return $this->hasOne('History');
	}
	
	public function user()
	{
		return $this->hasOne('User');
	}
	
	public function isValid($data)
	{
		$validation = Validator::make($data, static::$rules);
		
		if ($validation->passes()) return true;
		
		$this->errors = $validation->messages();
		
		return false;
		
	}

}