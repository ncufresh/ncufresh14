<html>
	<head>
	</head>
	<body>
		<p>{{"Hello World"}}</p>
		<div id="creat_article">
			{{Form::open(array('url'=>'','method'=> 'post'))}}
			{{ Form::label('title','Title') }}
			{{ Form::text('title') }} <br>
			{{ Form::label('author_id','Your ID') }}
			{{ Form::text('author_id') }} <br>
			{{ Form::label('article_type','Article Type') }}
			{{ Form::select('author_id',array('common' => 'Common' , 'club' => 'Club' , 'deparment' => 'Deparment')) }} <br>
			{{ Form::label('content','Content') }}
			{{ Form::text('content') }} <br>
			{{ Form::submit('Create') }}
			{{ Form::close() }}
		</div>
		<div id="articles"></div>		
	</body>
</html>
