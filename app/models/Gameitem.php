<?php

class Gameitem extends Eloquent{

	protected $table = 'game_item';
	protected $fillable =array('type', 'costgp', 'picture', 'name', 'face_middle_x', 'face_middle_y');
}