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
		<div id="operate" data-id="1" class="item" data-target="#myModal" data-toggle="modal">operate</div>
		<div id="code" data-id="2" class="item" data-target="#myModal" data-toggle="modal">code</div>
		<div id="code" data-id="3" class="item" data-target="#myModal" data-toggle="modal">code</div>
		<div id="draw" data-id="4" class="item" data-target="#myModal" data-toggle="modal">draw</div>
		<div id="project" data-id="5" class="item" data-target="#myModal" data-toggle="modal">project</div>
		<div id="movie" data-id="6" class="item" data-target="#myModal" data-toggle="modal">movie</div>
		<div id="back" data-id="7" class="item" data-target="#myback" data-toggle="modal">back</div>
	</div>
</div>

<!-- modal -->	
<!-- <div class="window">
	<div class="modal"></span>
		<span class="close">
		<div class="photo"></div>
		<div class="team"></div>
		<div class="teamintro"></div>
	</div>
</div> -->

<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
    123
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 -->


@stop