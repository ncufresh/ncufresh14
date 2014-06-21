<?php

class APILinkController extends APIController {

	//resource
	public function index(){
		$announcements = Link::orderBy('order', 'ASC')->get();
		return Response::json($announcements->toArray());
	}

	public function create(){
		//No need! (?
		return Response::json('link.create is not allow', 403);
	}

	public function store(){

		$rules = array(
			'display_name' => 'required|max:30',
			'url' => 'required|url|max:200',
		);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Response::json($validator);
		}else{
			//success! save new item
			$link = new Link;
			$link->display_name = Input::get('display_name');
			$link->url = Input::get('url');
			$link->order = Link::count() + 1;
			$link->save();
		}
		return Response::json($link);
	}

	public function show($id){
		//No need
		return Response::json('link.show is not allow', 403);

	}

	public function edit($id){
		// No need
		return Response::json('link.edit is not allow', 403);
	}

	public function update($id){
		$link = Link::find($id);
		$rules = array(
			'display_name' => 'max:30',
			'url' => 'max:200',
			'order' => ''
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Response::json($validator);
		}else{
			//success! save change to database~~
			$link->display_name = Input::get('display_name', $link->display_name);
			$link->url = Input::get('utl', $link->url);

			// TODO Improve the efficiency
			$targetOrder = Input::get('order', $link->order);
			if($link->order > $targetOrder){
				//move other one down (target move up)
				$links = Link::where('order', '>=', $targetOrder)->where('order', '<', $link->order)->get();
				foreach($links as $small){
					$small->order = $small->order + 1;
					$small->save();
				}
			}else if($link->order < $targetOrder){
				//move other one up (target move down)
				$links = Link::where('order', '>', $link->order)->where('order', '<=', $targetOrder)->get();
				foreach($links as $small){
					$small->order = $small->order - 1;
					$small->save();
				}
			}

			$link->order = $targetOrder;
			//save edit link
			$link->save();
		}

		//make other add one~

		return Response::json($link->id);
	}

	public function destroy($id){
		Link::destroy($id);
		return Response::json('what?');
	}


}
