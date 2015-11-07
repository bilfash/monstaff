<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlag extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flag', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('from')->nullable();
			$table->integer('to')->nullable();
			$table->integer('eventid')->nullable();
            $table->nullableTimestamps();
			/*$table->foreign('menuid')->references('id')->on('menus')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('positionid')->references('id')->on('positions')->onUpdate('cascade')->onDelete('cascade');*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('flag');
	}

}
