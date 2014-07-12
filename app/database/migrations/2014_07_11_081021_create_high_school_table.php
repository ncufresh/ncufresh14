<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighSchoolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('high_schools', function($table){
			$table->increments('id');
			$table->string('high_school_name', 15);
			$table->timestamps();
		});

		Schema::table('users', function($table){
			$table->integer('high_school_id')->unsigned()->after('department_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('high_schools');

		Schema::table('users', function($table){
			$table->dropColumn('high_school_id');
		});
	}

}
