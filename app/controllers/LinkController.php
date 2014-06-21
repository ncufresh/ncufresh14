<?php

class LinkController extends BaseController {

	//resource
	public function index(){
		$links = Link::orderBy('order', 'ASC')->get();
		return View::make('link.index', array('links' => $links));
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
