@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/nculife_index.css') }}
	{{ HTML::script('js/nculife/nculife_index.js') }}
@stop

@section('content')
	<div id="all">
		<div id="item1">
			<a href="{{ route('nculife.item', array('name' => 'food')) }}"><img id="food" src="{{ asset('images/nculife/food.png') }}" class="picture"></a>
		</div>
		<div id="item2">
			<a href="{{ route('nculife.item', array('name' => 'live')) }}"><img id="live" src="{{ asset('images/nculife/live.png') }}" class="picture"></a>
		</div>
		<div id="item3">
			<a href="{{ route('nculife.item', array('name' => 'go')) }}"><img id="go" src="{{ asset('images/nculife/go.png') }}" class="picture"></a>
		</div>
		<div id="item4">
			<a href="{{ route('nculife.item', array('name' => 'inschool')) }}"><img id="inschool" src="{{ asset('images/nculife/inschool.png') }}" class="picture"></a>
		</div>
		<div id="item5">
			<a href="{{ route('nculife.item', array('name' => 'outschool')) }}"><img id="outschool" src="{{ asset('images/nculife/outschool.png') }}" class="picture"></a>
		</div>
		<img id="robot" src="{{ asset('images/nculife/robot.png') }}" class="picture">
	</div>
@stop