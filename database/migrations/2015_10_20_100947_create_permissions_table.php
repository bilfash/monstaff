<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('menuid')->nullable();
			$table->integer('departmentid')->nullable();
			$table->softDeletes();
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
		Schema::drop('permissions');
	}

}
