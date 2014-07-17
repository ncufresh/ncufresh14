<?php

class GameSnakeController extends BaseController 
{

	public function index()
	{
		App::make('TransferData')->addData('renew-value-url', route('game.snake.renewValue'));
		App::make('TransferData')->addData('get-power-url', route('game.snake.getPower'));
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$name = Auth::user()->name;
		return View::make('game.snake', array('user' => $user, 'name' => $name));
	}
	public function getPower()
	{
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		return Response::json(array('power'=>$user->power));
	}

	public function renewValue()
	{
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$score = Input::get('score');
		$user->gp = $user->gp + $score;
		$user->power = $user->power - 1;
		$user->save();
	} 

}