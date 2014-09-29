<?php

class History extends Eloquent {

	protected $table = 'historys';
	public $timestamps = true;
	protected $fillable = array('social', 'drug', 'conditions', 'details');

}