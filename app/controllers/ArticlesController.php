<?php

class ArticlesController extends BaseController{

	public $restful = true;


	public function getArticles($item = 'forum'){
		
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

	public function getDepartmentArticles(){
		$departmentArticles = Forum::where('article_type','D')->orderBy('created_at','desc')->paginate();
		return Response::json($departmentArticles);
	}

	public function getClubArticles(){
		$departmentArticles = Forum::where('article_type','C')->orderBy('created_at','desc')->paginate();
		return Response::json($departmentArticles);
	}

	public function postArticles(){
		$input = Input::all();
		$rules = array(
			'title' => 'required',
			'content' => 'required'
		);
		
		$validation = Validator::make($input,$rules);

		if($validation->fails()){
			$response = array('status' => 'fail','msg' => 'failed', 'input'=>$input);
			
			return Response::json($response);
		}else{
			Forum::create(array(
				'title' => Input::get('title'),
				'author_id' => Input::get('id'),
				'article_type' => Input::get('article_type'),
				'content' => Input::get('content'),
				'comment_number' => 0
			));

			$articleId = Forum::where('author_id',Input::get('id'))->orderBy('created_at','desc')->firstOrFail()->id;	

			$response = array('status' => 'success','msg' => 'successfully','articleId' => $articleId);
	
			return Response::json($response);

		}
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

		$article = Forum::where('id','=',$article_id)->firstOrFail();
		$commentNum = $article -> comment_number;
		//dd($article);
		Forum::where('id','=',$article_id)->update(array('comment_number' => $commentNum+1)); 

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

	public function viewOneArticle($id){
		$siteMap = App::make('SiteMap');
		$siteMap->pushLocation('論壇',route('forum'));
		$article = Forum::find($id);

		$comments = $article->comment;

		return View::make('forum/perArticle',array('article'=>$article,'comments' => $comments));

	}





















}
