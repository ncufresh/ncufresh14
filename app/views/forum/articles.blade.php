@extends('../layouts/layout');
@section('js_css')
	{{ HTML::style('css/forum.css') }}
@stop
@section('content')
		<script type="text/javascript">
			$(function(){
				$("#myTab a").click(function(e){
					e.preventDefault();
					$(this).tab('show');
				});
				$("#createBtn").click(function(){
					$('#myModal').modal('toggle')
				});
			});
 		</script>
		<div>
			<ul class="nav nav-tabs" id="myTab">
				<li><a href="#Test1">討論區</a></li>
				<li><a href="#Test2">系所</a></li>
				<li><a href="#Test3">社團</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="Test1">
					<div id="toolBar">
						<div id="orderBox">
							{{ Form::radio('orderBy','New',true) }} 最新貼文
							{{ Form::radio('orderBy','Pop') }} 熱門貼文
						</div>
						<button class="btn btn-primary" id="createBtn">發表新文章</button>
					</div>
					<div>
						@foreach($articles as $article)
							<div class="postTimeContainer">
								<div class="articlePostTime">
									<span class="author">{{ $article -> author_id }}</span>
									 posted at 
									{{ $article -> created_at }} 
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"> {{ $article -> title }} </h3>
								</div>
								<div class="panel-body">
									{{ $article -> content }}
									<div class="articleType">{{ $article -> article_type }} </div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane" id="Test2">
					<div>
						@foreach($articles as $article)
							<div class="postTimeContainer">
								<div class="articlePostTime">
									<span class="author">{{ $article -> author_id }}</span>
									 posted at 
									{{ $article -> created_at }} 
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"> {{ $article -> title }} </h3>
								</div>
								<div class="panel-body">
									{{ $article -> content }}
									<div class="articleType">{{ $article -> article_type }} </div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane" id="Test3">
					<div>
						@foreach($articles as $article)
							<div class="postTimeContainer">
								<div class="articlePostTime">
									<span class="author">{{ $article -> author_id }}</span>
									 posted at 
									{{ $article -> created_at }} 
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"> {{ $article -> title }} </h3>
								</div>
								<div class="panel-body">
									{{ $article -> content }}
									<div class="articleType">{{ $article -> article_type }} </div>
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