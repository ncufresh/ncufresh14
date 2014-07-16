<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('aboutus', function($table)
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
		Schema::table('aboutus', function($table)
	{
	    $table->renameColumn('introduction', 'introductoin');
	});
	}

}
