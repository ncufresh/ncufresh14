<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NculifePicture extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nculife_picture', function($table)
	    {
			$table->increments('id');
        	$table->integer('place_id')->unsigned();
        	$table->integer('picture_id')->unsigned();
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
		Schema::drop('nculife_picture');
	}
}
