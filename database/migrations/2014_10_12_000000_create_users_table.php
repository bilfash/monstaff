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
			$table->string('name');
			$table->string('username');
			$table->string('password', 60);
			$table->tinyInteger('deptid');
			$table->tinyInteger('positionid');
			$table->integer('photo');
			$table->timestamps();

/*			$table->foreign('deptid')->references('id')->on('departments')->onUpdate('cascade')->onDelete('set null');
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
