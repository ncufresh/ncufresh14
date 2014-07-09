@extends('../layouts/layout');

@section('content');
		<div id="creat_article">
			{{ Form::open(array('url'=>'new','method'=> 'post'))}}
			{{ Form::label('title','Title') }}
			{{ Form::text('title') }} <br>
			{{ Form::label('author_id','Your ID') }}
			{{ Form::text('author_id') }} <br>
			{{ Form::label('article_type','Article Type') }}
			{{ Form::select('article_type',array('common' => 'Common' , 'club' => 'Club' , 'deparment' => 'Deparment')) }} <br>
			{{ Form::label('content','Content') }}
			{{ Form::text('content') }} <br>
			{{ Form::submit('Create') }}
			{{ Form::close() }}
		</div>
		<div >
			@foreach($articles as $article)
				<div class="articles">
					<h1>{{$article->title }}</h1>
					<p>Content: {{ $article -> content }}</p>
					<p>Created Time: {{ $article -> created_at }}</p>
				</div>
			@endforeach
		</div>	
@stop	
