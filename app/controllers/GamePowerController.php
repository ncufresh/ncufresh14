<?php

class GamePowerController extends BaseController 
{
	public function index() 
	{
		App::make('SiteMap')->pushLocation('小遊戲', route('game'));
		App::make('SiteMap')->pushLocation('電池補給站', route('game.power'));
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
		$dayQuest = GamePower::orderByRaw("RAND()")->take(10)->get();
		return Response::json(array('questions' => $dayQuest->toArray(), 'token' => csrf_token()));
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
		$total = $user->power + $power;
		if($total>=0 && $total<=$user->max_power)
			$user->power = $total;
		$user->save();
	}
}

?>