<?php

class SchoolGuideController extends BaseController {


	public function show(){

		App::make('TransferData')->addData('guide_left_url', route('Guide'));
		App::make('TransferData')->addData('guide_right_url', route('Guide.one'));
		App::make('TransferData')->addData('guide_map',route('Guide.map'));
		App::make('TransferData')->addData('guide_select',route('Guide.select'));
		App::make('TransferData')->addData('guide_good',route('Guide.good'));
		App::make('SiteMap')->pushLocation('校園導覽', route('SchoolGuide'));

		return Redirect::route('schoolguide.item', array('item' => 'department'));

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

	public function tophoto($item, $id){
		App::make('TransferData')->addData('guide_left_url', route('Guide'));
		App::make('TransferData')->addData('guide_right_url', route('Guide.one'));
		App::make('TransferData')->addData('guide_map',route('Guide.map'));
		App::make('TransferData')->addData('value', '1');
		App::make('SiteMap')->pushLocation('校園導覽', route('SchoolGuide'));

		$user = Schoolguide::find($id);
		App::make('TransferData')->addData('select', $user->categories);
		App::make('TransferData')->addData('intro', $user->introduction);
		
		App::make('SiteMap')->pushLocation($user->categoryName, route('schoolguide.item', array('id' => $id)));
		App::make('SiteMap')->pushLocation($user->name, route('schoolguide.item', array('id' => $id)));

		//return Redirect::route('schoolguide.photo', array('id'=>$id,'item' =>$item,'users'=>$user, 'Schoolguides'=>Schoolguide::where('categories', '=', $user->categories)->orderBy('id','DESC')->get()));
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
		    if(Input::get('categories')==1){
		    	$user->categoryName = "系館";
		    }
		    if(Input::get('categories')==2){
		    	$user->categoryName = "行政";
		    }
		    if(Input::get('categories')==3){
		    	$user->categoryName = "中大十景";
		    }
		    if(Input::get('categories')==4){
		    	$user->categoryName = "運動";
		    }
		    if(Input::get('categories')==5){
		    	$user->categoryName = "飲食";
		    }
		    if(Input::get('categories')==6){
		    	$user->categoryName = "住宿";
		    }

			$user->save();

		   return Redirect::route('SchoolGuide.list');

	}

	public function toadd(){

		return View::make('schoolguide.add');

	}

	public function delete(){

		 $id=  Input::get('id');
		if(Input::has('id')){
		 $user = Schoolguide::where('id', '=', $id)->delete();
		 }
		 return Redirect::route('SchoolGuide.list');

	}
	public function goodadd(){

		$id=  Input::get('id');
		$good=Input::get('good');
		$data = good::where('id', '=', $id)->first();
		$data->count = $good +1;
		$data -> save();

		return Redirect::route('schoolguide.item');

	}
	public function sure(){

		$id=  Input::get('id');
		if(Input::has('id')){
		$data = Schoolguide::where('id', '=', $id)->first();
		$data->categories= Input::get('categories');
		$data->name= Input::get('name');;
		$data->introduction= Input::get('introduction');
		if(Input::get('categories')==1){
		    	$data->categoryName = "系館";
		    }
		    if(Input::get('categories')==2){
		    	$data->categoryName = "行政";
		    }
		    if(Input::get('categories')==3){
		    	$data->categoryName = "中大十景";
		    }
		    if(Input::get('categories')==4){
		    	$data->categoryName = "運動";
		    }
		    if(Input::get('categories')==5){
		    	$data->categoryName = "飲食";
		    }
		    if(Input::get('categories')==6){
		    	$data->categoryName = "住宿";
		    }

		 $data->save();
	}
		return Redirect::route('SchoolGuide.list');
	}

	public function showlist(){

		return View::make('schoolguide.List',
			array('lists'=>Schoolguide::orderBy('categories','DESC')->get()));
		

	}

	public function item($item)
	{	
		App::make('TransferData')->addData('guide_left_url', route('Guide'));
		App::make('TransferData')->addData('guide_right_url', route('Guide.one'));
		App::make('TransferData')->addData('guide_map',route('Guide.map'));
		App::make('SiteMap')->pushLocation('校園導覽', route('SchoolGuide'));

		$convert = array(
			'department' => '系館',
			'administration' => '行政',
			'scence' => '中大十景',
			'food' => '飲食',
			'dorm' => '住宿',
			'exercise'=>'運動'
		);
		$name = $convert[$item];
		$value = array(
			'department' => '1',
			'administration' => '2',
			'scence' => '3',
			'food' => '5',
			'dorm' => '6',
			'exercise'=>'4'
		);	
		$categories = $value[$item];
		App::make('TransferData')->addData('value', '2');
		App::make('TransferData')->addData('select', $categories);
		App::make('SiteMap')->pushLocation($name, route('schoolguide.item', array('item' => $item)));
		$results = Schoolguide::where('categories', '=', $categories)->get();

		
		return View::make('schoolguide.schoolguide',array('Schoolguides'=>$results));
	}

}
