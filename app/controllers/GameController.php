<?php

class GameController extends BaseController {
	public function index(){
		if ( !Auth::check() ) {
			return Redirect::to('/');	
		}
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$name = User::where('id', '=', $user["user_id"])->firstOrFail();
		return View::make('game.index', array('user' => $user, 'name' => $name->name));
	}
}
