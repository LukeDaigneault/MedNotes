<?php

class UserController extends \BaseController {
	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	/**
	 * Show the login form
	 */
	public function showLogin()
	{

		if (Auth::check()) return Redirect::to('/');
		return View::make('user.loginForm');
	}
	
	/**
	 * Show the login form
	 */
	public function showRegistration()
	{
		return View::make('user.registrationForm');
	}
	
	public function handleRegistration()
	{
	if( ! $this->user->isValid(Input::all()))
		{
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}
		
		$confirmation_code = str_random(30);
		
		$user = new User;
							
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->confirmation_code = $confirmation_code;	
  		$user->save();
		
		$data = [
            'confirmation_code'=>$confirmation_code
        ];
        Mail::send('emails.verify', $data, function($message) {
            $message->to(Input::get('email'))->subject('MedNotes Account Activation');
        });

		return Redirect::to('login');
	}
	
	public function verifyEmail($confirmationCode)
	{
	if( ! $confirmationCode)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = $this->user->whereConfirmationCode($confirmationCode)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        return Redirect::route('login');
    
		
	}
	

	/**
	 * Attempt to authenticate the user
	 *
	 * @return Response
	 */
	public function authenticateUser()
	{
				
		if ( ! Auth::validate(Input::only('email', 'password')))
		{
			return Redirect::back()
			->withInput()
			->withErrors([
				'credentials' => 'We were unable to sign you in.'
			]);
		}

		$user = $this->user->whereEmail(Input::get('email'))->first();
		if( ! $user->confirmed )
		{
			return Redirect::back()
			->withInput()
			->withErrors([
				'credentials' => 'You still need to confirm your email address.'
			]);
		}

		Auth::login($user);
		
		Redirect::to('index');
					
	}



	/**
	 * Logout the user
	 */
	public function logoutUser()
	{
		Auth::logout();
		return Redirect::to('login');
	}


}
