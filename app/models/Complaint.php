<?php

class Complaint extends Eloquent {

	protected $table = 'complaints';
	public $timestamps = true;

	public function patientNotes()
	{
		return $this->hasMany('PatientNote');
	}

}