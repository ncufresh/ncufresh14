<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 2014/7/10
 * Time: 16:30
 */

class TransferData{

	private $data = array();

	public function addData($index, $data){
		$this->data[$index] = $data;
	}

	public function getData(){
		return $this->data;
	}
}