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
		
		<img id="operate" data-id="8" class="items" src="{{asset('images/aboutus/operate.png')}}">
		<img id="code" data-id="9" class="items" src="{{asset('images/aboutus/code.png')}}">
		<img id="draw" data-id="3" class="items" src="{{asset('images/aboutus/draw.png')}}">
		<img id="project" data-id="10" class="items" src="{{asset('images/aboutus/project.png')}}">
		<img id="movie" data-id="4" class="items" src="{{asset('images/aboutus/movie.png')}}">
		<img id="back"  data-id="11" class="items" src="{{asset('images/aboutus/back.png')}}">
		
		<img id="operate_menu" class="menu"src="{{asset('images/aboutus/operate_menu.png')}}">
		<img id="code_menu" class="menu" src="{{asset('images/aboutus/code_menu.png')}}">
		<img id="movie_menu" class="menu" src="{{asset('images/aboutus/movie_menu.png')}}">
		<img id="project_menu" class="menu" src="{{asset('images/aboutus/project_menu.png')}}">
		<img id="draw_menu" class="menu" src="{{asset('images/aboutus/draw_menu.png')}}">
		<img id="back_menu" class="menu" src="{{asset('images/aboutus/back_menu.png')}}">
		<img class="close" src="{{asset('images/aboutus/close.png')}}">
		<div class="m_intro"></div>
		<div class="m_photo"></div>
	</div>
</div>

	

<!-- Modal -->

	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
	    <div class="item active" id="first">
	      <!-- <img src="{{ asset('images/SchoolGuide/map.png') }}" alt=".."> -->
	      <img src="http://placehold.it/600x400&amp;text=Second+Slide">
	      <div class="carousel-caption">
	        ...
	      </div>
	    </div>
	    <div class="item" id="second">
	     <!--  <img src="{{ asset('images/SchoolGuide/map.png') }}" alt="..."> -->
	     <img src="http://placehold.it/600x400&amp;text=Second+Slide">
	      <div class="carousel-caption">
	        ...
	      </div>
	    </div>
	    <div class="item" id="third">
	      <!-- <img src="{{ asset('images/SchoolGuide/map.png') }}" alt="..."> -->
	      <img src="http://placehold.it/600x400&amp;text=Second+Slide">
	      <div class="carousel-caption">
	        ...
	      </div>
	    </div>
	  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <!-- <span class="glyphicon glyphicon-chevron-left" src="{{asset('images/aboutus/lbotton.png')}}"></span> -->
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
  </a>
</div>
		<ol id="scroll">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="a active"><img src="http://placehold.it/600x400&amp;text=First+Slide"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1" class="a"><img src="http://placehold.it/600x400&amp;text=Second+Slide"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2" class="a"><img src="http://placehold.it/600x400&amp;text=Third+Slide"></li>
		</ol>

@stop