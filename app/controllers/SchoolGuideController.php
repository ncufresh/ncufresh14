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

	// public function edit(){

	// $id = Input::get('value', 1);
	// $data = Schoolguide::where('id', '=', $id)->get();
	// return Response::json($data);


	// }

	public function toedit($id){

	return View::make('schoolguide.edit');
	}

	public function add(){


	}

	public function delete(){
		
	}

	public function sure(){

		// $inputs=Input::get('class');
		// if($inputs =="categories")
		// 	$categories= 
		// if($inputs =="name")
		// 	$name= 
		// if($inputs =="introduction")
		// 	$introduction= 
		


		// 	$user = new Schoolguide;

		// 	$user->name = $input;
		// 	$user->categories= $categories;
		// 	$user->introduction= $introduction;

		// 	$user->save();

		// return Redirect::to('SchoolGuide/list');
	}

	public function showlist(){

		return View::make('schoolguide.List',
			array('lists'=>Schoolguide::orderBy('categories','DESC')->get()));
		

	}

	
}
