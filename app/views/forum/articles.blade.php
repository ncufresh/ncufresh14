@extends('../layouts/layout')
@section('js_css')
	{{ HTML::style('css/forum.css') }}
	{{ HTML::script('js/forum/forum.js') }}
	{{ HTML::script('js/forum/jquery-ui.js') }}
	{{ HTML::style('css/jquery-ui.css') }}
@stop
@section('content')
	<div>
		<input type="hidden" name="getComment" id="getComment" direct="{{URL::route('getComments')}}">
		<input type="hidden" name="createComment" id="createComment" direct="{{URL::route('createComment')}}">
		<input type="hidden" name="deleteArticle" id="deleteArticle" direct="{{URL::route('deleteArticle')}}">
		<input type="hidden" name="updateArticle" id="updateArticle" direct="{{URL::route('updateArticle')}}">
		<input type="hidden" name="newArticle" id="newArticle" direct="{{URL::route('newArticle')}}">
		<input type="hidden" id="perArticle" direct="{{URL::route('perArticle')}}">
		<input type="hidden" id="getArticles" direct="{{URL::route('getArticles')}}">
		<input type="hidden" id="initType" direct="{{$type}}">
		<input type="hidden" id="initPage" direct="{{$page}}">
		<ul class="nav nav-tabs" id="myTab">
			<li><a href="#Test1" id="articleTab">討論區</a></li>
			<li><a href="#Test2" id="departmentTab">系所</a></li>
			<li><a href="#Test3" id="clubTab">社團</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="Test1">
				<div id="toolBar">
					<div id="orderBox">
						<input type="radio" name="orderBy" value="new" id="new" checked> 最新貼文
						<input type="radio" name="orderBy" id="pop" value="pop"> 熱門貼文
					</div>
					<button class="btn btn-primary" id="createBtn"></button>
				</div>
			</div>
			<div class="tab-pane" id="Test2">
				<p>&nbsp;</p>
			</div>
			<div class="tab-pane" id="Test3">
				<p>&nbsp;</p>
			</div>
		</div>
		<div class="paginationBox">
			
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
					<div id="formTitleContainer">
						{{ Form::label('title','文章標題') }}
						{{ Form::text('title','',array(
							'class' => 'form-control' , 
							'id' => 'inputTitle' , 
							'placeholder' => 'Tittle'
						)) }}
					</div>
					<div id="formArticleTypeContainer">
					{{ Form::label('article_type','文章分類') }}
					@if(Entrust::hasRole('Developer'))
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
					@elseif(Entrust::can('forum_usage'))
						{{ Form::select(
							'article_type',
							array('P' => '一般貼文' ),
							'',
							array(
								'class' => 'form-control',
								'id' => 'selectType' ) 
						) }}
					@elseif(Entrust::can('forum_unit'))
						{{ Form::select(
							'article_type',
							array(
								'N' => '無法貼文',
							'',
							array(
								'class' => 'form-control',
								'id' => 'selectType' ) 
						) }}
					@endif
					</div>
					{{ Form::label('content','內容') }}
					{{ Form::textarea('content','',array('class' => 'form-control' , 'id' => 'inputDetail')) }} <br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					{{ Form::button('發佈',array('type' => 'button' , 'class' => 'btn btn-primary' , 'id' => 'submitArticle')) }}
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- To Show Error Message -->
	<div class="modal fade" id="errorMsgDialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">錯誤</h4>
				</div>
				<div class="modal-body" id="errorMsgContent">&nbsp;
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">確認</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- Btn for Go to Top of the page -->
	<a id="scrollTop"></a>

	<!-- To store pagination -->
	<div id='pageBox'>
		<ul class="pagination"></ul>
	</div>

	<!-- Warning : alert users that they are facing a risk -->
	<div class="modal fade" id="bonusMsgDialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body" id="bonusMsgContent">&nbsp;你確定這樣的行為是對的嗎？
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">我錯了</button>
					<button type="button" class="btn btn-primary" id="start" data-dismiss="modal">是啊</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

@stop	
