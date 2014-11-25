<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientNotesTable extends Migration {

	public function up()
	{
		Schema::create('patientnotes', function(Blueprint $table) {
			$table->increments('id');
			$table->text('note');
			$table->integer('complaint_id')->unsigned()->index();
			$table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('patientnotes');
	}
}