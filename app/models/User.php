<?php

class User extends Eloquent {

	protected $table = 'users';
	public $timestamps = true;
	protected $fillable = array('username', 'email', 'password');

	public function patients()
	{
		return $this->hasMany('Patient');
	}

}