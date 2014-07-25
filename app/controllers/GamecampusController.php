<?php

class GamecampusController extends BaseController {
	public function index() {
		App::make('SiteMap')->pushLocation('小遊戲', route('game'));
		App::make('SiteMap')->pushLocation('認識中大', route('game.campus'));
		if ( !Auth::check() ) {
			return Redirect::to('/');	
		}
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$name = User::where('id', '=', $user["user_id"])->firstOrFail();
		return View::make('game.campus', array('user' => $user, 'name' => $name->name));
	}

	public function start() {
		Session::forget('score');
		Session::forget('life');
		Session::forget('index');
		Session::forget('questions');
		Session::put('score', 0);
		Session::put('life', 3);
		Session::put('index', 0);
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		if ( $user->power > 0 ) {
			$user->power = $user->power - 1;
			$user->save();
			$user["play"] = true;
			$question_number = GameCampus::all()->count();
			for ( $i = 0; $i < 10; $i++ ) {
				do {
					$isrepeat = false;
					$number = rand(1, $question_number);
					$question = GameCampus::find($number);
					for ( $j = 0; $j < $i; $j++ ) {
						if ( $number == $data[$j]->id && ( $question->type == $data[$j]->type && $question->answer_id == $data[$j]->answer_id) ) {
							$isrepeat = true;
							break;
						}
					}
				} while($isrepeat);
				$data[$i] = $question;
				Session::push('questions', $data[$i]->toArray());
			}
			$data[0]->answer_id = null;
			return Response::json(array('user' => $user->toArray(), 'question' => $data[0]->toArray()));
		}
		$user["play"] = false;
		return Response::json(array('user' => $user->toArray()));
	}

	public function check() {
		$questions = Session::get('questions');
		$questionID = Session::get('index');
		$score = Session::get('score');
		$question = $questions[$questionID+1];
		if ( Input::get('index') == $questions[$questionID]['answer_id']) {
			$score++;
			Session::forget('score');
			Session::put('score', $score);
			Session::forget('index');
			Session::put('index', $questionID + 1);
			$gameUser = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
			$gameUser->gp += $score;
			$gameUser->save();
			return Response::json(array('user' => $gameUser->toArray(), 'isRight' => true, 'score' => $score, 'question' => $question));
		}
		else {
			Session::forget('index');
			Session::put('index', $questionID + 1);
			$gameUser = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
			return Response::json(array('user' => $gameUser->toArray(), 'isRight' => false, 'score' => $score, 'question' => $question));
		}
		$gameUser = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$gameUser->gp += $score;
		$gameUser->save();
		return Response::json(array('user' => $gameUser->toArray(), 'isRight' => false, 'score' => $score, 'question' => $question));
	}

}
