<?php
//\Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at));

class VideoController extends BaseController {

	public function index(){
		App::make('TransferData')->addData('like_video_url', route('video.rate')); //ajax
		//App::make('TransferData')->addData('about_rate_url', route('video.aboutrate'))		;
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
		$lines = substr_count( Input::get('video_text'), "\n" );
		get_how_many_messages();

		if ($lines > 7){
			return Redirect::to('video') -> withErrors(['留言行數不能超過七行！']);
		}else{
			if(Auth::check()){
				if (jumiMessage < 10){
					$user = Auth::user();
					$user = new message;
					$user->user_id = Auth::user()->id;//TODO
					$user->video_text = Input::get('video_text');
					$user->save();
					return Redirect::to('video');
					}else{
					return Redirect::to('video') -> withErrors(['一天不能發布超過10次留言！']);
					}
			}else{		
				return Redirect::to('video') -> withErrors(['請先登入！']);
			}
		}

	}

	public function post_like(){
		$user = Auth::user();

		if(isset($user)){
			if(Video::find(Input::get('video_id'))->getRating()->where('user_id', '=', $user)->count() == 0)
			{
				$like = new VideoLike;
				$like->user_id = Auth::user()->id; 
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
/*
	public function get_how_many_messages(){
		$user = Auth::user();
		$lastMessage = VideoMessage:: first('created_at');
		$siftMessage = VideoMessage:: whereRaw('created_at');

		$jumiMessage =  where 'created_at' BETWEEN $siftMessage AND $lastMessage ;
		return count($jumiMessage);
	}
	//$發文時間 = 取得最後那一篇文的發文時間
	//$文章們 = 用eloquent取得文章->where($發文時間-文章時間, '<', 一天)
	


/*
	$now = Carbon::now();
	$yesterday = Carbon::yesterday();

	public function avoid_excessive_message($now,$yesterday) {
			$user_id = Auth::user()->id; 
			$message_user_id = VideoMessage:: Input::get('user_id');
			if (count($message_user_id = $user_id) > 10)
			{
				return Redirect::to('video') -> withErrors(['一天不能發布超過10次留言！']);
			}else{

			}
	}

/*	public function avoid_excessive_message(){
		$user_id = Auth::user()->id;
		date("Y-m-d",time())
		$message_time = VideoMessage::get('created_at');
		if(isset(Carbon::now->hour) ){

		}*/

}
