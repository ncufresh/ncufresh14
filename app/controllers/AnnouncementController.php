<?php

class AnnouncementController extends BaseController {

	//resource
	public function index(){
		App::make('SiteMap')->pushLocation('公告', route('announcement.index'));
		$announcements = Announcement::orderBy('pinned', 'DESC')->orderBy('created_at', 'DESC')->get();
		return View::make('announcement.index', array('announcements' => $announcements, 'admin' => false));
	}


	public function show($id){
		App::make('SiteMap')->pushLocation('公告', route('announcement.index'));
		$announcement = Announcement::find($id);
		//TODO 檢查存不存在
		$announcement->addViewer();
		App::make('SiteMap')->pushLocation($announcement->title, route('announcement.show', array('id' => $announcement->id)));
		return View::make('announcement.show', array('announcement' => $announcement, 'admin' => true));
	}



//	create	resource.create
//POST	/resource	store	resource.store
//GET	/resource/{resource}	show	resource.show
//GET	/resource/{resource}/edit	edit	resource.edit
//PUT/PATCH	/resource/{resource}	update	resource.update
//DELETE	/resource/{resource}	destroy

}
