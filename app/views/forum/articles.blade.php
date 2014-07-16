@extends('../layouts/layout');
@section('js_css')
	{{ HTML::style('css/forum.css') }}
	{{ HTML::script('js/forum/forum.js') }}
@stop
@section('content')
		<div>
			<input type="hidden" name="orderPop" id="orderPopHidden" direct="{{URL::to('/orderPop')}}">
			<input type="hidden" name="getComment" id="getComment" direct="{{URL::to('getComments')}}">
			<input type="hidden" name="createComment" id="createComment" direct="{{URL::to('/create')}}">
			<input type="hidden" name="deleteArticle" id="deleteArticle" direct="{{URL::to('/deleteArticle')}}">
			<input type="hidden" name="updateArticle" id="updateArticle" direct="{{URL::to('/updateArticle')}}">
			<ul class="nav nav-tabs" id="myTab">
				<li><a href="#Test1">討論區</a></li>
				<li><a href="#Test2">系所</a></li>
				<li><a href="#Test3">社團</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="Test1">
					<div id="toolBar">
						<div id="orderBox">
							<input type="radio" name="orderBy" value="new" id="new" direct="{{URL::to('/orderNew')}}" checked> 最新貼文
							<input type="radio" name="orderBy" id="pop" value="pop"> 熱門貼文
						</div>
						<button class="btn btn-primary" id="createBtn">發表新文章</button>
					</div>
				</div>
				<div class="tab-pane" id="Test2">
					<div>
						@foreach($departmentArticles as $article)
							<div class="fullArticleBox">
								<div class="postTimeContainer">
									<div class="articlePostTime">
										<span class="author">{{ $article -> author_id }}</span>
										 posted at 
										{{ $article -> created_at }} 
									</div>
								</div>
								<div class="articleContainer" id="{{ $article -> id }}" >
									<div class="panel panel-default articleBody">
										<div class="panel-heading">
											<h3 class="panel-title"> {{ $article -> title }} </h3>
										</div>
										<div class="panel-body">
											{{ $article -> content }}
										</div>
										<a class="moreBox">
											<div class="moreBtn" id="{{$article -> id}}" direct="{{URL::to('/getComments')}}">
												<div class="panel panel-default arrow">&dArr;</div>
											</div>
										</a>
									</div>
									<div class="responseContainer">
										<form class="commentForm" route="createComment" direct="{{URL::to('/create')}}">
										{{ Form::label('comment','回覆貼文') }}
										{{ Form::submit('發表回覆',array(
											'type' => 'button' , 
											'class' => 'btn btn-primary createComment'
										)) }}
										{{ Form::text('commenterID','',array(
											'class' => 'form-control commenterID' , 
											'placeholder' => 'Your ID' ,
											'id' => 'commenterID'
										)) }}
										{{ Form::hidden('articleID','',array('id' => $article-> id , 'class' => 'articleID')) }}
										{{ Form::textarea('comment','',array(
											'class' => 'form-control commentTextArea' , 
											'id' => 'inputContent'
										)) }}
										</form>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane" id="Test3">
					<div>
						@foreach($clubArticles as $article)
							<div class="fullArticleBox">
								<div class="postTimeContainer">
									<div class="articlePostTime">
										<span class="author">{{ $article -> author_id }}</span>
										 posted at 
										{{ $article -> created_at }} 
									</div>
								</div>
								<div class="articleContainer" id="{{ $article -> id }}" >
									<div class="panel panel-default articleBody">
										<div class="panel-heading">
											<h3 class="panel-title"> {{ $article -> title }} </h3>
										</div>
										<div class="panel-body">{{ $article -> content }}</div>
										<div class='btnBox'><button type="button" class="btn btn-primary btn-sm edit">編輯貼文</button></div>
										<a class="moreBox">
											<div class="moreBtn" id="{{$article -> id}}" direct="{{URL::to('/getComments')}}">
												<div class="panel panel-default arrow">&dArr;</div>
											</div>
										</a>
									</div>
									<div class="responseContainer">
										<form class="commentForm" route="createComment" direct="{{URL::to('/create')}}">
										{{ Form::label('comment','回覆貼文') }}
										{{ Form::submit('發表回覆',array(
											'type' => 'button' , 
											'class' => 'btn btn-primary createComment'
										)) }}
										{{ Form::text('commenterID','',array(
											'class' => 'form-control commenterID' , 
											'placeholder' => 'Your ID' ,
											'id' => 'commenterID'
										)) }}
										{{ Form::hidden('articleID','',array('id' => $article-> id , 'class' => 'articleID')) }}
										{{ Form::textarea('comment','',array(
											'class' => 'form-control commentTextArea' , 
											'id' => 'inputContent'
										)) }}
										</form>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				
			</div>
		</div>
		
		<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">發表新文章</h4>
					</div>
					<div class="modal-body" id="createForm">
						{{ Form::open(array('url'=>'new','method'=> 'post'))}}
						<div id="formTitleContainer">
							{{ Form::label('title','文章標題') }}
							{{ Form::text('title','',array(
								'class' => 'form-control' , 
								'id' => 'inputTitle' , 
								'placeholder' => 'Tittle'
							)) }}
						</div>
						<div id="formAuthorIDContainer">
							{{ Form::label('author_id','使用者ID') }}
							{{ Form::text('author_id','',array(
								'class' => 'form-control' , 
								'id' => 'inputAuthor_id' , 
								'placeholder' => 'Your ID'
							)) }}
						</div>
						<div id="formArticleTypeContainer">
						{{ Form::label('article_type','文章分類') }}
						{{ Form::select(
							'article_type',
							array(
								'P' => '一般貼文' , 
								'C' => '社團' , 
								'D' => '系所'),
							'',
							array(
								'class' => 'form-control',
								'id' => 'selectType' ) 
						) }}
						</div>
						{{ Form::label('content','內容') }}
						{{ Form::textarea('content','',array('class' => 'form-control' , 'id' => 'inputContent')) }} <br>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						{{ Form::submit('發佈',array('type' => 'button' , 'class' => 'btn btn-primary' )) }}
						{{ Form::close() }}
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	
@stop	
