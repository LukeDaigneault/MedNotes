<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConditionsTable extends Migration {

	public function up()
	{
		Schema::create('conditions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('description');
			$table->integer('patient_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('conditions');
	}
}