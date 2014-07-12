<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncreaseNculife extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nculife', function($table)
		{
        	$table->string('picture');
        	$table->string('local');
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
			$table->dropColumn('picture');
			$table->dropColumn('local');
		});
	}

}
