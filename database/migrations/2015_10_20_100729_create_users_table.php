<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('username')->nullable();
			$table->string('password', 60)->nullable();
			$table->tinyInteger('deptid')->nullable();
			$table->tinyInteger('positionid')->nullable();
			$table->rememberToken();
			$table->softDeletes();
            $table->nullableTimestamps();
/*
			$table->foreign('id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('positionid')->references('id')->on('positions')->onUpdate('cascade')->onDelete('set null');*/

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
