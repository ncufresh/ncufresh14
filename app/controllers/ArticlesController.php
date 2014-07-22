<?php

class ArticlesController extends BaseController{

	public function init($item = 'forum'){
		
		$siteMap = App::make('SiteMap');
		$siteMap->pushLocation('論壇',route('forum'));
		$isLogin = Auth::check();
		if($isLogin){
			$user = Auth::user();
			$userId = $user->id;
			$userName = $user->name;
			return View::make('forum/articles',array(
				'isLogin' => true ,
				'userId' => $userId ,
				'userName' => $userName
			));
			
		}else{
			return View::make('forum/articles',array(
				'isLogin' => false
			));
		}
		
	}

	public function postArticles(){
		//login type?
		$input = Input::all();
		$articleType = Input::get('article_type');
		$rules = array(
			'title' => 'required',
			'content' => 'required'
		);
		
		$validation = Validator::make($input,$rules);

		if($validation->fails()){
			
			$response = array('status' => 'fail','msg' => 'failed', 'input'=>$input);
			
			return Response::json($response);
		}else{

			if((Entrust::can('forum_usage') && $articleType == P) || 
				(Entrust::can('forum_unit') && ($articleType == D || $articleType == C))){
				$forum = new Forum;
			
			$forum->title = Input::get('title');
			
			$forum->author_id = Auth::user()->id;
			
			$forum->article_type = $articleType		
			
			$forum->content = Input::get('content');
			
			$forum->comment_number = 0;
			
			$forum->save();
				
			$articleId = $forum->id;

			$articleTitle = $forum->title;

			$articleContent = $forum->content;

			$articleTime = $forum->created_at;

			$articleAuthor = $forum->user->name;

			$response = array(
				'articleId' => $articleId , 
				'articleTitle' => $articleTitle,
				'articleContent' => $articleContent,
				'articleTime' => $articleTime,
				'articleAuthor' => $articleAuthor
			);
	
			return Response::json($response);
			}

			

		}
	}

	public function postComment(){
			
		$content = Input::get('comment');
		$author_id = Auth::user()->id;
		$article_id = Input::get('article_id'); // Check ?
		
		$comment = new ForumComment;
		$comment->article_id = $article_id;
		$comment->author_id = $author_id;
		$comment->content = $content;
		$comment->save();

		$commentAuthor = $comment->user->name;
		$commentContent = $comment->content;
		$commentTime = $comment->created_at;

		$article = Forum::where('id','=',$article_id)->firstOrFail();
		$commentNum = $article -> comment_number;
		Forum::where('id','=',$article_id)->update(array('comment_number' => $commentNum+1)); 

		$response = array(
			'commentAuthor' => $commentAuthor,
			'commentContent' => $commentContent,
			'commentTime' => $commentTime
		);

		return Response::json($response);
	}
	public function getComment(){
		$id = Input::get('articleID');

		$comments = ForumComment::where('article_id',$id)->with('user')->paginate();

		return Response::json($comments);
	}
	
	public function getArticles(){
		
		$articleType = Input::get('articleType');

		$Articles;

		if($articleType == "new"){

			$Articles = Forum::where('article_type','P')->with('user')->orderBy('created_at','desc')->paginate();
		}

		if($articleType == "pop"){

			$Articles = Forum::where('article_type','P')->with('user')->orderBy('comment_number','desc')->paginate();
		}

		if($articleType == "department"){

			$Articles = Forum::where('article_type','D')->with('user')->orderBy('created_at','desc')->paginate();
		}

		if($articleType == "club"){

			$Articles = Forum::where('article_type','C')->with('user')->orderBy('created_at','desc')->paginate();
		}

		return Response::json($Articles);
	}

	public function deleteArticle(){
		
		$id = Input::get('id');	//whos?

		$article = Forum::find($id);

		$num = $article->comment->count();

		foreach($article->comment as $comment){

			$comment->delete();
		}

		Forum::find($id)->delete();
		$response = array(
			'status' => 'success' , 
			'msg' => 'successfully');	
		return Response::json($response);
	}

	public function updateArticle(){
		
		$id = Input::get('id');		//whos?
		$content = Input::get('content');
		
		$article = Forum::find($id);

		$article->content = $content;

		$article->save();

		$newContent = $article->content;

		$response = array('newContent' => $newContent);

		return Response::json($response);
	}

	public function viewOneArticle($id){
		$siteMap = App::make('SiteMap');
		$siteMap->pushLocation('論壇',route('forum'));
		$article = Forum::find($id);

		$comments = $article->comment;

		$articleAuthor = $article->user->name;

		return View::make('forum/perArticle',array(
			'article' => $article , 
			'comments' => $comments , 
			'author' => $articleAuthor
			)
		);
		//null
	}





















}
