<?php

class AdminController extends BaseController {


	public function index(){
		App::make('SiteMap')->pushLocation('後台管理', route('dashboard'));

		return View::make('admin.index');


	}

	public function getModalId(){

		$id = Input::get('id');
		$data = AboutUs::find($id);

		return Response::json($data);
	}
}
