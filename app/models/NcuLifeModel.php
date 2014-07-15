<?php

class NcuLifeModel extends Eloquent
{
	protected $table = 'nculife';

	public function picture()
    {
        return $this->hasMany('NcuLifePicture', 'place_id', 'id');
    }

    public function local()
    {
    	return $this->hasMany('AdminImage', 'id', 'local_id');
    }
}