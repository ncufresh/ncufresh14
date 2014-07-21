<?php

class VideoController extends BaseController {

//use Carbon/Carbon;
//Carbon::createFromTimeStamp(strtotime($lastMessage->first('created_at'));//$comment->created_at));//****************

	public function index(){
		App::make('TransferData')->addData('like_video_url', route('video.rate')); //ajax
		//App::make('TransferData')->addData('about_rate_url', route('video.aboutrate'))		;
		//App::make('TransferData')->addData('change_intro_url', route('video.intro'));

		$data = Message::paginate(10);

		//$videoID = VideoLike::where('video_id','=','');
		$video=Video::where('id','=','');

		$videoRating1 = Video::find(1)->getRating()->where('video_rate', '=', '0')->count();//find 是找主鍵
		$videoRating2 = Video::find(1)->getRating()->where('video_rate', '=', '1')->count();
		$introduction = Video::find(1)->video_introduction;

		return View::make('video.sites', array('messages' => $data,'getLike' => $videoRating1 , 'getLove' =>$videoRating2 ,'introduction' =>$introduction
			));
	}

	function removeXSS($val) {   //xss
	  
	   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val); 
	 
	   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	   $search .= '1234567890!@#$%^&*()'; 
	   $search .= '~`";:?+/={}[]-_|\'\\'; 
	   for ($i = 0; $i < strlen($search); $i++) { 
	      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); 
	      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val);  
	   } 

	   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base'); 
	   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate',
	    'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 
	    'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate',
	    'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave',
	    'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart',
	    'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload'); 
	   $ra = array_merge($ra1, $ra2); 
	 
	   $found = true;  
	   while ($found == true) { 
	      $val_before = $val; 
	      for ($i = 0; $i < sizeof($ra); $i++) { 
	         $pattern = '/'; 
	         for ($j = 0; $j < strlen($ra[$i]); $j++) { 
	            if ($j > 0) { 
	               $pattern .= '('; 
	               $pattern .= '(&#[xX]0{0,8}([9ab]);)'; 
	               $pattern .= '|'; 
	               $pattern .= '|(&#0{0,8}([9|10|13]);)'; 
	               $pattern .= ')*'; 
	            } 
	            $pattern .= $ra[$i][$j]; 
	         } 
	         $pattern .= '/i'; 
	         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2);
	         $val = preg_replace($pattern, $replacement, $val); 
	         if ($val_before == $val) { 
	            $found = false; 
	         } 
	      } 
	   } 
	   return $val; 
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
	public function get_how_many_messages(){
		$user = Auth::user();
		//if(VideoMessage::where('user_id', '=', $user->id)){//抓取使用者留的message
		$lastMessage = VideoMessage::where('user_id', '=', $user->id)->get();//end('created_at');
		$lastDate1 = \Carbon\Carbon::now();
		$lastDate2 = \Carbon\Carbon::now()->subDay(1);
		if(count($lastMessage) == 0){
			return 0;
		}else{
			$jumiMessage = VideoMessage::where('user_id', '=', $user->id)->where('created_at', '<', $lastMessage[$lastMessage->count()-1]->created_at)->where('created_at', '>', $lastDate2)->get();
		}
		
		return ($jumiMessage->count());
	}
	

	public function post_index(){
		$lines = substr_count( Input::get('video_text'), "\n" );
		$jumiMessage = $this->get_how_many_messages();
		//$val = $this ->removeXSS();
		if ($lines > 7){
			return Redirect::route('video') -> withErrors(['留言行數不能超過七行！']);
		}else{
			if(Auth::check()){
				if ($jumiMessage < 10){
					$user = Auth::user();
					$user = new message;
					$user->user_id = Auth::user()->id;//TODO
					$user->video_text = Input::get('video_text');
					removeXSS(Input::get('video_text'));
					$user->save();
					return Redirect::route('video');
				}else{
					return Redirect::route('video') -> withErrors(['一天不能發布超過10次留言！']);
				}
			}
		}
	}

	public function post_like(){
		if(Auth::check()){
			$user_id = Auth::user()->id;
			if(VideoLike::where('user_id', '=', $user_id)->get()->count() == 0){
				$like = new VideoLike;
				$like->user_id = $user_id; 
				$like->video_rate = Input::get('video_rate');
				$like->video_id = Input::get('video_id');
				$like->save();
			}else{
				return Redirect::route('video') -> withErrors(['你已經投過了！']);////TODO******************
			}
			
			$videoRating1 = Video::find(Input::get('video_id'))->getRating()->where('video_rate', '=', '0')->count();
			$videoRating2 = Video::find(Input::get('video_id'))->getRating()->where('video_rate', '=', '1')->count();

			$gg['a'] = $videoRating1;
			$gg['b'] = $videoRating2;
			return Response::json($gg);
		}else{
			return Redirect::route('video') -> withErrors(['請先登入！']);
		}
	}

}
