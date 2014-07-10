<?php

class AnnouncementController extends BaseController {

	//resource
	public function index(){
		$announcements = Announcement::orderBy('pinned', 'DESC')->orderBy('created_at', 'DESC')->get();
		return View::make('announcement.index', array('announcements' => $announcements));
	}

	public function create(){
		return View::make('announcement.create');
	}

	public function store(){

		$rules = array(
			'title' => 'required|max:30',
			'content' => 'required',
			'pinned' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::route('announcement.create')->withErrors($validator)->withInput();
		}else{
			//success! save announcement to database~~
			$announcement = new Announcement;
			$announcement->title = Input::get('title');
			$announcement->content = Input::get('content');
			$announcement->pinned = Input::get('pinned');
			$announcement->user_id = Auth::user()->id;
			$announcement->save();

			return Redirect::route('announcement.show', array('id' => $announcement->id));
		}
	}

	public function show($id){
		$announcement = Announcement::find($id);
		//TODO 檢查存不存在
		$announcement->addViewer();
		return View::make('announcement.show', array('announcement' => $announcement));

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
		Announcement::destroy($id);
	}


//	create	resource.create
//POST	/resource	store	resource.store
//GET	/resource/{resource}	show	resource.show
//GET	/resource/{resource}/edit	edit	resource.edit
//PUT/PATCH	/resource/{resource}	update	resource.update
//DELETE	/resource/{resource}	destroy

}
