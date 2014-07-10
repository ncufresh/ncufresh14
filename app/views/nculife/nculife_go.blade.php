@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/nculife_item.css') }}
@stop

@section('content')
	<div id="all">
		<div id="left">
		@foreach ($nculife as $nculife)
			<p class="place">{{$nculife->place}}</p>
		@endforeach
		</div>
		<div id="right">
			<div id="introduction">
			</div>
			<div id="picture">
			</div>
		</div>
	</div>
@stop