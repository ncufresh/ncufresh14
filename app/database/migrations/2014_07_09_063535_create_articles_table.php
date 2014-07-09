<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forum_articles',function($table){
			$table->increment('id');
			$table->string('title');
			$table->integer('author_id')->unsigned();
			$table->string('article_type');
			$table->text('content');
			$table->timestamps();
		});
		Schema::create('forum_comments',function($table){
			$table->increment('id');
			$table->integer('article_id');
			$table->integer('author_id')->unsigned();
			$table->text('content');
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
		Schema::drop('forum_articles');
		Schema::drop('forum_comments');
	}

}
