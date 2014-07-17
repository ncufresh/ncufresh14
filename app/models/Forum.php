<?php

class Forum extends Eloquent{
	public $table = 'forum_articles';
	public $per_page = 5;
	public static $unguarded = true;

	public function comment(){
		return $this->hasMany('ForumComment','article_id','id');
	}

}

?>
