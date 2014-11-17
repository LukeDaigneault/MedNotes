<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	public $timestamps = true;
	public $errors;
	
	protected $guarded = array('id');
	
	public static $rules =[
	 'username' => 'required|min:6',
	 'email' => 'required|email|unique:users,email,:id,',
     'password' => 'required|confirmed|min:6'
	];	

	public function patients()
	{
		return $this->hasMany('Patient');
	}
	
	public function isValid($data, $id = 0)
	{
	
	$replace = ($id > 0) ? $id : '';
	
	foreach (static::$rules as $key => $rule)
    {
        static::$rules[$key] = str_replace(':id', $id, $rule);
    }

    $validation = Validator::make($data, static::$rules);
		
		
		if ($validation->passes()) return true;
		
		$this->errors = $validation->messages();
		
		return false;
		
	}

}