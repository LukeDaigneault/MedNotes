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
			$table->boolean('diplopia');
			$table->boolean('dizziness');
			$table->boolean('speechSwallow');
			$table->boolean('blackouts');
			$table->boolean('bilateralNeuroSigns');
			$table->boolean('bladderBowel');
			$table->boolean('saddleAnaesthesia');
			$table->boolean('cancerHistory');
			$table->boolean('weightloss');
			$table->boolean('steroids');
			$table->boolean('anticoagulants');
			$table->boolean('pregnant');
			$table->boolean('pacemaker');
			$table->boolean('diabetes');
			$table->boolean('epilepsy');
			$table->boolean('bloodPressure');
			$table->boolean('heartConditions');
			$table->boolean('osteoporosis');
			$table->boolean('thyroid');
			$table->boolean('arthritis');
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