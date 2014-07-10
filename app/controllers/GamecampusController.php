<?php

class GamecampusController extends BaseController {
	public function index() {
		$user = Game::find(1);
		$name = User::where('id', '=', 1)->firstOrFail();
		return View::make('game.campus', array('user' => $user, 'name' => $name));
	}

	public function start() {
		$user = Game::find(1);
		$name = User::where('id', '=', 1)->firstOrFail();
		if ( $user->power > 0 ) {
			$user->power = $user->power;// - 1;
			$user->save();
			//$user["play"] = true;
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
			}
			return Response::json(array('user' => $user->toArray(), 'question0' => $data[0]->toArray(), 
									'question1' => $data[1]->toArray(), 'question2' => $data[2]->toArray(),
									'question3' => $data[3]->toArray(), 'question4' => $data[4]->toArray(),
									'question5' => $data[5]->toArray(), 'question6' => $data[6]->toArray(),
									'question7' => $data[7]->toArray(), 'question8' => $data[8]->toArray(),
									'question9' => $data[9]->toArray() ));
		}
		$user["play"] = false;
		return Response::json(array('user' => $user, 'data' => $data));
	}

}
