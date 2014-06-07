<?php

class LinksController extends BaseController {

	//resource
	public function index(){
		$links = Links::orderBy('id', 'ASC')->get();
		return View::make('links.index', array('links' => $links));
	}

	public function create(){
		return View::make('links.create');
	}

	public function store(){

		$rules = array(
			'title' => 'required|max:30',
			'content' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::route('links.create')->withErrors($validator)->withInput();
		}else{
			//success! save announcement to database~~
			$link = new Links;
			$link->title = Input::get('title');
			$link->content = Input::get('content');
			$link->save();

			return $this->index();
		}
	}

	public function edit($id){
		$announcement = Announcement::find($id);
		//TODO 檢查存不存在
		$announcement->addViewer();
		return View::make('announcement.edit', array('announcement' => $announcement));
	}

	public function destroy($id){
		Links::destroy($id);
	}


//	create	resource.create
//POST	/resource	store	resource.store
//GET	/resource/{resource}	show	resource.show
//GET	/resource/{resource}/edit	edit	resource.edit
//PUT/PATCH	/resource/{resource}	update	resource.update
//DELETE	/resource/{resource}	destroy

}
