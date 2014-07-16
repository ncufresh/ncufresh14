<?php

class ArticlesController extends BaseController{

	public $restful = true;

	public function getArticles(){

		$articles = Forum::orderBy('created_at','desc')->paginate();
		$postArticles = Forum::where('article_type','P')->orderBy('created_at','desc')->paginate();
		$clubArticles = Forum::where('article_type','C')->orderBy('created_at','desc')->paginate();
		$departmentArticles = Forum::where('article_type','D')->orderBy('created_at','desc')->paginate();
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

	public function postComment(){
			
		$comment = Input::get('comment');
		$author_id = Input::get('author_id');
		$article_id = Input::get('article_id');

		ForumComment::create(array(
			'article_id' => $article_id,
			'author_id' => $author_id,
			'content' => $comment
		));

		$article = Forum::where('id',$article_id)->firstOrFail();
		$commentNum = $article -> comment_number;

		Forum::where('id',$article_id)->update(array('comment_number' => $commentNum+1));

		$response = array(
			'status' => 'success',
			'msg' => 'successfully'
		);

		return Response::json($response);
	}
	public function getComment(){
		$id = Input::get('articleID');

		$comments = ForumComment::where('article_id',$id)->paginate();

		return Response::json($comments);
	}
	public function newArticles(){
		
		$postArticles = Forum::where('article_type','P')->orderBy('created_at','desc')->paginate();
		
		return Response::json($postArticles);
	}
	public function popArticles(){
		
		$postArticles = Forum::where('article_type','P')->orderBy('comment_number','desc')->paginate();

		return Response::json($postArticles);
	}
	public function deleteArticle(){
		
		$id = Input::get('id');

		$comments = Forum::find($id);
		$num = $comments->comment->count();
		if($num > 0 || true){
			//Forum::find($id)->comment->delete();
			foreach($comments->comment as $comment){
				$comment->delete();
			}
		}
		Forum::find($id)->delete();
		$response = array(
			'status' => 'success' , 
			'msg' => 'successfully');	
		return Response::json($response);
	}

	public function updateArticle(){
		
		$id = Input::get('id');
		$content = Input::get('content');
		

		$article = Forum::find($id);

		$article->content = $content;

		$article->save();
		$response = array(
			'status' => 'success',
			'msg' => 'successfully');

		return Response::json($response);
	}























}
