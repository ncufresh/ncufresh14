@extends('../layouts/layout')

@section('js_css')
	{{ HTML::style('css/perArticle.css') }}
	{{ HTML::script('js/forum/perArticle.js') }}
@stop

@section('content')

	@if(Auth::check())
		<input type="hidden" id="isLogin" login="1">
	@else
		<input type="hidden" id="isLogin" login="0">
	@endif
	<input type="hidden" id="createComment" direct="{{URL::route('createComment')}}">
	<input type="hidden" name="deleteArticle" id="deleteArticle" direct="{{URL::route('deleteArticle')}}">
	<input type="hidden" name="updateArticle" id="updateArticle" direct="{{URL::route('updateArticle')}}">
	<input type="hidden" id="articleList" direct="{{URL::route('forum')}}">
	<input type="hidden" id="articleId" articleId="{{$article->id}}">
	<input type="hidden" id="articleTitle" articleTitle="{{$article->title}}">
	<div class="fullArticleBox">
		<div class="postTimeContainer">
			<div class="articlePostTime">
				<span class="author">{{ $author }}</span>
				發布於 
				{{ $article -> created_at }} 
			</div>
		</div>
		<div class="articleContainer" id="{{ $article -> id }}" >
			<div class="panel panel-default articleBody">
				<div class="panel-heading">
					<h3 class="panel-title"> {{ $article -> title }} </h3>
				</div>
				<div class="personalImageBox" >
					<img class="personalImage" src="{{ route('personface', array('id' => $article -> author_id)) }}">
				</div>
				<div class="panel-body">{{ $article -> content }}</div>
				<div class='btnBox'><button type="button" class="btn btn-primary btn-sm edit">編輯貼文 </button></div>
			</div>
			<div class="responseBox">
				@if(Auth::check())
					<form class="commentForm" route="createComment" >
						{{ Form::label('comment','回覆貼文') }}
						{{ Form::submit('發表回覆',array(
							'type' => 'button' , 
							'class' => 'btn btn-primary createComment'
						)) }}
						{{ Form::textarea('comment','',array(
							'class' => 'form-control commentTextArea' , 
							'id' => 'inputContent'
						)) }}
					</form>
				@endif
			</div>
			@foreach($comments as $comment)
				<div class='panel panel-default'>
					<span class="commentAuthorId"> {{$comment -> user ->name }}</span><br>
					<img class="personalImage" src="{{ route('personface', array('id' => $comment -> author_id)) }}">
					<span class='commentContent'> {{ $comment -> content }}</span><br>
					<span class='commentTime'> {{ $comment -> created_at }}</span>
				</div>
			@endforeach
		</div>
	</div>

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






































