@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::script('js/game/destiny.js') }}
@stop

@section('game_content')
	<div id="gameDestiny_left">
	</div>
	<div id="gameDestiny_right">
	</div>
@stop