@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/aboutus.css') }}
	{{ HTML::script('js/aboutus.js') }}
@stop

@section('content')

<div id="content">
	<img id="page1" src="{{asset('images/aboutus/page1.png')}}">
	<img id="morecontent" src="{{asset('images/aboutus/morecontent.png')}}">
	<img id="photo" src="{{asset('images/aboutus/photo.png')}}">
	<div class="page2">
		<img id="page2" src="{{asset('images/aboutus/page2.png')}}">
		<img id="code" data-id="2" class="items" src="{{asset('images/aboutus/code.png')}}">
		<img id="draw" data-id="3" class="items" src="{{asset('images/aboutus/draw.png')}}">
		<img id="project" data-id="4" class="items" src="{{asset('images/aboutus/project.png')}}">
		<img id="operate" data-id="1" class="items" src="{{asset('images/aboutus/operate.png')}}">
		<img id="movie" data-id="7" class="items" src="{{asset('images/aboutus/movie.png')}}">
		<img id="back"  data-id="6" class="items" data-toggle="modal" data-target="#myModal" src="{{asset('images/aboutus/back.png')}}">
	</div>
</div>

	

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
    <div class="modal-body">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
	    <div class="item active" id="first">
	      <img src="{{ asset('images/SchoolGuide/map.png') }}" alt="..">
	      <div class="carousel-caption">
	        ...
	      </div>
	    </div>
	    <div class="item" id="second">
	      <img src="{{ asset('images/SchoolGuide/map.png') }}" alt="...">
	      <div class="carousel-caption">
	        ...
	      </div>
	    </div>
	    <div class="item" id="third">
	      <img src="{{ asset('images/SchoolGuide/map.png') }}" alt="...">
	      <div class="carousel-caption">
	        ...
	      </div>
	    </div>
	  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
		<ol id="scroll">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="a active"><img src="http://placehold.it/600x400&amp;text=First+Slide"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1" class="a"><img src="http://placehold.it/600x400&amp;text=Second+Slide"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2" class="a"><img src="http://placehold.it/600x400&amp;text=Third+Slide"></li>
		
		</ol>
			<div class="photointro">123</div>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


@stop