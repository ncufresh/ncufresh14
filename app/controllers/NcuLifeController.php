<?php

class NcuLifeController extends BaseController
{
	public function item($item)
	{
		App::make('TransferData')->addData('ncu_life_select_url', route('nculife.select'));	
		$results = NcuLifeModel::where('item', '=', $item)->get();
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