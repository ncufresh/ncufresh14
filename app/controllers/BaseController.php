<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		$transferData = App::make('TransferData');
		$transferData->addData('login', Auth::check() ? 1 : 0);
		if(Auth::check()){
			$transferData->addData('user-id', Auth::user()->id);
			$transferData->addData('user-name', Auth::user()->name);
		}
		$transferData->addData('bURL', URL::to('/'));


		App::make('SiteMap')->pushLocation('首頁', route('home'));

		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
