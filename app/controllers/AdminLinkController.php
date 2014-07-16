<?php

class AdminLinkController extends AdminBaseController {

	//resource
	public function index(){
		App::make('SiteMap')->pushLocation('友站連結管理', route('admin.link.index'));
		App::make('TransferData')->addData('link-api-url', route('admin.api.link.index'));
		$links = Link::orderBy('order', 'ASC')->get();
		return View::make('link.index', array('links' => $links, 'admin' => true));
	}

	public function create(){
		//No
	}

	public function store(){
		//No
	}

	public function show($id){
		//NO

	}

	public function edit($id){
		//NO
	}

	public function update($id){
		//NO
	}

	public function destroy($id){
		//NO
	}
}
