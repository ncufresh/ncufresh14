<?php

class SchoolGuideController extends BaseController {


	public function show(){

		return View::make('schoolguide.schoolguide',
			array('Schoolguides'=>Schoolguide::where('categories', '=', '1')->orderBy('id','DESC')->get()));

	}

	public function get(){
		$value = Input::get('value', 1);
		$data = Schoolguide::where('categories', '=', $value)->orderBy('id','DESC')->get();
		return Response::json($data);

	}

	public function toedit($id){

    $user = Schoolguide::find($id);
	

	return View::make('schoolguide.edit',array('users'=>$user));
	}

	public function add(){

			$user = new Schoolguide;
			
			$user->name = Input::get('name');
		    $user->categories= Input::get('categories');
		    $user->introduction= Input::get('introduction');

			$user->save();

		   return Redirect::to('SchoolGuide/list');

	}

	public function toadd(){

		return View::make('schoolguide.add');

	}

	public function delete(){

		 $id=  Input::get('id');
		if(Input::has('id')){
		 $user = Schoolguide::where('id', '=', $id)->delete();
		 }
		 return Redirect::to('SchoolGuide/list');
		
	}

	public function sure(){

		$id=  Input::get('id');
		if(Input::has('id')){
		$data = Schoolguide::where('id', '=', $id)->first();
		$data->categories= Input::get('categories');
		$data->name= Input::get('name');;
		$data->introduction= Input::get('introduction');
		 $data->save();
	}
		return Redirect::to('SchoolGuide/list');
	}

	public function showlist(){

		return View::make('schoolguide.List',
			array('lists'=>Schoolguide::orderBy('categories','DESC')->get()));
		

	}

	
}
