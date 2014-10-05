<?php
use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	protected $table = 'users';
	public $timestamps = true;
	protected $fillable = array('username', 'email', 'password');

	public function patients()
	{
		return $this->hasMany('Patient');
	}

}