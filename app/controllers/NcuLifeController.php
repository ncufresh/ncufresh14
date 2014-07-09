<?php

class NcuLifeController extends BaseController
{
	public function food()
	{
		$results = NcuLifeModel::where('item', '=', 'food')->get();
		return View::make('nculife.nculife_food',array(
			'nculife'=>$results
		));
	}

	public function live()
	{
		$results = NcuLifeModel::where('item', '=', 'live')->get();
		return View::make('nculife.nculife_live',array(
			'nculife'=>$results
		));
	}

	public function go()
	{
		$results = NcuLifeModel::where('item', '=', 'go')->get();
		return View::make('nculife.nculife_go',array(
			'nculife'=>$results
		));
	}

	public function inschool()
	{
		$results = NcuLifeModel::where('item', '=', 'inschool')->get();
		return View::make('nculife.nculife_inschool',array(
			'nculife'=>$results
		));
	}

	public function outschool()
	{
		$results = NcuLifeModel::where('item', '=', 'outschool')->get();
		return View::make('nculife.nculife_outschool',array(
			'nculife'=>$results
		));
	}
}