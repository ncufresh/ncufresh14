<?php

class VideoLike extends Eloquent{

	protected $table = 'video_like';
	

		public function getLike(){
			return $this->hasMany("VideoLike","0","video_rate");
		}
		public function getLove(){
			return $this->hasMany("VideoLike","1","video_rate");
		}
}