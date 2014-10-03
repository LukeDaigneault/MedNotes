<?php

class Patient extends Eloquent {

	protected $table = 'patients';
	public $timestamps = true;
	
	protected $rules =[
	'firstName' => 'required|alpha',
	'lastName' => 'required|alpha',
	'homePhone' => 'numeric|required_without:mobilePhone',
	'mobilePhone' => 'numeric|required_without:homePhone',
	'email' => 'required|email|unique:patients',
	'dob' => 'date_format:d/m/Y'
	];	

	public function doctor()
	{
		return $this->hasOne('Doctor');
	}

	public function complaints()
	{
		return $this->hasMany('Condition');
	}

	public function history()
	{
		return $this->hasOne('History');
	}

}