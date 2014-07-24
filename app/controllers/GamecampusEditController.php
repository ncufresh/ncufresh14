<?php
class GamecampusEditController extends BaseController 
{
	public function index(){
		$campusedit = GameCampus::all();
		return View::make('campusedit.index', array('campusedits' => $campusedit));
	}

	public function create(){
		return View::make('campusedit.create');
	}

	public function store(){
		$rules = array(
			'question' => 'required',
			'type' => 'required',
			'answer_id' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
			return Redirect::route('admin.campusedit.create')->withErrors($validator)->withInput();
		else
		{
			$campusedit = new GameCampus;
			$campusedit->question = Input::get('question');
			$campusedit->type = Input::get('type');
			$campusedit->answer_id = Input::get('answer_id');
			$campusedit->save();
			return Redirect::route('admin.campusedit.show', array('id' => $campusedit->id));
		}
	}

	public function show($id){
		$campusedit = GameCampus::find($id);
		return View::make('campusedit.show', array('campusedit' => $campusedit));
	}

	public function edit($id){
		$campusedit = GameCampus::find($id);
		return View::make('campusedit.edit', array('campusedit' => $campusedit));
	}

	public function update($id){
		$rules = array(
			'question' => 'required',
			'type' => 'required',
			'answer_id' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
			return Redirect::route('admin.campusedit.edit')->withErrors($validator)->withInput();
		else
		{
			$campusedit = GameCampus::find($id);
			$campusedit->question = Input::get('question');
			$campusedit->type = Input::get('type');
			$campusedit->answer_id = Input::get('answer_id');
			$campusedit->save();
			return Redirect::route('admin.campusedit.show', array('id' => $campusedit->id));
		}
	}

	public function destroy($id){
		GameCampus::destroy($id);
		return Redirect::route('admin.campusedit.index');
	}
}
