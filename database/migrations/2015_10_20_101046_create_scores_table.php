<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('eventid')->nullable();
			$table->integer('score')->nullable();
			$table->integer('userid')->nullable();
			$table->softDeletes();
            $table->nullableTimestamps();

			/*$table->foreign('eventid')->references('id')->on('events')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('userid')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');*/
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('scores');
	}

}
