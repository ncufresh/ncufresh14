@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::style('css/game/snake.css') }}
	{{ HTML::script('js/game/snake.js') }}
@stop

@section('game_content')
	<div id="cover">
		<div class="choice" align="center">
			<div class="Difficult">
				<div id="difficulty1"> <img src="..\\images\\gameSnake\\d1.png"> </div>
				<div id="difficulty2"> <img src="..\\images\\gameSnake\\d2.png"> </div>
				<div id="difficulty3"> <img src="..\\images\\gameSnake\\d3.png"> </div>
			</div>
			<div class="Mode">
				<div id="mode1"> <img src="..\\images\\gameSnake\\m1.png"> </div>
				<div id="mode2"> <img src="..\\images\\gameSnake\\m2.png"> </div>	
				<div id="mode3"> <img src="..\\images\\gameSnake\\m3.png"> </div>
			</div>
		</div>
		<div id="start">
			<img src="..\\images\\gameSnake\\start.png">
		</div>
	</div>

	<div id="content">
		<div id="snakeContent">
			<div id="snakehead">
				<img src="..\images\gameSnake\head.png" width="30px" height="23px">
			</div>
		</div>
	</div>

	<div id="endScreen">
		<div id="squirrel"> <img src="..\\images\\gameSnake\\squirrel.png"></div>
		 <font size="20"><div id="score"></div></font>
		<div id="again"> <img src="..\\images\\gameSnake\\again.png"> </div>

	</div>


@stop