<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facebook_data', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();	//user's inner id
			$table->biginteger('uid')->unsigned();	//facebook's uid
			$table->string('access_token')->nullable();
			$table->string('access_token_secret')->nullable();
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
		Schema::drop('facebook_data');
	}

}
