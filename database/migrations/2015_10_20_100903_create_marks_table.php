<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('userid');
			$table->integer('questionid');
			$table->string('string');
			$table->timestamps();

			/*$table->foreign('questionid')->references('id')->on('questions')->onUpdate('cascade')->onDelete('set null');
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
		Schema::drop('marks');
	}

}
