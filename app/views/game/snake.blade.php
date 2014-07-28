@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::style('css/game/spin.css') }}
	{{ HTML::style('css/game/snake.css') }}
	{{ HTML::script('js/game/game.js') }}
	{{ HTML::script('js/game/spin.js') }}
	{{ HTML::script('js/game/snake.js') }}
@stop

@section('game_content')
	<div id="cover">
		<div class="choice" align="center">
			<div class="Difficult">
				<div class="difficulty1"></div>
				<div class="difficulty2"></div>
				<div class="difficulty3"></div>
				<div id="start"></div>
			</div>
			<div class="Mode">
				<div class="mode1"></div>
				<div class="mode2"></div>	
				<div class="mode3"></div>
				<div class="intro"></div>	
			</div>
			<div id="introduction"></div>
		</div>
	</div>
	
	<div id="content">
		<table id="snakeContent"></table>
		<div id="space"></id></div>
	</div>


	<div id="endScreen">
		<font size="20"><div id="score"></div></font>
		<div id="again"></div>
		<div id="rankButton"></div>
	</div>

	<div id="rankBack">
		<div id="cross"></div>
		<div class="spin" data-spin="spin"></div>
		<div class="rankMode">
			<div class="rM1"></div>
			<div class="rM2"></div>
			<div class="rM3"></div>
		</div>
		<div id="ranking" style="overflow-y:scroll;overflow-x:hidden;"></div>
	</div>

@stop