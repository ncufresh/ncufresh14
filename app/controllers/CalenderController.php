<?php

class CalenderController extends BaseController {

	//resource
	public function index(){
		$calenders = Calender::get();
		return View::make('calender.index', array('calenders' => $calenders));
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
			return Redirect::route('calender.create')->withErrors($validator)->withInput();
		}else{
			//success! save announcement to database~~

			$calender = new Calender;
			$calender->title = Input::get('title');
			$calender->content = Input::get('title');
			$calender->start_at = Input::get('start_at');
			$calender->end_at = Input::get('end_at');
			$calender->save();

			return Redirect::route('calender.show', array('id' => $calender->id));
		}
	}

	public function show($id){
		$calender = Calender::find($id);
		//TODO 檢查存不存在
		return View::make('calender.show', array('calender' => $calender));

	}

	public function edit($id){
		$announcement = Announcement::find($id);
		//TODO 檢查存不存在
		$announcement->addViewer();
		return View::make('announcement.edit', array('announcement' => $announcement));
	}

	public function update($id){
		$announcement = Announcement::find($id);
		$rules = array(
			'title' => 'required|max:30',
			'content' => 'required',
			'pinned' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('announcement.edit')->withErrors($validator)->withInput();
		}else{
			//success! save announcement to database~~
			$announcement->title = Input::get('title');
			$announcement->content = Input::get('content');
			$announcement->pinned = Input::get('pinned');
			$announcement->save();

			return Redirect::route('announcement.show', array('id' => $announcement->id));
		}
	}

	public function destroy($id){
		Calender::destroy($id);
	}

}
