<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('content');
			$table->integer('eventid');
			$table->integer('signedby');
			$table->integer('score');
			$table->integer('role');
			$table->boolean('enabled');
			$table->timestamps();

			/*$table->foreign('eventid')->references('id')->on('events')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('signedby')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions');
	}

}
