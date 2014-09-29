<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctorsTable extends Migration {

	public function up()
	{
		Schema::create('doctors', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 50)->unique();
			$table->string('phoneNumber', 20);
			$table->string('address', 200);
		});
	}

	public function down()
	{
		Schema::drop('doctors');
	}
}