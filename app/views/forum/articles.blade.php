@extends('../layouts/layout')
@section('js_css')
	{{ HTML::style('css/forum.css') }}
	{{ HTML::script('js/forum/forum.js') }}
@stop
@section('content')
	<div>
	@if($isLogin==1)
		<input type="hidden" id="loginStatus" value="1">
		<input type="hidden" id="userId" value="{{$userId}}">
		<input type="hidden" id="userName" value="{{$userName}}">
	@else
		<input type="hidden" id="loginStatus" value="0">
	@endif
	</div>
	<div>
		<input type="hidden" name="orderPop" id="orderPopHidden" direct="{{URL::route('orderPop')}}">
		<input type="hidden" name="orderNew" id="orderNewHidden" direct="{{URL::route('orderNew')}}">
		<input type="hidden" id="getDepartment" direct="{{URL::route('getDepartmentArticle')}}">
		<input type="hidden" id="getClub" direct="{{URL::route('getClubArticle')}}">
		<input type="hidden" name="getComment" id="getComment" direct="{{URL::route('getComments')}}">
		<input type="hidden" name="createComment" id="createComment" direct="{{URL::route('createComment')}}">
		<input type="hidden" name="deleteArticle" id="deleteArticle" direct="{{URL::route('deleteArticle')}}">
		<input type="hidden" name="updateArticle" id="updateArticle" direct="{{URL::route('updateArticle')}}">
		<input type="hidden" name="newArticle" id="newArticle" direct="{{URL::route('newArticle')}}">
		<input type="hidden" id="perArticle" direct="{{URL::route('perArticle')}}">
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
					<button class="btn btn-primary" id="createBtn">發表新文章</button>
				</div>
			</div>
			<div class="tab-pane" id="Test2">
				<div id="departmentIndex">index</div>
			</div>
			<div class="tab-pane" id="Test3">
				<div id="clubIndex">index</div>
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
					{{ Form::textarea('content','',array('class' => 'form-control' , 'id' => 'inputDetail')) }} <br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					{{ Form::button('發佈',array('type' => 'button' , 'class' => 'btn btn-primary' , 'id' => 'submitArticle')) }}
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
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
	
@stop	
