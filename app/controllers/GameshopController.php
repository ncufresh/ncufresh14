<?php

class GameshopController extends BaseController {
	public function index() {
		$game_user_id = 1;
		$user = Game::find($game_user_id);
		$name = User::where('id', '=', $game_user_id)->firstOrFail();
		$shop = Gameitem::where('type', '=', 0)->get();
		$hadBuyItems = GameBuy::where('id', '=', $game_user_id)->get();
		$EquipItem[0] = Gameitem::where('id', '=', $user->head)->firstOrFail();
		$EquipItem[1] = Gameitem::where('id', '=', $user->face)->firstOrFail();
		$EquipItem[2] = Gameitem::where('id', '=', $user->body)->firstOrFail();
		$EquipItem[3] = Gameitem::where('id', '=', $user->foot)->firstOrFail();
		$EquipItem[4] = Gameitem::where('id', '=', $user->item)->firstOrFail();
		$EquipItem[5] = Gameitem::where('id', '=', $user->map)->firstOrFail();
		return View::make('game.shop', array('user' => $user, 'name' => $name, 'shop' => $shop,
						 'hadBuyItems'=>$hadBuyItems, 'EquipItem' => $EquipItem));
	}

	public function changeType() {
		$type = Input::get("type");
		$shop = Gameitem::where('type', '=', $type)->get();
		return Response::json($shop);
	}

	public function buy() {
		/*if ( Auth::check() ) {
			$user = Auth::user();
		}
		else {
			$user = new Auth;
		}
		$user = Game::where('user_id', '=', $user->id)->firstOrFail();
		if ( !$user ) {

		}*/
		$game_user_id = 1;

		$gameuser = Game::find($game_user_id);
		$item = Gameitem::where('id', '=', Input::get("itemId"))->firstOrFail();
		$isBuy = false;
		if ( $gameuser->gp >= $item->costgp ) {
			$buy = new GameBuy;
			$buy->user_id = $gameuser->id;
		    $buy->item_id = $item->id;
			$buy->save();
			$gameuser->gp = $gameuser->gp - $item->costgp;
			$gameuser->save();
			$isBuy = true;
		}
		$hadBuyItems = GameBuy::where('id', '=', $game_user_id)->get();
		$data = array('isBuy'=>$isBuy, 'user'=>$gameuser->toArray(), 'hadBuyItems'=>$hadBuyItems->toArray());
		return Response::json($data);
	}

	public function equip() {
		$userWant = Input::get('user_want');
		$game_user_id = 1;
		for ( $i = 0; $i < 6; $i++ ) {
			$hadBuyItems = GameBuy::whereRaw('user_id = ? and item_id = ?', array($game_user_id, $userWant[$i]) )->count();
			if ( $hadBuyItems != 0 ) {
				$isBuy[$i] = true;
			}
			else {
				$isBuy[$i] = false;
			}
		}
		$gameUser = Game::find($game_user_id);
		if ( $isBuy[0] ) {
			$gameUser->head = $userWant[0];
		}
		if ( $isBuy[1] ) {
			$gameUser->face = $userWant[1];
		}
		if ( $isBuy[2] ) {
			$gameUser->body = $userWant[2];
		}
		if ( $isBuy[3] ) {
			$gameUser->foot = $userWant[3];
		}
		if ( $isBuy[4] ) {
			$gameUser->item = $userWant[4];
		}
		if ( $isBuy[5] ) {
			$gameUser->map = $userWant[5];
		}
		$gameUser->save();
		$data = array('user'=>$gameUser->toArray(), 'isBuy'=>$isBuy);
		return Response::json($data);
	}
}
