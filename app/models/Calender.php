<?php


class Calender extends Eloquent{

	protected $table = 'calenders';

	public function scopeActive($query){
		return $query->where('start_at', '<=', \Carbon\Carbon::now())->where('end_at', '>=', \Carbon\Carbon::now());
	}
}