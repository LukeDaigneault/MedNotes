<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('patients', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('patients', function(Blueprint $table) {
			$table->foreign('doctor_id')->references('id')->on('doctors')
						->onDelete('set null')
						->onUpdate('cascade');
		});
		Schema::table('patients', function(Blueprint $table) {
			$table->foreign('history_id')->references('id')->on('historys')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('patientNotes', function(Blueprint $table) {
			$table->foreign('condition_id')->references('id')->on('conditions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('conditions', function(Blueprint $table) {
			$table->foreign('patient_id')->references('id')->on('patients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('patients', function(Blueprint $table) {
			$table->dropForeign('patients_user_id_foreign');
		});
		Schema::table('patients', function(Blueprint $table) {
			$table->dropForeign('patients_doctor_id_foreign');
		});
		Schema::table('patients', function(Blueprint $table) {
			$table->dropForeign('patients_history_id_foreign');
		});
		Schema::table('patientNotes', function(Blueprint $table) {
			$table->dropForeign('patientNotes_condition_id_foreign');
		});
		Schema::table('conditions', function(Blueprint $table) {
			$table->dropForeign('conditions_patient_id_foreign');
		});
	}
}