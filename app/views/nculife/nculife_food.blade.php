@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/nculife_item.css') }}
	{{ HTML::script('js/nculife/nculife.js') }}
@stop

@section('content')
	<div id="all">
		<div id="left">
			<?php $num=0 ?>
		@foreach ($nculife as $anculife)
			<p class="place" num="{{$num++}}">{{$anculife->place}}</p>
		@endforeach
		</div>
		<div id="right">
			<div id="introduction">
				{{$nculife[0]->introduction}}
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