<?php

class Doctor extends Eloquent {

	protected $table = 'doctors';
	public $timestamps = true;
	public $errors;

	public static $rules =[
	'name' => 'required|alpha|unique:doctors,name,:id',
	'phoneNumber' => 'numeric',
	'address' => 'alpha_num_spaces',
	];
	
	
	
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