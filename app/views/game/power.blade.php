@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::style('css/game/power.css') }}
	{{ HTML::script('js/game/game.js') }}
	{{ HTML::script('js/game/power.js') }}
@stop

@section('game_content')
	<div id="cover" align="center">
		<div id="start"></div>
		<div id="intro"></div>
		<div id="introduction"></div>
	</div>

	<div id="startGame">
		<div id="question" text-align="left" ></div>
		<div class="base" id="qa" data-getclick="1" data-option="(A)"></div>
		<div class="base" id="qb" data-getclick="2" data-option="(B)"></div>
		<div class="base" id="qc" data-getclick="3" data-option="(C)"></div>
		<div class="base" id="qd" data-getclick="4" data-option="(D)"></div>
		<div id="correctAns"></div>
		<div id="next"></div>
	</div>

	<div id="endScreen">
		<div id="getPower"></div>
		<div id="power"></div>
		<div id="again"></div>
	</div>

@stop
