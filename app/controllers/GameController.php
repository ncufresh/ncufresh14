<?php

class GameController extends BaseController {
	public function index(){
		App::make('SiteMap')->pushLocation('小遊戲', route('game'));
		if ( !Auth::check() ) {
			return Redirect::to('/');	
		}
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$lastTime = \Carbon\Carbon::createFromTimestampUTC($user->last_login-0);
		if ( $lastTime->isToday() )
		{
			$hadbuy = GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, 25) )->count();
			if ( $hadbuy != 0 ) {	//had buy ATM
				$user->gp += 100;
			}
			$hadbuy = GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, 26) )->count();
			if ( $hadbuy != 0 ) {	//had buy ATM
				$user->power = $user->max_power;
			}
		}
		$user->last_login = \Carbon\Carbon::now();
		$user->save();
		$name = User::where('id', '=', $user["user_id"])->firstOrFail();
		return View::make('game.index', array('user' => $user, 'name' => $name->name));
	}
}
