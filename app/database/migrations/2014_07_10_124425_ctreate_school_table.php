<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CtreateSchoolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('schoolguide', function($table)
	{
	    $table->renameColumn('introductoin', 'introduction');
	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('schoolguide', function($table)
	{
	    $table->renameColumn('introduction', 'introductoin');
	});
	}

}
