<?php

class SchoolGuideController extends BaseController {

	//protected $layout='Schoolguide';

	public function show(){

		return View::make('schoolguide.schoolguide',
			array('Schoolguides'=>Schoolguide::where('categories', '=', '1')->orderBy('id','DESC')->get()));

	}

	public function get(){
		$value = Input::get('value', 1);
		$data = Schoolguide::where('categories', '=', $value)->orderBy('id','DESC')->get();
		return Response::json($data);

	}

	
}
