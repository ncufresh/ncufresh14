<?php

class GameController extends BaseController {
	public function index(){
		$user = Game::find(1);
		$name = User::where('id', '=', 1)->firstOrFail();
		return View::make('game.index', array('user' => $user, 'name' => $name));
	}
}
