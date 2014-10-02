<?php

class Patient extends Eloquent {

	protected $table = 'patients';
	public $timestamps = true;
	protected $fillable = array('doctor_id', 'history_id');

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