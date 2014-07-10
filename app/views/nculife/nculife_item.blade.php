@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/nculife_item.css') }}
	{{ HTML::script('js/nculife/nculife.js') }}
@stop

@section('content')
	<div id="all">
		<div id="left">
		@foreach ($nculifes as $nculife)
			<p class="place" data-num="{{$nculife->id}}">{{$nculife->place}}</p>
		@endforeach
		</div>
		<div id="right">
			<div id="introduction">
				{{$nculifes[0]->introduction}}
			</div>
			<div id="picture">
			</div>
			<div id="select">
				<div id="left_buttom">
				</div>
				<div id="right_buttom">
				</div>
			</div>
		</div>
	</div>
@stop