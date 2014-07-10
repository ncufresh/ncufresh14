<?php

class NcuLifeController extends BaseController
{
	public function item($item)
	{
		if($item == 'food')
		{
			$results = NcuLifeModel::where('item', '=', 'food')->get();
			App::make('TransferData')->addData('ncu_life_select_url', route('nculife.select'));	
		}
		else if($item == 'live')
		{
			$results = NcuLifeModel::where('item', '=', 'live')->get();
			App::make('TransferData')->addData('ncu_life_select_url', route('nculife.select'));
		}
		else if($item == 'go')
		{
			$results = NcuLifeModel::where('item', '=', 'go')->get();
			App::make('TransferData')->addData('ncu_life_select_url', route('nculife.select'));
		}
		else if($item == 'inschool')
		{
			$results = NcuLifeModel::where('item', '=', 'inschool')->get();
			App::make('TransferData')->addData('ncu_life_select_url', route('nculife.select'));
		}
		else if($item == 'outschool')
		{
			$results = NcuLifeModel::where('item', '=', 'outschool')->get();
			App::make('TransferData')->addData('ncu_life_select_url', route('nculife.select'));
		}

		return View::make('nculife.nculife_item',array(
				'nculifes'=>$results
				));
	}
	
	public function select()
	{
		$id = Input::get('num', 1);
		$result = NcuLifeModel::where('id', '=', $id)->first();
		return Response::json($result);
	}
}