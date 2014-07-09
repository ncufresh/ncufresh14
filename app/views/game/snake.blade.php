@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/gameSnake.css') }}
	{{ HTML::script('js/game/gameSnake.js') }}
@stop

@section('content')
	<div id="snakeContent">
		<div id="snakehead">
			<img src="..\images\head.jpg" width="27px" height="23px">
		</div>
	</div>

	<!--
	<table border="1">
		<tr>
			<td>
					dsds
			</td>
			<td>
					a
			</td>
		</tr>
		<tr>
			<td>
				dsd
			</td>
			<td>
					a
			</td>
		</tr>
	</table>
	-->
@stop