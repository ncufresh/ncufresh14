<?php
class VideoMessage extends Eloquent{

	protected $table = 'video_message';

	public function getMessage(){
		return $this->hasMany("VideoMessage","user_id","id");
	}

	public function user(){
		return $this->hasOne('User', 'id', 'user_id');
	}

}