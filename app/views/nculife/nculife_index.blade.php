@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/nculife_index.css') }}
@stop

@section('content')
	<div id="all">
		<div id="item1">
			<a href="{{ route('nculife.item', array('name' => 'food')) }}"><img src="{{ asset('images/nculife/food.png') }}" class="picture"></a>
		</div>
		<div id="item2">
			<a href="{{ route('nculife.item', array('name' => 'live')) }}"><img src="{{ asset('images/nculife/live.png') }}" class="picture"></a>
		</div>
		<div id="item3">
			<a href="{{ route('nculife.item', array('name' => 'go')) }}"><img src="{{ asset('images/nculife/go.png') }}" class="picture"></a>
		</div>
		<div id="item4">
			<a href="{{ route('nculife.item', array('name' => 'inschool')) }}"><img src="{{ asset('images/nculife/inschool.png') }}" class="picture"></a>
		</div>
		<div id="item5">
			<a href="{{ route('nculife.item', array('name' => 'outschool')) }}"><img src="{{ asset('images/nculife/outschool.png') }}" class="picture"></a>
		</div>
		<img id="robot" src="{{ asset('images/nculife/robot.png') }}" class="picture">
	</div>
@stop