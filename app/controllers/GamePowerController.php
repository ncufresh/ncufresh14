<?php

class GamePowerController extends BaseController 
{
	public function index() 
	{
		App::make('TransferData')->addData('day-quest-url', route('game.power.getDayQuest'));
		App::make('TransferData')->addData('recent-power-url', route('game.power.getRecentPower'));
		App::make('TransferData')->addData('renew-value-url', route('game.power.renewValue'));
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$name = Auth::user()->name;
		return View::make('game.power', array('user' => $user, 'name' => $name));
	}

	public function getDayQuest() 
	{
		$day = \Carbon\Carbon::now() -> dayOfWeek;
		$dayQuest = GamePower::where('day', '=', $day)->get();
		return Response::json($dayQuest);
	}

	public function getRecentPower()
	{
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		return Response::json(array('recentPower'=>$user->power, 'maxPower'=>$user->max_power));
	}
	public function renewValue()
	{
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$power = Input::get('power');
		$max = Input::get('max');
		$user->power = $power;
		$user->max_power = $max;
		$user->save();
	} 
}

?>