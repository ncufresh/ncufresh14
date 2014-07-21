<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGameItemColumnOffest extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('game_item', function($table)
	    {
	    	$table->dropColumn('small_picture');
	        $table->integer('face_middle_x');
	        $table->integer('face_middle_y');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('game_item', function($table)
		{
		    $table->string('small_picture');
		    $table->dropColumn('face_middle_x');
		    $table->dropColumn('face_middle_y');
		});
	}

}
