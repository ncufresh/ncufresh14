<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index(){
		App::make('TransferData')->addData('announcement-api-url', route('api.announcement.index'));
		App::make('TransferData')->addData('announcement-url', route('announcement.index'));
		App::make('TransferData')->addData('calender-api-url', route('api.calender.index'));
//		App::make('TransferData')->addData('calender-url', route('calender.index'));
		$links = Link::orderBy('order', 'ASC')->get();
		$announcements = Announcement::orderBy('pinned', 'DESC')->orderBy('created_at', 'DESC')->get()->take(7);
		$now = \Carbon\Carbon::now();
		$calenders = Calender::active()->get();
		return View::make('index', array('links' => $links, 'announcements' => $announcements, 'now' => $now, 'calenders' => $calenders));
	}

	public function errorPage(){
		$message = Session::get('message', 'Unknown error');
		return View::make('error.index', array('message' => $message));
	}

	public function imageUpload(){
		if(Input::hasFile('upload') == true){
			$file = Input::file('upload');
			do{
				$fileName = str_random(128);
			}while(AdminImage::where('file_name', '=', $fileName)->exists() == true);
			$extension = $file->getClientOriginalExtension();
			$fileName = $fileName.'.'.$extension;
			$image = new AdminImage;
			$image->original_file_name = $file->getClientOriginalName();
			$image->file_name = $fileName;
			$image->save();

			$file->move(public_path('img/uploadImage'), $fileName);

			$CKEditorFuncNum = Input::get('CKEditorFuncNum', 2);
			$fileUrl = url('img/uploadImage/').'/'.$fileName;
			if(Input::has('response_type') && Input::get('response_type') == 'json'){
				return Response::json($image);
			}else{
				echo "<script>window.parent.CKEDITOR.tools.callFunction(". $CKEditorFuncNum .",'" . $fileUrl . "','');</script>";
			}
		}
	}


	//Admin only ><
	public function dashboard(){
		$function = array(
			'announcement' => array(
				'name' => '公告',
				'param' => array(
					'title' => array('name' => '標題', 'type' => 'text'),
					'content' => array('name' => '內容', 'type' => 'textarea'),
					'pinned' => array('name' => '置頂', 'type' => 'radio', 'data' => array('0' => '否', '1' => '是')),
				),
			),
		);
		return View::make('admin.index', array('function' => $function));
	}

	public function psersonImage($id) {
		if ( File::exists(public_path() . '/img/person/' . $id . '.png') ) {
			$data = File::get(public_path() . '/img/person/' . $id . '.png');
		}
		$data = File::get(public_path() . '/img/person/0.png');
		return Response::make($data, 200, array('Content-Type' => 'image/png'));
	}
}
