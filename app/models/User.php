<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	public $timestamps = true;
	protected $fillable = array('username', 'email', 'password');
	protected $hidden = array('password', 'remember_token');

	public function patients()
	{
		return $this->hasMany('Patient');
	}

}