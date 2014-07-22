@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::script('js/game/game.js') }}
	{{ HTML::script('js/game/campus.js') }}
@stop

@section('game_content')
	<div id="gameCampusContainer">	
		<div id="gameCampusInfo">我是說明!
			<div id="gameCampusInfoExit"></div>
		</div>

		<div id="gameCampusMain">
			<a href="{{ route('SchoolGuide') }}"><div id="gameCampusMapButton"></div></a>
			<div id="gameCampusStartButton" action="{{ URL::to('game/campus/start') }}"></div>
			<div id="gameCampusInfoButton"></div>
		</div>

		<div id="gameCampusMap">
			<div id="gameCampusGameBox" action="{{ URL::to('game/campus/check') }}">
				<img id="gameCampusMapBack" src="{{ asset('images/SchoolGuide/Buttom.png') }}">
				<div class="gameCampusType" id="gameCampusType0">系館
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0"><img src="{{ asset('images/SchoolGuide/science-5.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 50px;left: 0px;" index="1"><img src="{{ asset('images/SchoolGuide/literary.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/engineer-1.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="3"><img src="{{ asset('images/SchoolGuide/engineer-2.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="4"><img src="{{ asset('images/SchoolGuide/engineer-3.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="5"><img src="{{ asset('images/SchoolGuide/engineer-4.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="6"><img src="{{ asset('images/SchoolGuide/engineer-5.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="7"><img src="{{ asset('images/SchoolGuide/science-4.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="8"><img src="{{ asset('images/SchoolGuide/science-3.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="9"><img src="{{ asset('images/SchoolGuide/science-2.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="10"><img src="{{ asset('images/SchoolGuide/science-1.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="11"><img src="{{ asset('images/SchoolGuide/math.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="12"><img src="{{ asset('images/SchoolGuide/management-1.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="13"><img src="{{ asset('images/SchoolGuide/management-2.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="14"><img src="{{ asset('images/SchoolGuide/Hakkas.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="15"><img src="{{ asset('images/SchoolGuide/electric.png') }}"></div>
				</div>
				<div class="gameCampusType" id="gameCampusType1">行政
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0"><img src="{{ asset('images/SchoolGuide/Zhidao.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 50px;left: 0px;" index="1"><img src="{{ asset('images/SchoolGuide/art.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/schoolh.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="3"><img src="{{ asset('images/SchoolGuide/administration.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="4"><img src="{{ asset('images/SchoolGuide/library.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="5"><img src="{{ asset('images/SchoolGuide/oldlibrary.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="6"><img src="{{ asset('images/SchoolGuide/blackbox.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="7"><img src="{{ asset('images/SchoolGuide/mbuilding.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="8"><img src="{{ asset('images/SchoolGuide/clibrary.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="9"><img src="{{ asset('images/SchoolGuide/outerspace.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="10"><img src="{{ asset('images/SchoolGuide/ncu.png') }}"></div>
				</div>
				<div class="gameCampusType" id="gameCampusType2">中大十景
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0"><img src="{{ asset('images/SchoolGuide/G14-ground.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 50px;left: 0px;" index="1"><img src="{{ asset('images/SchoolGuide/door.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/monument.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/tree.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/tai.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/park.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/lake.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/flower.png') }}"></div>
				</div>
				<div class="gameCampusType" id="gameCampusType3">運動
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0"><img src="{{ asset('images/SchoolGuide/gym.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 50px;left: 0px;" index="1"><img src="{{ asset('images/SchoolGuide/basketball.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/playground.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/rock.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/swimpool.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/skate.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/valley.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img src="{{ asset('images/SchoolGuide/badminton.png') }}"></div>
				</div>
				<div class="gameCampusType" id="gameCampusType4">飲食
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0"><img src="{{ asset('images/SchoolGuide/wood.png') }}"></div>
				</div>
				<div class="gameCampusType" id="gameCampusType5">住宿
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0"><img  src="{{ asset('images/SchoolGuide/G14.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 50px;left: 0px;" index="1"><img  src="{{ asset('images/SchoolGuide/B11.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img  src="{{ asset('images/SchoolGuide/B7.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img  src="{{ asset('images/SchoolGuide/B6.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img  src="{{ asset('images/SchoolGuide/B13.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img  src="{{ asset('images/SchoolGuide/B5.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img  src="{{ asset('images/SchoolGuide/International.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img  src="{{ asset('images/SchoolGuide/B3.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img  src="{{ asset('images/SchoolGuide/G-1-4.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img  src="{{ asset('images/SchoolGuide/Graduate.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img  src="{{ asset('images/SchoolGuide/B9.png') }}"></div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2"><img  src="{{ asset('images/SchoolGuide/B12.png') }}"></div>
				</div>
				<div id="gameCampusQuestion"></div>
			</div>
		</div>

		<div id="gameCampusEnd">
			<div id="gameCampusScore">0</div>
			<div id="gameCampusAgain"></div>
		</div>
@stop