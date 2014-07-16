<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditNecessarilyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('necessarily_freshman', function($table){
			$table->dropColumn('explanation');
		});

		Schema::table('necessarily_freshman', function($table){
			$table->text('explanation');
		});

		Schema::table('necessarily_research', function($table){
			$table->dropColumn('explanation');
		});

		Schema::table('necessarily_research', function($table){
			$table->text('explanation');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('necessarily_freshman', function($table){
			$table->dropColumn('explanation');
		});

		Schema::table('necessarily_freshman', function($table){
			$table->string('explanation');
		});

		Schema::table('necessarily_research', function($table){
			$table->dropColumn('explanation');
		});

		Schema::table('necessarily_research', function($table){
			$table->string('explanation');
		});
	}

}
