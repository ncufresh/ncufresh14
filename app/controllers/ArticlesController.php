<?php

class ArticlesController extends BaseController{

	public $restful = true;

	public function get_articles(){
		$articles = Forum::orderBy('created_at','desc')->paginate();
		return View::make('forum/articles')->with('articles',$articles);
	}

	public function post_articles(){
		$input = Input::all();

		Forum::create(array(
			'title' => Input::get('title'),
			'author_id' => Input::get('author_id'),
			'article_type' => Input::get('article_type'),
			'content' => Input::get('content')
		));

		return Redirect::to('articles');
	}
































}
