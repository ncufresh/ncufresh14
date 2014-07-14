<?php

class Video extends Eloquent{

	protected $table = 'video';

	public function getRating(){
		return $this->hasMany("VideoLike","video_id","id");
	}
	public function getIntro(){
		return $this->hasMany("Video","video_introduction","id");
	}
}