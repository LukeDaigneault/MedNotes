<?php

class Complaint extends Eloquent {

	protected $table = 'complaints';
	public $timestamps = true;
	
	public function scopeOfUser($query, $user_id)
	{
    return $query->where('user_id', '=', $user_id);
	}

	public function patientNotes()
	{
		return $this->hasMany('PatientNote');
	}
	
	public function patient()
	{
		return $this->belongsTo('Patient');
	}

}