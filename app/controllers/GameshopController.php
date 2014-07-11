<?php

class GameshopController extends BaseController {
	public function index() {
		$game_user_id = 1;
		$user = Game::find($game_user_id);
		$name = User::where('id', '=', $game_user_id)->firstOrFail();
		$shop = Gameitem::where('type', '=', 0)->get();
		$hadBuyItems = GameBuy::where('id', '=', $game_user_id)->get();
		return View::make('game.shop', array('user' => $user, 'name' => $name, 'shop' => $shop, 'hadBuyItems'=>$hadBuyItems));
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
}
