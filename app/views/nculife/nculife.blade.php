@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/nculife.css') }}
@stop

@section('content')
	<div id=flipup>
		<div class=item1>
			<a href="{{ route('nculife.food') }}"><img src="{{ asset('images/nculife/food.png') }}"></a>
		</div>
		<div class=item1>
			<a href="{{ route('nculife.live') }}"><img src="{{ asset('images/nculife/live.png') }}"></a>
		</div>
		<div class=item1>
			<a href="{{ route('nculife.go') }}"><img src="{{ asset('images/nculife/go.png') }}"></a>
		</div>
	</div>
	<div id=flipdown>
			<img id=robot src="{{ asset('images/nculife/robot.png') }}">
		<div class=item2>
			<a href="{{ route('nculife.inschool') }}"><img src="{{ asset('images/nculife/inschool.png') }}"></a>
		</div>
		<div class=item2>
			<a href="{{ route('nculife.outschool') }}"><img src="{{ asset('images/nculife/outschool.png') }}"></a>
		</div>
	</div>
@stop