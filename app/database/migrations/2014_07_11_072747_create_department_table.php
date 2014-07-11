<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departments', function($table){
			$table->increments('id');
			$table->integer('system_id');
			$table->string('department_name', 15);
			$table->timestamps();
		});

		Schema::table('users', function($table){
			$table->integer('department_id')->unsigned()->after('nick_name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('departments');

		Schema::table('users', function($table){
			$table->dropColumn('department_id');
		});
	}

}
