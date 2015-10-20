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

		Schema::create('departments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->boolean('enabled');
			$table->integer('photo');
			$table->timestamps();
		});

		Schema::create('positions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->boolean('enabled');
			$table->timestamps();
		});


		Schema::create('menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('url');
			$table->timestamps();
		});

		Schema::create('permissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('menuid');
			$table->integer('positionid');
			$table->timestamps();
			/*$table->foreign('menuid')->references('id')->on('menus')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('positionid')->references('id')->on('positions')->onUpdate('cascade')->onDelete('cascade');*/
		});

// UNTUK EVENTS LALALALA

		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->dateTime('start');
			$table->dateTime('end');
			$table->integer('signedby');
			$table->boolean('enabled');
			$table->timestamps();

			/*$table->foreign('signedby')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');*/
		});

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

		Schema::create('scores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('eventid');
			$table->integer('score');
			$table->integer('userid');
			$table->timestamps();

			/*$table->foreign('eventid')->references('id')->on('events')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('userid')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');*/
		});

		Schema::create('feedbacks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('userid');
			$table->string('content');
			$table->integer('eventid');
			$table->timestamps();

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
		Schema::drop('feedbacks');
		Schema::drop('marks');
		Schema::drop('scores');
		Schema::drop('questions');
		Schema::drop('events');
		Schema::drop('users');
		Schema::drop('departments');
		Schema::drop('permissions');
		Schema::drop('menus');
		Schema::drop('positions');
	}

}
