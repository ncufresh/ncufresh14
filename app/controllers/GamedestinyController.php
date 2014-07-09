<?php

class GamedestinyController extends BaseController {
	public function index(){
		$user = Game::find(1);
		$name = User::where('id', '=', 1)->firstOrFail();
		return View::make('game.destiny', array('user' => $user, 'name' => $name));
	}
}
