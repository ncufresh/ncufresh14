<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGameSnakeColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('game_snake',function($table)
		{
			$table->integer('difficult');
			$table->integer('mode');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('game_snake',function($table)
		{
			$table->dropColumn('difficult');
			$table->dropColumn('mode');
		});
	}

}
