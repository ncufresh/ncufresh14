<?php

class GameSnakeController extends BaseController 
{

	public function index()
	{
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
		return Response::json(array('power'=>$user->power, 'score'=>$user->gp));
	}
	public function renewValue()
	{
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$score = Input::get('score');
		$mode = Input::get('mode');

		if($user->power > 0)
		{
			$user->gp = $user->gp + $score;
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