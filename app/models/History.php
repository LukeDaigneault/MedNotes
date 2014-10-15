<?php

class History extends Eloquent {

	protected $table = 'historys';
	public $timestamps = true;
	
	protected $guarded = array('id');
	
	public function scopeOfUser($query, $user_id)
	{
    return $query->where('user_id', '=', $user_id);
	}
}