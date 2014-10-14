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
			$table->string('details');
			$table->boolean('diabetes');
			$table->boolean('epilepsy');
			$table->boolean('heartDisease');
			$table->boolean('stroke');
			$table->boolean('osteoporosis');
			$table->boolean('jointReplacements');
			$table->boolean('pregnancy');
			$table->boolean('arthritis');
			$table->boolean('diabetes');
			$table->boolean('diabetes');
			$table->boolean('diabetes');
			$table->boolean('diabetes');
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