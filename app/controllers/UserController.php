<?php

class UserController extends BaseController{

	public function index($id){
		App::make('SiteMap')->pushLocation('個人專區', route('user'));
		$user = User::find($id);
		$talk = UserTalk::all()->random(1);
		return View::make('user.index', array('user' => $user, 'talk' => $talk));
	}
}