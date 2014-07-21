<?php
class Message extends Eloquent{

	protected $table = 'video_message';

	public function user(){
		return $this->hasOne('User', 'id', 'user_id');
	}
}
