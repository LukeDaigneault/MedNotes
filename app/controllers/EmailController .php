<?php

class EmailController extends \BaseController {


	/**
	 * Show the login form
	 */
	public function sendTest()
	{
	$data = [
            'title'=>'Email'
        ];
        Mail::send('emails.auth.reminder', $data, function($message) {
            $message->to('luke.daigneault@gmail.com')->subject('we made it');
        });
        return Redirect::to('/');
    }

}
