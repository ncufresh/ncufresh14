<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncreaseNculife2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nculife', function($table)
		{
        	$table->integer('top');
        	$table->integer('left');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nculife', function($table)
		{
			$table->dropColumn('top');
			$table->dropColumn('left');
		});
	}

}
