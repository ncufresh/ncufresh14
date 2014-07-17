<?php

class NcuLifePicture extends Eloquent
{
	protected $table = 'nculife_picture';

	public function pictureAdmin()
    {
        return $this->hasOne('AdminImage', 'id', 'picture_id');
    }
}