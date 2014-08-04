@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::script('js/game/game.js') }}
	{{ HTML::script('js/game/campus.js') }}
@stop

@section('game_content')
	<div id="gameCampusContainer">	
		<div id="gameCampusInfo">
			<div id="gameCampusInfoExit"></div>
		</div>

		<div id="gameCampusMain">
			<a href="{{ route('SchoolGuide') }}"><div id="gameCampusMapButton"></div></a>
			<div id="gameCampusStartButton" action="{{ URL::to('game/campus/start') }}"></div>
			<div id="gameCampusInfoButton"></div>
		</div>

		<div id="gameCampusMap">
			<div id="gameCampusGameBox" action="{{ URL::to('game/campus/check') }}">
				<div id="gameCampusMapBack"></div>
				<div id="gameCampusLifeBox">
					<div class="gameCampusLife"></div>
					<div class="gameCampusLife"></div>
					<div class="gameCampusLife"></div>
				</div>
				<div class="gameCampusType" id="gameCampusType0"><!--系館-->
					<div class="gameCampusBuilding" id="science-5" index="0"></div>
					<div class="gameCampusBuilding" id="literary" index="1"></div>
					<div class="gameCampusBuilding" id="engineer-1" index="2"></div>
					<div class="gameCampusBuilding" id="engineer-2" index="3"></div>
					<div class="gameCampusBuilding" id="engineer-3" index="4"></div>
					<div class="gameCampusBuilding" id="engineer-4" index="5"></div>
					<div class="gameCampusBuilding" id="engineer-5" index="6"></div>
					<div class="gameCampusBuilding" id="science-4" index="7"></div>
					<div class="gameCampusBuilding" id="science-3" index="8"></div>
					<div class="gameCampusBuilding" id="science-2" index="9"></div>
					<div class="gameCampusBuilding" id="science-1" index="10"></div>
					<div class="gameCampusBuilding" id="math" index="11"></div>
					<div class="gameCampusBuilding" id="management-1" index="12"></div>
					<div class="gameCampusBuilding" id="management-2" index="13"></div>
					<div class="gameCampusBuilding" id="Hakkas" index="14"></div>
					<div class="gameCampusBuilding" id="electric" index="15"></div>
				</div>
				<div class="gameCampusType" id="gameCampusType1"><!--行政-->
					<div class="gameCampusBuilding" id="Zhidao" index="0"></div>
					<div class="gameCampusBuilding" id="art" index="1"></div>
					<div class="gameCampusBuilding" id="building" index="2"></div>
					<div class="gameCampusBuilding" id="schoolh" index="3"></div>
					<div class="gameCampusBuilding" id="administration" index="4"></div>
					<div class="gameCampusBuilding" id="library" index="5"></div>
					<div class="gameCampusBuilding" id="oldlibrary" index="6"></div>
					<div class="gameCampusBuilding" id="blackbox" index="7"></div>
					<div class="gameCampusBuilding" id="mbuilding" index="8"></div>
					<div class="gameCampusBuilding" id="clibrary" index="9"></div>
					<div class="gameCampusBuilding" id="outerspace" index="10"></div>
					<div class="gameCampusBuilding" id="ncu" index="11"></div>
				</div>
				<div class="gameCampusType" id="gameCampusType2"><!--中大十景-->
					<div class="gameCampusBuilding" id="G14-ground" index="0"></div>
					<div class="gameCampusBuilding" id="door" index="1"></div>
					<div class="gameCampusBuilding" id="monument" index="2"></div>
					<div class="gameCampusBuilding" id="tree" index="3"></div>
					<div class="gameCampusBuilding" id="tai" index="4"></div>
					<div class="gameCampusBuilding" id="park" index="5"></div>
					<div class="gameCampusBuilding" id="lake" index="6"></div>
					<div class="gameCampusBuilding" id="flower" index="7"></div>
					<!--add-->
					<div class="gameCampusBuilding" id="pool" index="8"></div>
				</div>
				<div class="gameCampusType" id="gameCampusType3"><!--運動-->
					<div class="gameCampusBuilding" id="gym" index="0"></div>
					<div class="gameCampusBuilding" id="basketball" index="1"></div>
					<div class="gameCampusBuilding" id="playground" index="2"></div>
					<div class="gameCampusBuilding" id="rock" index="3"></div>
					<div class="gameCampusBuilding" id="swimpool" index="4"></div>
					<div class="gameCampusBuilding" id="skate" index="5"></div>
					<div class="gameCampusBuilding" id="valley" index="6"></div>
					<div class="gameCampusBuilding" id="badminton" index="7"></div>
					<!--add-->
					<div class="gameCampusBuilding" id="tennis" index="8" ></div>
				</div>
				<div class="gameCampusType" id="gameCampusType4"><!--飲食-->
					<div class="gameCampusBuilding" id="wood" index="0"></div>
					<!--addd-->
					<div class="gameCampusBuilding" id="B7-food" index="1"></div>
					<div class="gameCampusBuilding" id="park-food" index="2"></div>
					<div class="gameCampusBuilding" id="Graduate-food" index="3"></div>
					<div class="gameCampusBuilding" id="B9-food" index="4"></div>
				</div>
				<div class="gameCampusType" id="gameCampusType5"><!--住宿-->
					<div class="gameCampusBuilding" id="B11" index="0"></div>
					<div class="gameCampusBuilding" id="B7" index="1"></div>
					<div class="gameCampusBuilding" id="B6" index="2"></div>
					<div class="gameCampusBuilding" id="B13" index="3"></div>
					<div class="gameCampusBuilding" id="B5" index="4">></div>
					<div class="gameCampusBuilding" id="International" index="5"></div>
					<div class="gameCampusBuilding" id="B3" index="6"></div>
					<div class="gameCampusBuilding" id="G14" index="7"></div>
					<div class="gameCampusBuilding" id="G-1-4" index="8"></div>
					<div class="gameCampusBuilding" id="B9" index="9"></div>
					<div class="gameCampusBuilding" id="B12" index="10"></div>
					<div class="gameCampusBuilding" id="Graduate" index="11"></div>
					<!--add-->
					<div class="gameCampusBuilding" id="G5" index="12"></div>
				</div>
				<div id="gameCampusQuestion"></div>
			</div>
		</div>

		<div id="gameCampusEnd">
			<div id="gameCampusScore">0</div>
			<div id="gameCampusAgain"></div>
		</div>
@stop