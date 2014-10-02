<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('firstName', 20);
			$table->string('lastName', 20);
			$table->string('address', 200);
			$table->string('homePhone', 20)->nullable();;
			$table->string('mobilePhone', 20)->nullable();;
			$table->string('email', 200)->nullable();;
			$table->date('dob');
			$table->integer('user_id')->unsigned();
			$table->integer('doctor_id')->unsigned()->nullable();
			$table->integer('history_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('patients');
	}
}