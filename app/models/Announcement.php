<?php
/**
 * User: green
 * Date: 2014/6/3
 * Time: 23:18
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property integer $viewer
 * @property boolean $pinned
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read \User $user
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