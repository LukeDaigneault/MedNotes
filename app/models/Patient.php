<?php

class Patient extends Eloquent {

	protected $table = 'patients';
	public $timestamps = true;
	public $errors;
	
	protected $guarded = array('id');
	
	public static $rules =[
	'firstName' => 'required|alpha_num_spaces',
	'lastName' => 'required|alpha_num_spaces',
	'address' => 'alpha_num_spaces',
	'homePhone' => 'numeric|required_without:mobilePhone',
	'mobilePhone' => 'numeric|required_without:homePhone',
	'email' => 'required|email|unique:patients,email,:id,',
	'dob' => 'required|date_format:d/m/Y'
	];	
	

	public function scopeOfUser($query, $user_id)
	{
    return $query->where('user_id', '=', $user_id);
	}

	public function doctor()
	{
		return $this->belongsTo('Doctor');
	}

	public function complaints()
	{
		return $this->hasMany('Complaint');
	}

	public function history()
	{
		return $this->belongsTo('History');
	}
	
	public function user()
	{
		return $this->hasOne('User');
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