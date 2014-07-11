<?php
class ForumComment extends Eloquent{
	public $table = 'forum_comments';
	public $per_page = 5;
	public static $unguarded = true;
} 
?>
