<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game_user', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('power');
			$table->integer('max_power');
			$table->integer('gp');
			$table->integer('head')->unsigned();
			$table->integer('face')->unsigned();
			$table->integer('body')->unsigned();
			$table->integer('foot')->unsigned();
			$table->integer('item')->unsigned();
			$table->integer('map')->unsigned();
			$table->timestamps();
		});
		Schema::create('game_item', function($table)
		{
			$table->increments('id');
			$table->integer('type');
			$table->string('name');
			$table->integer('costgp');
			$table->timestamps();
		});
		Schema::create('game_buy', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('item_id')->unsigned();
			$table->timestamps();
		});
		Schema::create('game_powerquest', function($table)
		{
			$table->increments('id');
			$table->string('question');
			$table->string('qA');
			$table->string('qB');
			$table->string('qC');
			$table->string('qD');
			$table->integer('correctans');
			$table->string('answer');
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
		Schema::drop('game_user');
		Schema::drop('game_item');
		Schema::drop('game_buy');
		Schema::drop('game_powerquest');
	}

}
