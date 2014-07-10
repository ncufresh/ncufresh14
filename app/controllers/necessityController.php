<?php

class necessityController extends BaseController
{  

	public function index()
	{
		return View::make('necessity.necessity_index');
	}

	public function index_backstage_freshman()
	{
		return View::make('necessity.necessity_backstage_freshman');
	}

	public function index_backstage_research()
	{
		//no
	}

	public function index_backstage_download()
	{
		//no
	}

}





?>