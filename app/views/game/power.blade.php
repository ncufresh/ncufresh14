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
		<div id="question" style="overflow:auto" text-align="left" ></div>
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

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div id="hcover">
		<div id="allPicU">
			<div id="p0" class="picture" data-getclick="0"></div>
			<div id="p1" class="picture" data-getclick="1"></div>
			<div id="p2" class="picture" data-getclick="2"></div>
			<div id="p3" class="picture" data-getclick="3"></div>
			<div id="p4" class="picture" data-getclick="4"></div>
		</div>
		<div id="allPicD">
			<div id="p5" class="picture" data-getclick="5"></div>
			<div id="p6" class="picture" data-getclick="6"></div>
			<div id="p7" class="picture" data-getclick="7"></div>
			<div id="p8" class="picture" data-getclick="8"></div>
			<div id="p9" class="picture" data-getclick="9"></div>
		</div>
		<div id="hstart"></div>
	</div>

	<div id="hstartGame">
		<div id="gameContent">
			<div class="r1 row">
				<div class="c0 col-sm-4 c"></div>
				<div class="c1 col-sm-4 c"></div>
				<div class="c2 col-sm-4 c"></div>
			</div>
			<div class="r2 row">
				<div class="c3 col-sm-4 c"></div>
				<div class="c4 col-sm-4 c"></div>
				<div class="c5 col-sm-4 c"></div>
			</div>
			<div class="r3 row">
				<div class="c6 col-sm-4 c"></div>
				<div class="c7 col-sm-4 c"></div>
				<div class="c8 col-sm-4 c"></div>
			</div>
		</div>
		<div id="timing"></div>
		<div id="hagain"></div>
		<div id="finish"></div>
	</div>

@stop
