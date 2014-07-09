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
		$links = Link::orderBy('order', 'ASC')->get();
		return View::make('index', array('links' => $links));
	}

	public function errorPage(){
		$message = Session::get('message', 'Unknown error');
		return View::make('error.index', array('message' => $message));
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

}
