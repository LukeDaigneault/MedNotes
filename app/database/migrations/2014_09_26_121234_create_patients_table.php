<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('firstName', 20);
			$table->string('lastName', 20);
			$table->string('address', 200);
			$table->string('homePhone', 20)->nullable();;
			$table->string('mobilePhone', 20)->nullable();;
			$table->string('email', 200)->nullable();;
			$table->date('dob');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('doctor_id')->unsigned()->nullable();
			$table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null')->onUpdate('cascade');
			$table->integer('history_id')->unsigned()->nullable();
			$table->foreign('history_id')->references('id')->on('historys')->onDelete('set null')->onUpdate('cascade');
			$table->timestamps();
			
		});
	}

	public function down()
	{
		Schema::drop('patients');
	}
}