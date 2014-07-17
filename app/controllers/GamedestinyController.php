<?php

class GamedestinyController extends BaseController {
	public function index(){
		if ( !Auth::check() ) {
			return Redirect::to('/');	
		}
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$name = User::where('id', '=', $user["user_id"])->firstOrFail();
		return View::make('game.destiny', array('user' => $user, 'name' => $name));
	}

	public function start(){
		/*if ( Auth::check() ) {
			$user = Auth::user();
			$name = User::where('id', '=', $user["user_id"])->firstOrFail();
			return View::make('game.destiny', array('user' => $user, 'name' => $name));
		}*/
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		if ( $user->power > 0 ) {
			$user->power = $user->power - 1;
			$user->save();
			$user["play"] = true;
			return Response::json($user);
		}
		$user["play"] = false;
		return Response::json($user);
	}
}
