@extends('../layouts/layout')

@section('js_css')
	{{ HTML::style('css/perArticle.css') }}
	{{ HTML::script('js/forum/perArticle.js') }}
@stop

@section('content')
	<input type="hidden" id="createComment" direct="{{URL::route('createComment')}}">
	<input type="hidden" name="deleteArticle" id="deleteArticle" direct="{{URL::route('deleteArticle')}}">
	<input type="hidden" name="updateArticle" id="updateArticle" direct="{{URL::route('updateArticle')}}">
	<input type="hidden" id="articleId" articleId="{{$article->id}}">
	<input type="hidden" id="articleTitle" articleTitle="{{$article->title}}">
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
				<div class='btnBox'><button type="button" class="btn btn-primary btn-sm edit">編輯貼文 </button></div>
			</div>
			<div class="responseBox">
				<form class="commentForm" route="createComment" >
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
			@foreach($comments as $comment)
				<div class='panel panel-default'>
					<span class="commentAuthorId"> {{$comment -> author_id }}</span><br>
					<span class='commentContent'> {{ $comment -> content }}</span><br>
					<span class='commentTime'> {{ $comment -> created_at }}</span>
				</div>
			@endforeach
		</div>
	</div>	
@stop






































