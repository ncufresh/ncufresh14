<?php

class AdminAnnouncementController extends AdminBaseController {

	//resource
	public function index(){
		App::make('SiteMap')->pushLocation('公告管理', route('admin.announcement.index'));
		$announcements = Announcement::orderBy('pinned', 'DESC')->orderBy('created_at', 'DESC')->get();
		return View::make('announcement.index_admin', array('announcements' => $announcements, 'admin' => true));
	}

	public function create(){
		App::make('SiteMap')->pushLocation('公告管理', route('admin.announcement.index'));
		App::make('SiteMap')->pushLocation('發新公告', route('admin.announcement.create'));
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
			return Redirect::route('admin.announcement.create')->withErrors($validator)->withInput();
		}else{
			//success! save announcement to database~~
			$announcement = new Announcement;
			$announcement->title = Input::get('title');
			$announcement->content = Input::get('content');
			$announcement->pinned = Input::get('pinned');
			$announcement->user_id = Auth::user()->id;
			$announcement->save();

			return Redirect::route('admin.announcement.show', array('id' => $announcement->id));
		}
	}

	public function show($id){
		App::make('SiteMap')->pushLocation('公告管理', route('admin.announcement.index'));
		$announcement = Announcement::find($id);
		//TODO 檢查存不存在
		$announcement->addViewer();
		return View::make('announcement.show', array('announcement' => $announcement, 'admin' => true));

	}

	public function edit($id){
		App::make('SiteMap')->pushLocation('公告管理', route('admin.announcement.index'));
		App::make('SiteMap')->pushLocation('修改公告', route('admin.announcement.edit', array('id' => $id)));
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
			return Redirect::route('admin.announcement.edit')->withErrors($validator)->withInput();
		}else{
			//success! save announcement to database~~
			$announcement->title = Input::get('title');
			$announcement->content = Input::get('content');
			$announcement->pinned = Input::get('pinned');
			$announcement->save();

			return Redirect::route('admin.announcement.show', array('id' => $announcement->id));
		}
	}

	public function destroy($id){
		Announcement::destroy($id);
		return Redirect::route('admin.announcement.index');
	}
}
