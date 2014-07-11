<?php

class ArticlesController extends BaseController{

	public $restful = true;

	public function getArticles(){
		$articles = Forum::orderBy('created_at','desc')->paginate();
		//$postArticles = DB::table('forum_articles')->where('article_type','P');
		$postArticles = Forum::where('article_type','P')->paginate();
		$clubArticles = Forum::where('article_type','C')->paginate();
		$departmentArticles = Forum::where('article_type','D')->paginate();
		//return View::make('forum/articles')->with('articles',$articles);
		return View::make('forum/articles',array(
			'articles' => $articles , 
			'postArticles' => $postArticles ,
			'clubArticles' => $clubArticles ,
			'departmentArticles' => $departmentArticles
		));
	}

	public function postArticles(){
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
