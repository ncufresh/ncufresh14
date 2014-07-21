<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddaboutTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('aboutus', function($table)
		{
		    $table->string('categoryName');
		    $table->string('categories');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('aboutus', function($table){
			
			$table->dropColumn('categoryName');
			$table->dropColumn('categories');
		});

	}

}
