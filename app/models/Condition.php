<?php

class Condition extends Eloquent {

	protected $table = 'conditions';
	public $timestamps = true;

	public function patientNotes()
	{
		return $this->hasMany('PatientNote');
	}

}