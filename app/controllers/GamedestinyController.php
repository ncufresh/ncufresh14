<?php

class GamedestinyController extends BaseController {
	public function index(){
		App::make('SiteMap')->pushLocation('小遊戲', route('game'));
		App::make('SiteMap')->pushLocation('命運之輪', route('game.destiny'));
		if ( !Auth::check() ) {
			return Redirect::to('/');	
		}
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$name = User::where('id', '=', $user["user_id"])->firstOrFail();
		return View::make('game.destiny', array('user' => $user, 'name' => $name->name));
	}

	public function start(){
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$giftType = 0;
		if ( $user->power > 0 ) {
			$user->power = $user->power - 1;
			$user->save();
			$giftType = $this->getGift($user);
			$user["play"] = true;
			$randomGp = 0;	//?
			if ( $giftType == 11 ) {
				$randomGp = rand(250, 2500);
				$user->gp += $randomGp;
				$user->save();
			}
			return Response::json(array('user' => $user->toArray(), 'gift' => $giftType, 'randomGp' => $randomGp));
		}
		$user["play"] = false;
		return Response::json(array('user' => $user->toArray()));
	}

	private function getGift($user)
	{
		$rand = rand(0, 100);
		$probaility = [10, 10, 10, 10, 12.5, 12.5, 5, 2, 2, 2, 2, 5, 5, 2, 5, 5];
		$giftsType = [13, 14, 15, 16, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
		$probCount = $probaility[0];
		$index = 0;
		while ( $rand >= $probCount ) {
			$index++;
			$probCount += $probaility[$index];
		}
//		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		switch ( $index + 1 ) {
			case 1:
				$user->gp += 500;
				$user->save();
				break;
			case 2:
				$user->gp += 500;
				$user->save();
				break;
			case 3:
				$user->gp += 1000;
				$user->save();
				break;
			case 4:
				$user->gp += 2500;
				$user->save();
				break;
			case 5:
				//equip
				/*do {
					$shop = Gameitem::where('type', '=', rand(0, 4))->get();
					$getIndex = rand(0, $shop->count());
				} while ( GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, $shop[$getIndex]->id) )->count() == 0 )
				$buy = new GameBuy;
				$buy->user_id = $user->id;
			    $buy->item_id = $shop[$getIndex]->id;
				$buy->save();*/
				$shop = Gameitem::where('type', '=', rand(0, 4))->get();
				$getIndex = rand(0, $shop->count());
				if ( GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, $shop[$getIndex]->id) )->count() == 0 ) {
					$buy = new GameBuy;
					$buy->user_id = $user->id;
				    $buy->item_id = $shop[$getIndex]->id;
					$buy->save();
				}
				else {
					$user->gp +=  $shop[$getIndex]->costgp;
					$user->save();
				}
				break;
			case 6:
				//equip
				$shop = Gameitem::where('type', '=', rand(0, 4))->get();
				$getIndex = rand(0, $shop->count());
				if ( GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, $shop[$getIndex]->id) )->count() == 0 ) {
					$buy = new GameBuy;
					$buy->user_id = $user->id;
				    $buy->item_id = $shop[$getIndex]->id;
					$buy->save();
				}
				else {
					$user->gp +=  $shop[$getIndex]->costgp;
					$user->save();
				}
				break;
			case 7:
				//equip
				$shop = Gameitem::where('type', '=', rand(0, 4))->get();
				$getIndex = rand(0, $shop->count());
				if ( GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, $shop[$getIndex]->id) )->count() == 0 ) {
					$buy = new GameBuy;
					$buy->user_id = $user->id;
				    $buy->item_id = $shop[$getIndex]->id;
					$buy->save();
				}
				else {
					$user->gp +=  $shop[$getIndex]->costgp;
					$user->save();
				}
				break;
			case 8:
				//map
				/*do {
					$shop = Gameitem::where('type', '=', 5)->get();
					$getIndex = rand(0, $shop->count());
				} while ( GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, $shop[$getIndex]->id) )->count() == 0 )
				$buy = new GameBuy;
				$buy->user_id = $user->id;
			    $buy->item_id = $shop[$getIndex]->id;
				$buy->save();*/
				$shop = Gameitem::where('type', '=', 5)->get();
				$getIndex = rand(0, $shop->count());
				if ( GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, $shop[$getIndex]->id) )->count() == 0 ) {
					$buy = new GameBuy;
					$buy->user_id = $user->id;
				    $buy->item_id = $shop[$getIndex]->id;
					$buy->save();
				}
				else {
					$user->gp +=  $shop[$getIndex]->costgp;
					$user->save();
				}
				break;
			case 9:
				//power
				$user->power += 1;
				$user->save();
				break;
			case 10:
				//item
				/*do {
					$shop = Gameitem::where('type', '=', 4)->get();
					$getIndex = rand(0, $shop->count());
				} while ( GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, $shop[$getIndex]->id) )->count() == 0 )
				$buy = new GameBuy;
				$buy->user_id = $user->id;
			    $buy->item_id = $shop[$getIndex]->id;
				$buy->save();*/
				$shop = Gameitem::where('type', '=', 4)->get();
				$getIndex = rand(0, $shop->count());
				if ( GameBuy::whereRaw('user_id = ? and item_id = ?', array($user->id, $shop[$getIndex]->id) )->count() == 0 ) {
					$buy = new GameBuy;
					$buy->user_id = $user->id;
				    $buy->item_id = $shop[$getIndex]->id;
					$buy->save();
				}
				else {
					$user->gp +=  $shop[$getIndex]->costgp;
					$user->save();
				}
				break;
			case 11:
				$user->gp -= 500;
				$user->save();
				break;
			case 12:
				//do nothing here.
				break;
			case 13:
				$user->gp += 250;
				$user->save();
				break;
			case 14:
				$user->gp += 250;
				$user->save();
				break;
			case 15:
				$user->gp += 250;
				$user->save();
				break;
			case 16:
				$user->gp += 250;
				$user->save();
				break;
			default:
				$user->gp += 250;
				$user->save();
				break;
		}
		return $index;
//		return $giftsType[$index + 1];
	}
}
