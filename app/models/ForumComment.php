<?php
class ForumComment extends Eloquent{
	public $table = 'forum_comments';
	public $per_page = 5;
	public static $unguarded = true;

	public function user(){
		return $this->hasOne('User','id','author_id');
	}
} 
