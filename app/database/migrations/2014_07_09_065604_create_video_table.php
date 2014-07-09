<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('video', function($table)
    {
        $table->increments('id');
        $table->string('video_name');
        $table->string('video_address');
        $table->integer('video_population');
        $table->timestamps();
    });//影片內容，包含1.id、2.網址、3.名稱(自訂)、4.觀看次數、還有5.時間，共五個

    Schema::create('video_like',function($table)
    {
    	$table->increments('id');
    	$table->integer('user_id')->unsigned();
    	$table->boolean('video_rate');
        $table->timestamps();
    });//使用者對影片的評價(喜歡或超喜歡)

    Schema::create('video_message',function($table)
    {
    	$table->increments('id');
    	$table->integer('user_id')->unsigned();
    	$table->text('video_text');
        $table->timestamps();
    });//使用者留言
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('video');
    Schema::drop('video_like');
    Schema::drop('video_message');
	}

}
