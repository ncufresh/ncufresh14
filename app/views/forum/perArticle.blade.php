@extends('../layouts/layout')

@section('js_css')
	{{ HTML::style('css/forum.css') }}
@stop

@section('content')
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
		</div>
	</div>
@stop






































