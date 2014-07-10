@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::style('css/gameSnake.css') }}
	{{ HTML::script('js/game/gameSnake.js') }}
@stop

@section('game_content')
	<div id="cover" data-role="fieldcontain">
		<div class="choice" align="center">


				<div id="difficulty1"> Difficulty1 </div>
				<div id="mode1"> Mode1 </div>

				<div id="difficulty2"> Difficulty2 </div>
				<div id="mode2"> Mode2 </div>

				<div id="difficulty3"> Difficulty3 </div>
				<div id="mode3"> Mode3 </div>
		</div>

		<div id="start"> Start </div>

	</div>

	<div id="content">
		<div id="snakeContent">
			<div id="snakehead">
				<img src="..\images\gameSnake\head.jpg" width="24px" height="23px">
			</div>
		</div>
	</div>

@stop