@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::script('js/game/destiny.js') }}
@stop

@section('game_content')
	<div id="gameDestiny_left">
		<div id="rotate_table">

		</div>
		<div id="rotate_foot">

		</div>
	</div>
	<div id="gameDestiny_right">
		<div id="startPage">
			<div>命運之輪</div>
			<div>遊戲需求:能量一格</div>
			<div id="destinyStart" action="{{ URL::to('game/destiny/start') }}">開始</div>
		</div>
		<div id="bounsPage">
			<div>恭喜你獲得</div>
			<div>item</div>
		</div>
	</div>
@stop

