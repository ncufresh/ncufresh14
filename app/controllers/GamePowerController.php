<?php

class GamePowerController extends BaseController {
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
		return View::make('game.power', array('user' => $user, 'name' => $name, 'shop' => $shop,
						 'hadBuyItems'=>$hadBuyItems, 'EquipItem' => $EquipItem));
	}

}
