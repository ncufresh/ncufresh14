@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
@stop

@section('game_content')

	<div id="gameMenu">
		<a href="{{ route('game.snake') }}">
			<div class="gameChoose" id="gameSnakeButton">
			</div>
		</a>
		<a href="{{ route('game.campus') }}">
			<div class="gameChoose" id="gameCampusButton">
			</div>
		</a>
		<a href="{{ route('game.destiny') }}">
			<div class="gameChoose" id="gameDestinyButton">
			</div>
		</a>
		<a href="game/power">
			<div class="gameChoose" id="gamePowerButton">
			</div>
		</a>
	</div>
	<div id="gameNoPower">
	</div>
@stop