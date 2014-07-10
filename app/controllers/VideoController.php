<?php


class VideoController extends BaseController {

	public function index(){
		$data = message::all();
		return View::make('video.sites', array('messages' => $data));
	}

	public function post_index(){
		//if(Auth::check()){
		$user = Auth::user();
		$user = new message;
		$user->user_id = '0';

		$user->video_text = Input::get('video_text');

		$user->save();
		/*message::create(array(
		'user_id' => '0',//$user["id"],
		'video_text' => 
		));*/
		return Redirect::to('video');
		
		//}
		//else{}
	}

}
