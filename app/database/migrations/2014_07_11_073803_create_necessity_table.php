<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNecessityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('necessarily_research',function($table){
			$table->timestamps();
		});

		Schema::table('necessarily_freshman',function($table){
			$table->timestamps();
		});

		Schema::table('necessarily_download',function($table){
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
		Schema::table('necessarily_research',function($table){
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
		});

		Schema::table('necessarily_freshman',function($table){
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
		});

		Schema::table('necessarily_download',function($table){
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');
		});
	}

		
}
