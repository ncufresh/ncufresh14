@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::style('css/game/power.css') }}
	{{ HTML::script('js/game/power.js') }}
@stop

@section('game_content')
	<div id="start">
		<div id="question"></div>
		<div class="base" id="qa"></div>
		<div class="base" id="qb"></div>
		<div class="base" id="qc"></div>
		<div class="base" id="qd"></div>
		<div id="correctAns"></div>
	</div>
@stop
