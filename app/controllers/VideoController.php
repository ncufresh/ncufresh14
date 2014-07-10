<?php


class VideoController extends BaseController {

	public function index(){
		App::make('TransferData')->addData('like_video_url', route('video.rate'));
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

	public function post_like(){
		//if(Auth::check()){
		$user = Auth::user();
		$like = new VideoLike;
		$like->user_id = '0'; //TODO

		$like->video_rate = Input::get('video_rate');
			//Input::get('video_id');
		$like->save();
		/*message::create(array(
		'user_id' => '0',//$user["id"],
		'video_text' => 
		));*/
		return Response::json($like);
		
		//}
		//else{}
	}
}
