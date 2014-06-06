<?php
/**
 * User: green
 * Date: 2014/6/3
 * Time: 23:18
 */


class Announcement extends Eloquent{

	protected $table = 'announcements';

	public function user(){
		return $this->hasOne('User');
	}

	public function addViewer(){
		$this->viewer = $this->viewer + 1;
		$this->save();
	}
}