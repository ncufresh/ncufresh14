<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameDestinyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game_destiny', function($table)
		{
			$table->increments('id');
			$table->string('name', 10);
			$table->double('type', 15, 8);
			$table->integer('gp');
			$table->integer('item');
			$table->integer('power');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('game_destiny');
	}

}
