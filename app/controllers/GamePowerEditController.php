<?php
class GamePowerEditController extends BaseController 
{
	public function index(){
		$poweredit = GamePower::all();
		return View::make('poweredit.index', array('poweredits' => $poweredit));
	}

	public function create(){
		return View::make('poweredit.create');
	}

	public function store(){
		$rules = array(
			'question' => 'required',
			'qA' => 'required',
			'qB' => 'required',
			'qC' => 'required',
			'qD' => 'required',
			'correctans' => 'required',
			'answer' => 'required',
			'day' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
			return Redirect::route('poweredit.create')->withErrors($validator)->withInput();
		else
		{
			$poweredit = new GamePower;
			$poweredit->question = Input::get('question');
			$poweredit->qA = Input::get('qA');
			$poweredit->qB = Input::get('qB');
			$poweredit->qC = Input::get('qC');
			$poweredit->qD = Input::get('qD');
			$poweredit->correctans = Input::get('correctans');
			$poweredit->answer = Input::get('answer');
			$poweredit->day = Input::get('day');
			$poweredit->save();
			return Redirect::route('poweredit.show', array('id' => $poweredit->id));
		}
	}

	public function show($id){
		$poweredit = GamePower::find($id);
		return View::make('poweredit.show', array('poweredit' => $poweredit));
	}

	public function edit($id){
		$poweredit = GamePower::find($id);
		return View::make('poweredit.edit', array('poweredit' => $poweredit));
	}

	public function update($id){
		$rules = array(
			'question' => 'required',
			'qA' => 'required',
			'qB' => 'required',
			'qC' => 'required',
			'qD' => 'required',
			'correctans' => 'required',
			'answer' => 'required',
			'day' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
			return Redirect::route('poweredit.edit')->withErrors($validator)->withInput();
		else
		{
			$poweredit = GamePower::find($id);
			$poweredit->question = Input::get('question');
			$poweredit->qA = Input::get('qA');
			$poweredit->qB = Input::get('qB');
			$poweredit->qC = Input::get('qC');
			$poweredit->qD = Input::get('qD');
			$poweredit->correctans = Input::get('correctans');
			$poweredit->answer = Input::get('answer');
			$poweredit->day = Input::get('day');
			$poweredit->save();
			return Redirect::route('poweredit.show', array('id' => $poweredit->id));
		}
	}

	public function destroy($id){
		GamePower::destroy($id);
		return Redirect::route('poweredit.index');
	}
}
