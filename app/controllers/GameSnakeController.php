<?php

class GameSnakeController extends BaseController 
{

	public function index()
	{
		$user = Game::find(1);
		if ( !$user ) {
			$user = new Game;
			$user->power = 5;
			$user->gp = 0;
			$name = new User;
			$name->nick_name = "訪客";
		}
		else {
			$name = User::where('id', '=', 1)->firstOrFail();	
		}	
		return View::make('game.snake', array('user' => $user, 'name' => $name));
	}


}