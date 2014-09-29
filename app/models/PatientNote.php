<?php

class PatientNote extends Eloquent {

	protected $table = 'patientnotes';
	public $timestamps = true;
	protected $fillable = array('note', 'condition_id');

}