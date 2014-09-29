<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();

		// testuser
		User::create(array(
				'username' => 'bob',
				'email' => 'bob@builder.com',
				'password' => Hash::make('password')
			));
	}
}