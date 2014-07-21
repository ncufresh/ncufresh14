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
				<div id="difficulty1"> <img src="..\\images\\gameSnake\\d1.png"> </div>
				<div id="difficulty2"> <img src="..\\images\\gameSnake\\d2.png"> </div>
				<div id="difficulty3"> <img src="..\\images\\gameSnake\\d3.png"> </div>
				<div id="start"></div>
			</div>
			<div class="Mode">
				<div id="mode1"> <img src="..\\images\\gameSnake\\m1.png"> </div>
				<div id="mode2"> <img src="..\\images\\gameSnake\\m2.png"> </div>	
				<div id="mode3"> <img src="..\\images\\gameSnake\\m3.png"> </div>
				<div id="intro"></div>	
			</div>
			<div id="introduction"></div>
		</div>
	</div>
	
	<div id="content">
		<div id="snakeContent"></div>
		<div id="space"></id></div>
	</div>


	<div id="endScreen">
		<font size="20"><div id="score"></div></font>
		<div id="again"><img src="..\\images\\gameSnake\\again.png"></div>
		<div id="rankButton"><img src="..\\images\\gameSnake\\rank.png"></div>
	</div>

	<div id="rankBack">
		<div id="cross"><img src="..\\images\\gameSnake\\cross.png"></div>
		<div class="spin" data-spin="spin"></div>
		<div class="rankMode row">
			<div class="rM1 col-sm-4"></div>
			<div class="rM2 col-sm-4"></div>
			<div class="rM3 col-sm-4"></div>
		</div>
		<div id="ranking" style="overflow-y:scroll;overflow-x:hidden;"></div>
	</div>

@stop