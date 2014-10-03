<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	public $timestamps = true;
	protected $hidden = array('password', 'remember_token');
	
	protected $rules =[
	'username' => 'required',
	'email' => 'required|email|unique:users',
	'password' => 'required|min:8'
	];	

	public function patients()
	{
		return $this->hasMany('Patient');
	}

}