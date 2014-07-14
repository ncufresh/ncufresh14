<?php

class GamePowerController extends BaseController {
	public function index() {
		$game_user_id = 1;
		$user = Game::find($game_user_id);
		$name = User::where('id', '=', $game_user_id)->firstOrFail();
		return View::make('game.power', array('user' => $user, 'name' => $name));
	}

}
