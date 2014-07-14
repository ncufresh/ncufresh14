<?php

class VideoController extends BaseController {

	public function index(){
		App::make('TransferData')->addData('like_video_url', route('video.rate')); //ajax
		//App::make('TransferData')->addData('about_rate_url', route('video.aboutrate'));
		//App::make('TransferData')->addData('change_intro_url', route('video.intro'));

		$data = Message::paginate(13);

		//$videoID = VideoLike::where('video_id','=','');
		$video=Video::where('id','=','');

		$videoRating1 = Video::find(1)->getRating()->where('video_rate', '=', '0')->count();//find 是找主鍵
		$videoRating2 = Video::find(1)->getRating()->where('video_rate', '=', '1')->count();
		$introduction = Video::find(1)->video_introduction;

		return View::make('video.sites', array('messages' => $data,'getLike' => $videoRating1 , 'getLove' =>$videoRating2 ,'introduction' =>$introduction
			));
	}



	public function AboutRate(){
		$videoRating1 = VideoLike::whereRaw('video_id = ? and video_rate = ?',array( Input::get('video_id'), 0))->count();
		$videoRating2 = VideoLike::whereRaw('video_id = ? and video_rate = ?',array( Input::get('video_id'), 1))->count();
		$id = Video::whereRaw('id = ?',array(Input::get('video_introduction')));
		return Response::json(array('videoRating1'=>$videoRating1, 'videoRating2'=>$videoRating2 , 'id'=>$id));		
	}
	/*
	public function change_introduction(){
		$introduction = Video::where('id', '=', Input::get('id', '1'))->first(); //	現在要點不同影片就要有不同的intro
		return Response::json($introduction);
	}
	*/

	public function post_index(){
		if(Auth::check()){
			$user = Auth::user();
			$user = new message;
			$user->user_id = '0';
			$user->video_text = Input::get('video_text');
			$user->save();
			return Redirect::to('video');	
		}else{		
			return Redirect::to('video') -> withErrors(['請先登入！']);
		}
	}

	public function post_like(){
		$user = Auth::user();
		if(isset($user)){
			if(Video::find(Input::get('video_id'))->getRating()->where('user_id', '=', $user)->count() == 0)
			{
				$like = new VideoLike;
				$like->user_id = $user; 
				$like->video_rate = Input::get('video_rate');
				$like->video_id = Input::get('video_id');
				$like->save();
			}
			
			$videoRating1 = Video::find(Input::get('video_id'))->getRating()->where('video_rate', '=', '0')->count();
			$videoRating2 = Video::find(Input::get('video_id'))->getRating()->where('video_rate', '=', '1')->count();
			
			$gg['a'] = $videoRating1;
			$gg['b'] = $videoRating2;

			return Response::json($gg);
		}
	}
}
