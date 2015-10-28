<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->dateTime('start')->nullable();
			$table->dateTime('end')->nullable();
			$table->boolean('enabled')->nullable();
			$table->softDeletes();
            $table->nullableTimestamps();

			/*$table->foreign('signedby')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
