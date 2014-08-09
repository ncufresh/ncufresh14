@extends('../layouts/layout')

@section('js_css')
	{{ HTML::style('css/perArticle.min.css') }}
	{{ HTML::script('js/forum/perArticle.min.js') }}
@stop

@section('content')

	<input type="hidden" id="createComment" direct="{{URL::route('createComment')}}">
	<input type="hidden" name="deleteArticle" id="deleteArticle" direct="{{URL::route('deleteArticle')}}">
	<input type="hidden" name="updateArticle" id="updateArticle" direct="{{URL::route('updateArticle')}}">
	<input type="hidden" id="articleList" direct="{{URL::route('forum')}}">
	<input type="hidden" id="articleId" articleId="{{$article->id}}">
	<input type="hidden" id="articleTitle" articleTitle="{{$article->title}}">
	<input type="hidden" id="articleType" articleType="{{$article->article_type}}">
	<input type="hidden" id="imageURL" direct="{{URL::route('imageUpload')}}">
	<input type="hidden" id="previousType" direct="{{$type}}">
	<input type="hidden" id="previousPage" direct="{{$page}}">
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
				<div class="panel-body content">{{ nl2br($article -> content) }}</div>
				<div class='btnBox'>
					@if(Auth::check() && Auth::user()->id == $article->author_id)
						<button type="button" class="btn btn-primary btn-sm edit">編輯貼文 </button>
					@endif
				</div>
			</div>
			
			@foreach($comments as $comment)
				<div class='panel panel-default'>
					<div class='commentAuthorBox'>
						<span class="commentAuthor"> {{$comment -> user ->name }}</span>
					</div>
					<div class='personImageBox'>
						<img class="personalImageComment" src="{{ route('personface', array('id' => $comment -> author_id)) }}">
					</div>
					<div class="commentContentBox">
						<span class='commentContent'> {{ nl2br($comment -> content) }}</span>
					</div>
					<div class='commentTimeBox'>
						<span class='commentTime'> {{ $comment -> created_at }}</span>
					</div>
				</div>
			@endforeach
			<div class="responseBox">
				@if(Auth::check())
					<form class="commentForm" route="createComment" >
						{{ Form::label('comment','回覆貼文') }}
						{{ Form::textarea('comment','',array(
							'class' => 'form-control commentTextArea' , 
							'id' => 'inputContent'
						)) }}
						{{ Form::submit('',array(
							'type' => 'button' , 
							'class' => 'btn btn-primary createComment'
						)) }}
					</form>
				@endif
			</div>
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






































