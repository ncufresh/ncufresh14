<?php

class GameSnakeController extends BaseController 
{

	public function index()
	{
		App::make('SiteMap')->pushLocation('小遊戲', route('game'));
		App::make('SiteMap')->pushLocation('貪食松鼠', route('game.snake'));
		App::make('TransferData')->addData('renew-value-url', route('game.snake.renewValue'));
		App::make('TransferData')->addData('get-power-url', route('game.snake.getPower'));
		App::make('TransferData')->addData('get-highscore-url', route('game.snake.getHighScore'));
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$name = Auth::user()->name;
		return View::make('game.snake', array('user' => $user, 'name' => $name));
	}
	public function getPower()
	{
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		return Response::json(array('power'=>$user->power, 'score'=>$user->gp, 'token' => csrf_token()));
	}
	public function renewValue()
	{
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$score = Input::get('score');
		$mode = Input::get('mode');

		if($user->power > 0)
		{
			
			$muti = 1;
			$hadbuy = GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, 29) )->count();
			if ( $hadbuy != 0 ) {	//had buy ATM
				$muti = 1.25;
			}
			$hadbuy = GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, 29) )->count();
			if ( $hadbuy != 0 ) {	//had buy ATM
				$muti = 1.5;
			}

			$user->gp = $user->gp + $score * $muti;
			$user->power = $user->power - 1;
			$user->save();

			$snake = new GameSnake;
			$snake->user_id = $user->id;
			$snake->mode = $mode;
			$snake->highscore = $score;
			$snake->save();
		}
		// $highscore = GameSnake::modes($mode)->orderBy('highscore', 'DESC')->with('user')->take(10)->get();
	}

	public function getHighScore()
	{
		$mode = Input::get('mode');
		$highscore = GameSnake::modes($mode)->orderBy('highscore', 'DESC')->with('user')->take(30)->get();
		// return Response::json('highscore' => $highscore->toArray());
		return Response::json( $highscore );
	}

}