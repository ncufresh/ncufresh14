@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/nculife_index.css') }}
	{{ HTML::script('js/nculife/nculife_Konami.js') }}
@stop

@section('content')
	<div id="all">
		<a href="{{ route('nculife.item', array('name' => 'food')) }}">
			<div id="item1">
			</div>
		</a>
		<a href="{{ route('nculife.item', array('name' => 'live')) }}">
			<div id="item2">
			</div>
		</a>
		<a href="{{ route('nculife.item', array('name' => 'go')) }}">
			<div id="item3">
			</div>
		</a>
		<a href="{{ route('nculife.item', array('name' => 'inschool')) }}">
			<div id="item4">
			</div>
		</a>
		<a href="{{ route('nculife.item', array('name' => 'outschool')) }}">
			<div id="item5">
			</div>
		</a>
		<div id="robot">
		</div>
	</div>
@stop