@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
@stop

@section('game_content')

	<div id="gameMenu">
		<a href="{{ route('game.snake') }}">
			<div class="gameChoose">
				<p>貪食松鼠</p>
			</div>
		</a>
		<a href="{{ route('game.campus') }}">
			<div class="gameChoose">
				<p>認識中大</p>
			</div>
		</a>
		<a href="{{ route('game.destiny') }}">
			<div class="gameChoose">
				<p>命運之輪</p>
			</div>
		</a>
		<a href="game/???">
			<div class="gameChoose">
				<p>電池補給站</p>
			</div>
		</a>
	</div>

@stop