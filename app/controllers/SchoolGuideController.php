<?php

class SchoolGuideController extends BaseController {


	public function show(){

		App::make('TransferData')->addData('guide_left_url', route('Guide'));
		App::make('TransferData')->addData('guide_right_url', route('Guide.one'));
		App::make('TransferData')->addData('guide_map',route('Guide.map'));

		return View::make('schoolguide.schoolguide',
			array('Schoolguides'=>Schoolguide::where('categories', '=', '1')->orderBy('id','DESC')->get()));

	}

	public function getItem(){
		$placeId = Input::get('id');
		$data = Schoolguide::find($placeId);
		return Response::json($data);
	}

	public function get(){
		$value = Input::get('value', 1);
		$data = Schoolguide::where('categories', '=', $value)->orderBy('id','DESC')->get();
		return Response::json($data);

	}
	
	public function clickImg(){

		$placeId = Input::get('id');
		$data = Schoolguide::find($placeId);
		return Response::json($data);
	}

	public function tophoto($id){
		App::make('TransferData')->addData('guide_left_url', route('Guide'));
		App::make('TransferData')->addData('guide_right_url', route('Guide.one'));
		App::make('TransferData')->addData('guide_map',route('Guide.map'));
		App::make('TransferData')->addData('value', '1');

		$user = Schoolguide::find($id);
		App::make('TransferData')->addData('select', $user->categories);

		return View::make('schoolguide.schoolguide',array('users'=>$user, 'Schoolguides'=>Schoolguide::where('categories', '=', $user->categories)->orderBy('id','DESC')->get(), 'old' => true));
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
