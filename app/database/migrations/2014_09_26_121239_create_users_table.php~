<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('username', 50);
			$table->string('email')->index();
			$table->string('password');
			$table->remember_token();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}