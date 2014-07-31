<?php

class ArticlesController extends BaseController{

	public function init($type = 'new', $page = 1){
		
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

				'userName' => $userName ,

				'type' => $type ,

				'page' => $page
			));
			
		}else{

			return View::make('forum/articles',array(

				'isLogin' => false
			));
		}
		
	}

	public function postArticles(){

		$input = Input::all();

		$articleType = Input::get('article_type');

		$rules = array(
			'title' => 'required',
			'content' => 'required'
		);

		if($this->isWashing("article")){

			$response = array('washing' => true );

			return Response::json($response);
		}
		
		$validation = Validator::make($input,$rules);

		if($validation->fails()){
			
			$response = array('status' => 'fail','msg' => 'failed', 'input'=>$input);
			
			return Response::json($response);

		}else if(Auth::check()){
			
			if((Entrust::can('forum_usage') && $articleType == "P") || (Entrust::can('forum_unit') && ($articleType == "D" || $articleType == "C")) || (Entrust::hasRole('Developer'))){
				
				$forum = new Forum;

				$forum->title = htmlspecialchars(Input::get('title'));

				$forum->author_id = Auth::user()->id;

				$forum->article_type = $articleType;
				if(Entrust::hasRole('Developer')){

					$forum->content = Input::get('content');
				}else{

					$forum->content = htmlspecialchars(Input::get('content'));
				}

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
					'articleAuthor' => $articleAuthor,
					'authorId' => Auth::user()->id
				);
				return Response::json($response);
			}
		}
	}

	public function postComment(){
			
		$content = Input::get('comment');

		$author_id = Auth::user()->id;

		$article_id = Input::get('article_id');

		$rule = array('comment' => 'required');

		if($this->isWashing("comment")){

			$response = array('washing' => true );

			return Response::json($response);
		}

		$validation = Validator::make(Input::all(),$rule);
		
		if(Auth::check() && $validation -> passes()){

			$comment = new ForumComment;

			$comment->article_id = $article_id;

			$comment->author_id = $author_id;

			$comment->content = htmlspecialchars($content);

			$comment->save();

			$commentAuthor = $comment->user->name;

			$authorId = $comment->author_id;

			$commentContent = $comment->content;

			$commentTime = $comment->created_at;

			$article = Forum::where('id','=',$article_id)->firstOrFail();

			$commentNum = $article -> comment_number;

			Forum::where('id','=',$article_id)->update(array('comment_number' => $commentNum+1)); 

			$response = array(
				'commentAuthor' => $commentAuthor,
				'authorId' => $authorId,
				'commentContent' => nl2br($commentContent),
				'commentTime' => $commentTime
			);

			return Response::json($response);

		}
		
	}
	public function getComment(){

		$id = Input::get('articleID');

		$comments = ForumComment::where('article_id',$id)->with('user')->paginate();

		return Response::json($comments);
	}
	
	public function getArticles(){
		
		$articleType = Input::get('articleType');

		$Articles;

		switch ($articleType) {

			case 'new':
				$Articles = Forum::where('article_type','P')->with('user')->orderBy('created_at','desc')->paginate(5);
				break;
			case 'pop':
				$Articles = Forum::where('article_type','P')->with('user')->orderBy('comment_number','desc')->paginate(5);
				break;
			case 'department':
				$Articles = Forum::where('article_type','D')->with('user')->orderBy('created_at')->paginate(5);
				break;
			case 'club':
				$Articles = Forum::where('article_type','C')->with('user')->orderBy('created_at')->paginate(5);
				break;
		}

		return Response::json($Articles);
	}

	public function deleteArticle(){
		
		$id = Input::get('id');	//whos?

		$article = Forum::find($id);

		if(Auth::check() && $article->author_id == Auth::user()->id){

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

		
	}

	public function updateArticle(){
		
		$id = Input::get('id');	

		$content = Input::get('content');

		//$content = str_replace("<br>", "&#10;", $content); 
		
		$article = Forum::find($id);

		$rules = array(

			'content' => 'required'
		);

		$validation = Validator::make(Input::all(),$rules);

		if(Auth::check() && $article->author_id == Auth::user()->id && $validation->passes()){
			
			if(Entrust::hasRole('Developer') || Entrust::can('forum_unit')){

				$article->content = $content;

			}else{

				$article->content = htmlspecialchars($content);
			}
			
			$article->save();

			$newContent = nl2br($article->content);

			$response = array('newContent' => $newContent);

			return Response::json($response);
		}
	}

	public function viewOneArticle($id,$type = "N",$page = "N"){
		
		$siteMap = App::make('SiteMap');

		$siteMap->pushLocation('論壇',route('forum'));

		$article = Forum::find($id);

		$comments = $article->comment;

		$articleAuthor = $article->user->name;
		if($page == ""  && $type == null){
			return View::make('forum/perArticle',array(
				'article' => $article , 
				'comments' => $comments , 
				'author' => $articleAuthor
				)
			);
		}else{
			return View::make('forum/perArticle',array(
				'article' => $article , 
				'comments' => $comments , 
				'author' => $articleAuthor,
				'type' => $type,
				'page' => $page
				)
			);
		}
		
		//null
	}

	//prevent user push to much Input in a short period
	public function isWashing($inputType){

		session_start();

		if($inputType == "article"){


			if(isset($_SESSION['lastArticleTime']) && !empty($_SESSION['lastArticleTime'])){


				
				$currentTime = new DateTime();

				$currentTime = $currentTime->format('Y-m-d H:i:s');

				$pastTime = $_SESSION['lastArticleTime'];

				$totalInterval = round(abs(strtotime($pastTime) - strtotime($currentTime)));

				if($totalInterval < 1){
					
					return true;

				}else{
					$_SESSION['lastArticleTime'] = $currentTime;

					return false;
				}

			}else{

				$currentTime = new DateTime();

				$currentTime = $currentTime->format('Y-m-d H:i:s');

				$_SESSION['lastArticleTime'] = $currentTime;

				return false;
			}

		}else if($inputType == "comment"){

			if(isset($_SESSION['lastCommentTime']) && !empty($_SESSION['lastCommentTime'])){

				$currentTime = new DateTime();

				$currentTime = $currentTime->format('Y-m-d H:i:s');

				$pastTime = $_SESSION['lastCommentTime'];

				$totalInterval = round(abs(strtotime($pastTime) - strtotime($currentTime)));

				if($totalInterval < 5){

					return true;

				}else{

					$_SESSION['lastCommentTime'] = $currentTime;

					return false;
				}


			}else{

				$currentTime = new DateTime();

				$currentTime = $currentTime->format('Y-m-d H:i:s');

				$_SESSION['lastCommentTime'] = $currentTime;

				return false;
			}
		}
	}




}
