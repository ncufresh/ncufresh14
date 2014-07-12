<?php

class necessityController extends BaseController
{  
	//取得資料庫資料
	public function index()
	{
		return View::make('necessity.necessity_index',array(/*參數*/
			'necessityResearchData'=>/*model*/NecessityResearchData::all(),
			'necessityFreshmanData'=>/*model*/NecessityFreshmanData::all()));
	}


//*******************************************************************//
//freshman後台的controller

	//取得資料庫資料
	public function index_backstage_freshman()
	{
		return View::make('necessity.necessity_backstage_freshman',array(/*參數*/'FreshmanData'=>/*model*/NecessityFreshmanData::all()));
	}

	//新增資料進去資料庫
	public function freshman_add(){

		$user = new NecessityFreshmanData; 	  
		$user->item = Input::get('item');
		$user->explanation= Input::get('explanation');
		$user->organizer= Input::get('organizer');
		$user->save();

		return Redirect::to('necessity/backstage/freshman');
	}

	//從資料庫裏面刪除資料
	public function freshman_delete(){
		
		$user = NecessityFreshmanData::where('id', '=', Input::get('ID'))->delete();

		return Redirect::to('necessity/backstage/freshman');
	}

	

//*******************************************************************//
//research後台的controller

	public function index_backstage_research()
	{
		return View::make('necessity.necessity_backstage_research',array(/*參數*/'ResearchData'=>/*model*/NecessityResearchData::all()));
	}

	public function research_add(){

		$user = new NecessityResearchData; 	  
		$user->item = Input::get('item');
		$user->explanation= Input::get('explanation');
		$user->organizer= Input::get('organizer');
		$user->save();

		return Redirect::to('necessity/backstage/research');
	}

	//從資料庫裏面刪除資料
	public function research_delete(){
		
		$user = NecessityResearchData::where('id', '=', Input::get('ID'))->delete();

		return Redirect::to('necessity/backstage/research');
	}

//*******************************************************************//
//download後台的controller

	public function index_backstage_download()
	{
		//no
	}




}
