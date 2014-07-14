@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/aboutus.css') }}
	{{HTML::script('js/aboutus.js')}}
@stop

@section('content')
<div id="content">
	<div id = "title">about us</div>
	<div id="picture"> photo</div>
	<div id="introduction">introduction</div>
	<div id="morecontent">
		<div id="operate" data-id="1" class="item">operate</div>
		<div id="code" data-id="2" class="item">code</div>
		<div id="code" data-id="3" class="item">code</div>
		<div id="draw" data-id="4" class="item">draw</div>
		<div id="project" data-id="5" class="item">project</div>
		<div id="movie" data-id="6" class="item">movie</div>
		<div id="back" data-id="7" class="item">back</div>
	</div>
</div>

<!-- modal -->	
<div class="window">
	<div class="modal"></span>
		<span class="close">
		<div class="photo"></div>
		<div class="team"></div>
		<div class="teamintro"></div>
	</div>
</div>
@stop