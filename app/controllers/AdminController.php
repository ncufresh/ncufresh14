<?php

class AdminController extends BaseController {


	public function index(){
		App::make('SiteMap')->pushLocation('後台管理', route('dashboard'));

		return View::make('admin.index');


	}

	public function getModalId(){

		$id = Input::get('id');
		$data = AboutUs::find($id);

		return Response::json($data);
	}

	public function runGitPull(){
		$command = 'cd '.base_path();
		SSH::run(array(
			$command,
			'sudo git pull',
		), function($line)
		{
			echo $line.PHP_EOL;
		});

		//return Redirect::route('dashboard')->with('alert-message', 'Done run git pull on '.base_path());
	}

	public function secretReplace(){
		$forums = Forum::all();
		foreach($forums as $forum){
			$forum->content = str_replace('http://ncufreshlocal.weigreen.com/', 'http://ncufresh.ncu.edu.tw/', $forum->content);
			$forum->save();
		}
		$schoolGuides = Schoolguide::all();

		foreach($schoolGuides as $schoolGuide){
			$schoolGuide->introduction = str_replace('http://ncufresh14.weigreen.com/', 'http://ncufresh.ncu.edu.tw/', $schoolGuide->introduction);
			$schoolGuide->save();
		}
	}
}
