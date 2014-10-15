<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistorysTable extends Migration {

	public function up()
	{
		Schema::create('historys', function(Blueprint $table) {
			$table->increments('id');
			$table->string('social')->nullable();
			$table->string('drug')->nullable();
			$table->string('details')->nullable();
			$table->boolean('diplopia')->default(0);
			$table->boolean('dizziness')->default(0);
			$table->boolean('speechSwallow')->default(0);
			$table->boolean('blackouts')->default(0);
			$table->boolean('bilateralNeuroSigns')->default(0);
			$table->boolean('bladderBowel')->default(0);
			$table->boolean('saddleAnaesthesia')->default(0);
			$table->boolean('cancerHistory')->default(0);
			$table->boolean('weightloss')->default(0);
			$table->boolean('steroids')->default(0);
			$table->boolean('anticoagulants')->default(0);
			$table->boolean('pregnant')->default(0);
			$table->boolean('pacemaker')->default(0);
			$table->boolean('diabetes')->default(0);
			$table->boolean('epilepsy')->default(0);
			$table->boolean('bloodPressure')->default(0);
			$table->boolean('heartConditions')->default(0);
			$table->boolean('osteoporosis')->default(0);
			$table->boolean('thyroid')->default(0);
			$table->boolean('arthritis')->default(0);
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