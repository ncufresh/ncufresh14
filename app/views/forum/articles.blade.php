@extends('../layouts/layout');

@section('content');
		<script type="text/javascript">
			$(function(){
				$("#myTab a").click(function(e){
					e.preventDefault();
					$(this).tab('show');
				});
			});
 		</script>
		<div>
			<ul class="nav nav-tabs" id="myTab">
				<li><a href="#Test1">Test1</a></li>
				<li><a href="#Test2">Test2</a></li>
				<li><a href="#Test3">Test3</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="Test1">
					<div id="creat_article">
						{{ "Test1" }}
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
					<div>
						@foreach($articles as $article)
							<div class="articles">
								<h1>{{$article->title }}</h1>
								<p>Content: {{ $article -> content }}</p>
								<p>Created Time: {{ $article -> created_at }}</p>
							</div>
						@endforeach
					</div>
					
				</div>
				<div class="tab-pane" id="Test2">
					<div id="creat_article">
						{{ "Test2" }}
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
					<div>
						@foreach($articles as $article)
							<div class="articles">
								<h1>{{$article->title }}</h1>
								<p>Content: {{ $article -> content }}</p>
								<p>Created Time: {{ $article -> created_at }}</p>
							</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane" id="Test3">
					<div id="creat_article">
						{{ "Test3" }}
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
					<div>
						@foreach($articles as $article)
							<div class="articles">
								<h1>{{$article->title }}</h1>
								<p>Content: {{ $article -> content }}</p>
								<p>Created Time: {{ $article -> created_at }}</p>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>	
@stop	
