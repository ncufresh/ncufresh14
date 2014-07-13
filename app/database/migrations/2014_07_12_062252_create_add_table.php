<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('schoolguide', function($table)
		{
		    $table->dropColumn('introduction');
		    $table->string('categoryName');
		});

		Schema::table('schoolguide', function($table)
		{
		    $table->text('introduction');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('schoolguide', function($table){
			$table->dropColumn('introduction');
			$table->dropColumn('categoryName');
		});

		Schema::table('schoolguide', function($table){
			$table->string('introduction');
		});
	}

}
