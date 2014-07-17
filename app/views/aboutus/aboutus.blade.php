@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/aboutus.css') }}
	{{ HTML::script('js/aboutus.js') }}
@stop

@section('content')

<div id="content">
	<div id = "title">about us</div>
	<div id="picture"> photo</div>
	<div id="introduction">introduction</div>
	<div id="morecontent">
		<div id="operate" data-id="1" class="items">operate</div>
		<div id="code" data-id="2" class="items">code</div>
		<div id="draw" data-id="3" class="items">draw</div>
		<div id="project" data-id="4" class="items">project</div>
		<div id="movie" data-id="5" class="items">movie</div>
		<div id="back" data-id="6" class="items"  data-toggle="modal" data-target="#myModal">back</div>
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

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	    <div class="item active">
	      <img src="{{ asset('images/SchoolGuide/map.png') }}" alt="..">
	      <div class="carousel-caption">
	        ...
	      </div>
	    </div>
	    <div class="item">
	      <img src="{{ asset('images/SchoolGuide/map.png') }}" alt="...">
	      <div class="carousel-caption">
	        ...
	      </div>
	    </div>
	    <div class="item">
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

	<!-- vertical -->
	<div class="container">
    
    <div class="row-fluid">
      <div class="span6 offset3">
        <div id="myCarousel" class="carousel slide vertical">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item">
                    <img src="http://placehold.it/600x400&amp;text=First+Slide">
                </div>
                <div class="item">
                    <img src="http://placehold.it/600x400&amp;text=Second+Slide">
                </div>
                <div class="item">
                    <img src="http://placehold.it/600x400&amp;text=Third+Slide">
                </div>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
        </div>
    </div>
</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





</div>
@stop