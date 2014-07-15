<?php

class UserController extends BaseController{

	public function index($id){
		App::make('SiteMap')->pushLocation('個人專區', route('user.id', array('id' => $id)));
		$user = User::find($id);
		$talk = UserTalk::all()->random(1);
		return View::make('user.index', array('user' => $user, 'talk' => $talk));
	}

	public function selfIndex(){
		if(Auth::check()){
			return Redirect::route('user.id', array('id' => Auth::user()->id));
		}
		return Redirect::to('/');
	}
}