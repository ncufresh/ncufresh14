<?php

class GameSnake extends Eloquent{

	protected $table = 'game_snake';

	public function scopeModes($query, $mode){
		return $query->where('mode', '=', $mode);
	}

	public function user(){
		return $this->hasOne('User', 'id', 'user_id');
	}

}
