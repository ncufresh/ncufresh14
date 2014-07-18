<?php

class AboutUsController extends BaseController {


	public function index(){

		App::make('TransferData')->addData('about_modal',route('About.modal'));

			return View::make('aboutus.aboutus');		

	}

	public function getModalId(){

		$id = Input::get('id');
		$data = AboutUs::find($id);
			return Response::json($data);
	}

	public function toedit($id){

    $user = AboutUs::find($id);
	

	return View::make('aboutus.edit',array('users'=>$user));
	}

	public function add(){

			$user = new AboutUs;
			
			$user->name = Input::get('id');
		    $user->categories= Input::get('categories');
		    $data->teamphoto= Input::get('teamphoto');
		    $user->introduction= Input::get('introduction');
		    if(Input::get('categories')==1){
		    	$user->categoryName = "執行組";
		    }
		    if(Input::get('categories')==2){
		    	$user->categoryName = "程設組";
		    }
		    if(Input::get('categories')==3){
		    	$user->categoryName = "美工組";
		    }
		    if(Input::get('categories')==4){
		    	$user->categoryName = "影音組";
		    }
		    if(Input::get('categories')==5){
		    	$user->categoryName = "企劃組";
		    }
		    if(Input::get('categories')==6){
		    	$user->categoryName = "幕後花絮";
		    }

			$user->save();

		   return Redirect::to('About_us/list');

	}

	public function toadd(){

		return View::make('aboutus.add');

	}

	public function delete(){

		 $id=  Input::get('id');
		if(Input::has('id')){
		 $user = AboutUs::where('id', '=', $id)->delete();
		 }
		 return Redirect::to('About_us/list');

	}

	public function sure(){

		$id=  Input::get('id');
		if(Input::has('id')){
		$data = AboutUs::where('id', '=', $id)->first();
		$data->categories= Input::get('categories');
		$data->teamphoto= Input::get('teamphoto');
		$data->introduction= Input::get('introduction');
		  if(Input::get('categories')==1){
		    	$user->categoryName = "執行組";
		    }
		    if(Input::get('categories')==2){
		    	$user->categoryName = "程設組";
		    }
		    if(Input::get('categories')==3){
		    	$user->categoryName = "美工組";
		    }
		    if(Input::get('categories')==4){
		    	$user->categoryName = "影音組";
		    }
		    if(Input::get('categories')==5){
		    	$user->categoryName = "企劃組";
		    }
		    if(Input::get('categories')==6){
		    	$user->categoryName = "幕後花絮";
		    }


		 $data->save();
	}
		return Redirect::to('About_us/list');
	}

	public function showlist(){

		return View::make('aboutus.list',
			array('lists'=>AboutUs::orderBy('id','DESC')->get()));
		

	}

}
