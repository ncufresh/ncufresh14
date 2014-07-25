<?php

class GameshopController extends BaseController {
	public function index() {
		App::make('SiteMap')->pushLocation('小遊戲', route('game'));
		App::make('SiteMap')->pushLocation('商店系統', route('game.shop'));
		if ( !Auth::check() ) {
			return Redirect::to('/');	
		}
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$name = User::where('id', '=', $user["user_id"])->firstOrFail();
		$shop = Gameitem::where('type', '=', 0)->get();
		$hadBuyItems = GameBuy::where('user_id', '=', $user->id)->get();
		$EquipItem[0] = Gameitem::where('id', '=', $user->head)->firstOrFail();
		$EquipItem[1] = Gameitem::where('id', '=', $user->face)->firstOrFail();
		$EquipItem[2] = Gameitem::where('id', '=', $user->body)->firstOrFail();
		$EquipItem[3] = Gameitem::where('id', '=', $user->foot)->firstOrFail();
		if ( $user->item != 0 ) {
			$EquipItem[4] = Gameitem::where('id', '=', $user->item)->firstOrFail();
		}
		else {
			$EquipItem[4] = new Gameitem;
			$EquipItem[4]->id = 0;
		}
		if ( $user->map != 0 ) {
			$EquipItem[5] = Gameitem::where('id', '=', $user->map)->firstOrFail();
		}
		else {
			$EquipItem[5] = new Gameitem;
			$EquipItem[5]->id = 0;
		}
		//$this->createPersonImage();

		return View::make('game.shop', array('user' => $user, 'name' => $name->name, 'shop' => $shop,
						 'hadBuyItems'=>$hadBuyItems->toArray(), 'EquipItem' => $EquipItem));
	}

	public function changeType() {
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$game_user_id = $user->id;
		$type = Input::get("type");
		$shop = Gameitem::where('type', '=', $type)->get();
		$hadBuy[0] = false;
		for ( $i = 0; $i < $shop->count(); $i++ ) {
			$hadBuy[$i] = false;
			if ( GameBuy::whereRaw('user_id = ? and item_id = ?', array($game_user_id, $shop[$i]->id) )->count() != 0 ) {
				$hadBuy[$i] = true;
			}
		}
		return Response::json(array('shop'=>$shop->toArray(),'hadBuyItems'=>$hadBuy));
	}

	public function buy() {
		$gameuser = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$item = Gameitem::where('id', '=', Input::get("itemId"))->firstOrFail();
		$hadbuy = GameBuy::whereRaw('user_id = ? and item_id = ?', array($gameuser->id, Input::get("itemId")) )->count();
		$isBuy = false;
		if ( $gameuser->gp >= $item->costgp && $hadbuy == 0 ) {
			$buy = new GameBuy;
			$buy->user_id = $gameuser->id;
		    $buy->item_id = $item->id;
			$buy->save();
			$gameuser->gp = $gameuser->gp - $item->costgp;
			$gameuser->save();
			$isBuy = true;
		}
		$data = array('isBuy'=>$isBuy, 'user'=>$gameuser->toArray());
		return Response::json($data);
	}

	public function equip() {
		$userWant = Input::get('user_want');
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$game_user_id = $user->id;
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
		$this->createPersonImage();
		$data = array('user'=>$gameUser->toArray(), 'isBuy'=>$isBuy);
		return Response::json($data);
	}

	public function createPersonImage() {
		$user = Game::where('user_id', '=', Auth::user()['id'])->firstOrFail();
		$EquipItem[0] = Gameitem::where('id', '=', $user->head)->firstOrFail();
		$EquipItem[1] = Gameitem::where('id', '=', $user->face)->firstOrFail();
		$EquipItem[2] = Gameitem::where('id', '=', $user->body)->firstOrFail();
		$EquipItem[3] = Gameitem::where('id', '=', $user->foot)->firstOrFail();
		if ( $user->item != 0) {
			$EquipItem[4] = Gameitem::where('id', '=', $user->item)->firstOrFail();
		}
		if ( $user->map != 0) {
			$EquipItem[5] = Gameitem::where('id', '=', $user->map)->firstOrFail();
		}

		$im    = imagecreatetruecolor(510,600);//创建一的真彩色图像
		$white = imagecolorallocatealpha($im, 255, 255, 255,127);//透明背景
		imagefill ($im, 0, 0, $white);
		$bg = imagecolorallocate($im, 255, 255, 255);//为一幅图像分配颜色
		ImageColorTransparent ($im,$bg);

		$headImage = imagecreatefrompng(asset('images/gameShop/' . $EquipItem[0]->picture));
		imagecopy( $im, $headImage, 114, 0, 0, 0, 289, 289);
		$faceImage = imagecreatefrompng(asset('images/gameShop/' . $EquipItem[1]->picture));
		imagecopy( $im, $faceImage, 37 + $EquipItem[0]->face_middle_x, $EquipItem[0]->face_middle_y - 70, 0, 0, 156, 137);
		$bodyImage = imagecreatefrompng(asset('images/gameShop/' . $EquipItem[2]->picture));
		imagecopy( $im, $bodyImage, 32, 270, 0, 0, 459, 303);
		$footImage = imagecreatefrompng(asset('images/gameShop/' . $EquipItem[3]->picture));
		imagecopy( $im, $footImage, 158, 518, 0, 0, 215, 102);
		if ( $user->item != 0) {
			$itemImage = imagecreatefrompng(asset('images/gameShop/' . $EquipItem[4]->picture));
			imagecopy($im,$itemImage,114,0,0,0,136,193);
		}
		if ( $user->map != 0) {
			$mapImage = imagecreatefrompng(asset('images/gameShop/' . $EquipItem[5]->picture));
			imagecopy($im,$mapImage,114,0,0,0,156,137);
		}
		imagepng($im, 'img/person/' . Auth::user()['id'] . '.png');
		imagedestroy($im);
		imagedestroy($headImage);
		imagedestroy($faceImage);
		imagedestroy($bodyImage);
		imagedestroy($footImage);
	}
}
