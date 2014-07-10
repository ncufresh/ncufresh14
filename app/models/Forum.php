<?php

class Forum extends Eloquent{
	public $table = 'forum_articles';
	public $per_page = 5;
	public static $unguarded = true;
}

?>
