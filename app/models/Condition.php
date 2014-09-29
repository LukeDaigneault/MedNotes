<?php

class Condition extends Eloquent {

	protected $table = 'conditions';
	public $timestamps = true;
	protected $fillable = array('description', 'patient_id');

	public function patientNotes()
	{
		return $this->hasMany('PatientNote');
	}

}