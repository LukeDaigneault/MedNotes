<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistorysTable extends Migration {

	public function up()
	{
		Schema::create('historys', function(Blueprint $table) {
			$table->increments('id');
			$table->string('social');
			$table->string('drug');
			$table->string('conditions');
			$table->string('details');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('historys');
	}
}