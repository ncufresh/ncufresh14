<?php

class AdminBaseController extends BaseController {

	public function __construct()
	{
		parent::__construct();

		App::make('SiteMap')->pushLocation('後台管理', route('dashboard'));
	}

}
