@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::style('css/game/snake.css') }}
	{{ HTML::script('js/game/snake.js') }}
@stop

@section('game_content')
	<div id="cover">
		<div class="title">
			<img src="..\\images\\gameSnake\\title.jpg">
		</div>
		<div class="choice" align="center">
			<div class="Difficult">
				<div id="difficulty1"> <img src="..\\images\\gameSnake\\d1.jpg"> </div>
				<div id="difficulty2"> <img src="..\\images\\gameSnake\\d2.jpg"> </div>
				<div id="difficulty3"> <img src="..\\images\\gameSnake\\d3.jpg"> </div>
			</div>
			<div class="Mode">
				<div id="mode1"> <img src="..\\images\\gameSnake\\m1.jpg"> </div>
				<div id="mode2"> <img src="..\\images\\gameSnake\\m2.jpg"> </div>	
				<div id="mode3"> <img src="..\\images\\gameSnake\\m3.jpg"> </div>
			</div>
		</div>
		<div id="start">
			<img src="..\\images\\gameSnake\\start.jpg">
		</div>
	</div>

	<div id="content">
		<div id="snakeContent">
			<div id="snakehead">
				<img src="..\images\gameSnake\head.jpg" width="30px" height="23px">
			</div>
		</div>
	</div>

	<div id="endScreen">
		<div id="squirrel"> <img src="..\\images\\gameSnake\\squirrel.jpg"></div>
		 <font size="20"><div id="score"></div></font>
		<div id="again"> <img src="..\\images\\gameSnake\\again.jpg"> </div>

	</div>


@stop