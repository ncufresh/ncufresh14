@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/schoolguide.css') }}
	{{HTML::script('js/schoolguide.js')}}
@stop

@section('content')

<div id="container" class="container">
	<div id="contentContainer" class="testR">
	<div id="content" style="height:700px; width:98% ;background-color:#FFF000; margin:10px;">

		{{Form::text('categories',array('class'=>'categories'))}}

		{{Form::text('name',array('class'=>'name'))}}

		{{Form::textarea('introduction',array('class'=>'introduction','rows'=>'5','cols'=>'100'))}}
	
		<button class="sure">確認</button>
	</div>
	</div>

	</div>
@stop