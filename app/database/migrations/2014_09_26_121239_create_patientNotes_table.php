<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientNotesTable extends Migration {

	public function up()
	{
		Schema::create('patientNotes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('note');
			$table->integer('condition_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('patientNotes');
	}
}