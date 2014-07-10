<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNecessarilyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('necessarily_research',function($table){
			$table->increments('id');
			$table->string('item');
			$table->string('explanation');
			$table->string('organizer');
		});

		Schema::create('necessarily_freshman',function($table){
			$table->increments('id');
			$table->string('item');
			$table->string('explanation');
			$table->string('organizer');
		});

		Schema::create('necessarily_download',function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('fileid');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('necessarily_research');
		
		Schema::drop('necessarily_freshman');

		Schema::drop('necessarily_download');
	}

}
