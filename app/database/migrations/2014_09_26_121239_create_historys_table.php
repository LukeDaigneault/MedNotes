<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistorysTable extends Migration {

	public function up()
	{
		Schema::create('historys', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('social');
			$table->string('drug');
			$table->string('conditions');
			$table->string('details');
		});
	}

	public function down()
	{
		Schema::drop('historys');
	}
}