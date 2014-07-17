<?php
class VideoMessage extends Eloquent{

	protected $table = 'video_message';

	public function getMessage(){
		return $this->hasMany("VideoMessage","user_id","id");
	}

}