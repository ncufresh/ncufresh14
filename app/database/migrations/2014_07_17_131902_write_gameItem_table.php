<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WriteGameItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Gameitem::truncate();

		Gameitem::create(array('type' => '0', 'costgp' => '1', 'picture' => 'head/1.png', 'name' => '',
			'face_middle_x' => '144', 'face_middle_y' => '164'));
		Gameitem::create(array('type' => '0', 'costgp' => '2', 'picture' => 'head/2.png', 'name' => '',
			'face_middle_x' => '159', 'face_middle_y' => '159'));
		Gameitem::create(array('type' => '0', 'costgp' => '3', 'picture' => 'head/3.png', 'name' => '',
			'face_middle_x' => '144', 'face_middle_y' => '192'));
		Gameitem::create(array('type' => '0', 'costgp' => '4', 'picture' => 'head/4.png', 'name' => '',
			'face_middle_x' => '144', 'face_middle_y' => '155'));
		Gameitem::create(array('type' => '0', 'costgp' => '5', 'picture' => 'head/5.png', 'name' => '',
			'face_middle_x' => '142', 'face_middle_y' => '173'));
		Gameitem::create(array('type' => '0', 'costgp' => '6', 'picture' => 'head/6.png', 'name' => '',
			'face_middle_x' => '142', 'face_middle_y' => '164'));

		Gameitem::create(array('type' => '1', 'costgp' => '1', 'picture' => 'face/1.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '1', 'costgp' => '2', 'picture' => 'face/2.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '1', 'costgp' => '3', 'picture' => 'face/3.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '1', 'costgp' => '4', 'picture' => 'face/4.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '1', 'costgp' => '5', 'picture' => 'face/5.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '1', 'costgp' => '6', 'picture' => 'face/6.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));

		Gameitem::create(array('type' => '2', 'costgp' => '1', 'picture' => 'body/1.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '2', 'costgp' => '2', 'picture' => 'body/2.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '2', 'costgp' => '3', 'picture' => 'body/3.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '2', 'costgp' => '4', 'picture' => 'body/4.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '2', 'costgp' => '5', 'picture' => 'body/5.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '2', 'costgp' => '6', 'picture' => 'body/6.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));

		Gameitem::create(array('type' => '3', 'costgp' => '1', 'picture' => 'foot/1.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '3', 'costgp' => '2', 'picture' => 'foot/2.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '3', 'costgp' => '3', 'picture' => 'foot/3.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '3', 'costgp' => '4', 'picture' => 'foot/4.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '3', 'costgp' => '5', 'picture' => 'foot/5.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '3', 'costgp' => '6', 'picture' => 'foot/6.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));

		Gameitem::create(array('type' => '4', 'costgp' => '1', 'picture' => 'item/1.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '4', 'costgp' => '2', 'picture' => 'item/2.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '4', 'costgp' => '3', 'picture' => 'item/3.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '4', 'costgp' => '4', 'picture' => 'item/4.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '4', 'costgp' => '5', 'picture' => 'item/5.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '4', 'costgp' => '6', 'picture' => 'item/6.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));

		Gameitem::create(array('type' => '5', 'costgp' => '1', 'picture' => 'map/1.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '5', 'costgp' => '2', 'picture' => 'map/2.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '5', 'costgp' => '3', 'picture' => 'map/3.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '5', 'costgp' => '4', 'picture' => 'map/4.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '5', 'costgp' => '5', 'picture' => 'map/5.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
		Gameitem::create(array('type' => '5', 'costgp' => '6', 'picture' => 'map/6.png', 'name' => '', 'face_middle_x' => '0', 'face_middle_y' => '0'));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Gameitem::truncate();
	}

}
