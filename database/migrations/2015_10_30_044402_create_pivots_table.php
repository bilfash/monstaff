<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivots', function(Blueprint $table)
		{
			$table->increments('id');
      $table->integer('eventid')->nullable();
      $table->integer('questionid')->nullable();
      $table->integer('score')->nullable();
			$table->softDeletes();
            $table->nullableTimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pivots');
	}

}
