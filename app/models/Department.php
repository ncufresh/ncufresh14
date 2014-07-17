<?php

class Department extends Eloquent{

	protected $table = 'departments';

	protected $fillable = array('system_id', 'department_name');

}