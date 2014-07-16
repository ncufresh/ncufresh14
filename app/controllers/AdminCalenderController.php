<?php

class AdminCalenderController extends AdminBaseController {

	//resource
	public function index(){
		App::make('SiteMap')->pushLocation('行事曆管理', route('admin.calender.index'));

		$calenders = Calender::get();
		return View::make('calender.index_admin', array('calenders' => $calenders, 'admin' => true));
	}

	public function create(){
		return View::make('calender.create');
	}

	public function store(){

		$rules = array(
			'title' => 'required|max:30',
			'content' => 'required',
			'start_at' => 'required',
			'end_at' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::route('admin.calender.create')->withErrors($validator)->withInput();
		}else{
			//success! save announcement to database~~

			$calender = new Calender;
			$calender->title = Input::get('title');
			$calender->content = Input::get('title');
			$calender->start_at = Input::get('start_at');
			$calender->end_at = Input::get('end_at');
			$calender->save();

			return Redirect::route('admin.calender.show', array('id' => $calender->id));
		}
	}

	public function show($id){
		App::make('SiteMap')->pushLocation('行事曆管理', route('admin.calender.index'));
		$calender = Calender::find($id);
		//TODO 檢查存不存在
		return View::make('calender.show', array('calender' => $calender, 'admin' => true));

	}

	public function edit($id){
		App::make('SiteMap')->pushLocation('行事曆管理', route('admin.calender.index'));
		$calender = Calender::find($id);
		//TODO 檢查存不存在
		return View::make('calender.edit', array('calender' => $calender));
	}

	public function update($id){
		$calender = Calender::find($id);

		$rules = array(
			'title' => 'required|max:30',
			'content' => 'required',
			'start_at' => 'required',
			'end_at' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::route('admin.calender.create')->withErrors($validator)->withInput();
		}else{
			//success! save announcement to database~~

			$calender->title = Input::get('title');
			$calender->content = Input::get('content');
			$calender->start_at = Input::get('start_at');
			$calender->end_at = Input::get('end_at');
			$calender->save();

			return Redirect::route('admin.calender.show', array('id' => $calender->id));
		}
	}

	public function destroy($id){
		Calender::destroy($id);

		return Redirect::route('admin.calender.index');
	}

}
