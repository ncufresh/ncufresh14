<?php

class GamePowerController extends BaseController 
{
	public function index() 
	{
		App::make('TransferData')->addData('day-quest-url', route('game.power.getDayQuest'));
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
		return View::make('game.power', array('user' => $user, 'name' => $name));
	}

	public function getDayQuest() 
	{
		$day = \Carbon\Carbon::now() -> dayOfWeek;
		$dayQuest = GamePower::where('day', '=', $day)->get();
		return Response::json($dayQuest);
	}

}
