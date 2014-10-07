<?php

class Doctor extends Eloquent {

	protected $table = 'doctors';
	public $timestamps = true;
	public $errors;

	public static $rules =[
	'name' => 'required|alpha',
	'phoneNumber' => 'numeric',
	'address' => 'alpha_num_spaces',
	];
	
	public function isValid($data)
	{
		$validation = Validator::make($data, static::$rules);
		
		if ($validation->passes()) return true;
		
		$this->errors = $validation->messages();
		
		return false;
		
	}
}