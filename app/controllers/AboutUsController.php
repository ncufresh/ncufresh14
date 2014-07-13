<?php

class AboutUsController extends BaseController {


	public function index(){

		App::make('TransferData')->addData('modal',route('About_modal'));

			return View::make('aboutus.aboutus');		

	}

	public function getModalId(){

		$id = Input::get('id');
		$data = AboutUs::find($id);

			return Response::json($data);
	}
}
