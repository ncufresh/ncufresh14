<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifiyNuclifeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nculife', function($table){
			$table->dropColumn('introduction');
		});

		Schema::table('nculife', function($table){
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
		Schema::table('nculife', function($table){
			$table->dropColumn('introduction');
		});

		Schema::table('nculife', function($table){
			$table->string('introduction');
		});
	}

}
