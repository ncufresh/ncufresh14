<?php

class NcuLifeController extends BaseController
{
	public function index()
	{
		App::make('SiteMap')->pushLocation('中大生活', route('nculife.index'));
		return View::make('nculife.nculife_index');
	}

	public function item($item)
	{
		App::make('TransferData')->addData('ncu_life_select_url', route('nculife.select'));	
		App::make('SiteMap')->pushLocation('中大生活', route('nculife.index'));
		$convert = array(
			'food' => '食',
			'live' => '住',
			'go' => '行',
			'inschool' => '活',
			'outschool' => '樂',
		);
		$name = $convert[$item];
		App::make('SiteMap')->pushLocation($name, route('nculife.item', array('item' => $item)));
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

	public function data()
	{
		return View::make('nculife.nculife_data',
							array('nculifes'=>NcuLifeModel::orderBy('id','ASC')->get()));
	}

	public function add()
	{
		App::make('TransferData')->addData('ncu_life_imageupload_url', route('imageUpload'));	
		return View::make('nculife.nculife_add');
	}

	public function edit($id)
	{
		$data = NcuLifeModel::find($id);
		return View::make('nculife.nculife_edit', array('nculife'=>$data));
	}

	public function addData()
	{

		$data = new NcuLifeModel;
		$data->item = Input::get('item');
		$data->place = Input::get('place');
		$data->introduction = Input::get('introduction');
		$data->save();
		return Redirect::route('nculife.data');
	}

	public function editData()
	{
		$id = Input::get('id');
		if(Input::has('id'))
		{
			$data = NcuLifeModel::where('id', '=', $id)->first();
			$data->item= Input::get('item');
			$data->place= Input::get('place');;
			$data->introduction= Input::get('introduction');
			$data->save();
		}
		return Redirect::route('nculife.data');
	}

	public function deleteData()
	{
		$id = Input::get('id');
		if(Input::has('id'))
		{
			$data = NcuLifeModel::where('id', '=', $id)->delete();
		}
		return Redirect::route('nculife.data');
	}
}