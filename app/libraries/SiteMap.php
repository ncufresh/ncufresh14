<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 2014/7/10
 * Time: 21:44
 */

class SiteMap{

	private $data = array();

	public function pushLocation($name, $url){
		array_push($this->data, array('name' => $name, 'url' => $url));
	}

	public function getData(){
		return $this->data;
	}
}