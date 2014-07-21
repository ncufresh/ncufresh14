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
		App::make('TransferData')->addData('ncu_life_selectpicture_url', route('nculif.selectPicture'));
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
		$pictures = NcuLifePicture::where('place_id', '=', $results[0]->id)->get();
		return View::make('nculife.nculife_item',array('nculifes'=>$results, 'pictures'=>$pictures));
	}
	
	public function select()
	{
		$id = Input::get('num', 1);
		$result = NcuLifeModel::where('id', '=', $id)->first();
		$pictures = NcuLifePicture::where('place_id', '=', $id)->with('pictureAdmin')->get();
		$local = NcuLifeModel::find($id)->local;
		return Response::json(array('result' => $result->toArray(), 'pictures' => $pictures->toArray(), 'local' => $local->toArray()));
	}

	public function selectPicture()
	{
		$num = Input::get('num', 1);
		$pictures = NcuLifePicture::where('picture_id', '=', $num)->with('pictureAdmin')->get();
		return Response::json(array('pictures' => $pictures->toArray()));
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
		App::make('TransferData')->addData('ncu_life_imageupload_url', route('imageUpload'));
		$data = NcuLifeModel::find($id);
		$pictures = NcuLifeModel::find($id)->picture;
		$local = NcuLifeModel::find($id)->local->first();
		return View::make('nculife.nculife_edit', array('nculife' => $data, 'pictures' => $pictures, 'local' => $local));
	}

	public function addData()
	{
		$data = new NcuLifeModel;
		$data->item = Input::get('item');
		$data->place = Input::get('place');
		$data->introduction = Input::get('introduction');
		$data->local_id = Input::get('local_id');
		$data->save();
		return Redirect::route('nculife.data');
	}

	public function editData()
	{
		$id = Input::get('id');
		if(Input::has('id'))
		{
			$data = NcuLifeModel::where('id', '=', $id)->first();
			$data->item = Input::get('item');
			$data->place = Input::get('place');;
			$data->introduction = Input::get('introduction');
			$data->local_id = Input::get('local_id');
			$data->save();
			$picture = new NcuLifePicture;
			if(Input::has('picture_id'))
			{
				$picture->place_id = $id;
				$picture->picture_id = Input::get('picture_id');
				$picture->save();
			}
		}
		return Redirect::route('nculife.data');
	}

	public function deleteData()
	{
		$id = Input::get('id');
		if(Input::has('id'))
		{
			NcuLifeModel::find($id)->delete();
			NcuLifePicture::where('place_id', '=', $id)->delete();
		}
		return Redirect::route('nculife.data');
	}

	public function deletePicture()
	{
		$dataId = Input::get('place_id');
		$id = Input::get('picture_id');
		if(Input::has('picture_id'))
		{
			NcuLifePicture::where('id', '=', $id)->delete();
		}
		return Redirect::route('nculife.edit', array('id'=>$dataId));
	}
}