<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('announcements', function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();	//user's inner id
			$table->string('title', 30);
			$table->text('content');
			$table->integer('viewer')->unsigned()->default(0);
			$table->boolean('pinned')->default(0);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('announcements');
	}

}
