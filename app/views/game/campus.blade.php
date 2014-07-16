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
				<div class="gameCampusType" id="gameCampusType0">TYPE
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0">building</div>
					<div class="gameCampusBuilding" style="top: 50px;left: 0px;" index="1">building</div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2">building</div>
					<div class="gameCampusBuilding" style="top: 150px;left: 0px;" index="3">building</div>
				</div>
				<div class="gameCampusType" id="gameCampusType1">TYPE
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0">building</div>
					<div class="gameCampusBuilding" style="top: 50px;left: 0px;" index="1">building</div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2">building</div>
				</div>
				<div class="gameCampusType" id="gameCampusType2">TYPE
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0">building</div>
					<div class="gameCampusBuilding" style="top: 50px;left: 0px;" index="1">building</div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2">building</div>
				</div>
				<div class="gameCampusType" id="gameCampusType3">TYPE
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0">building</div>
					<div class="gameCampusBuilding" style="top: 50px;left: 0px;" index="1">building</div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2">building</div>
				</div>
				<div class="gameCampusType" id="gameCampusType4">TYPE
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0">building</div>
					<div class="gameCampusBuilding" style="top: 50px;left: 0px;" index="1">building</div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2">building</div>
				</div>
				<div class="gameCampusType" id="gameCampusType5">TYPE
					<div class="gameCampusBuilding" style="top: 0px;left: 0px;" index="0">building</div>
					<div class="gameCampusBuilding" style="top: 50px;left: 0px;" index="1">building</div>
					<div class="gameCampusBuilding" style="top: 100px;left: 0px;" index="2">building</div>
				</div>
				<div id="gameCampusQuestion"></div>
			</div>
		</div>

		<div id="gameCampusEnd">
			<div id="gameCampusScore">0</div>
			<div id="gameCampusAgain"></div>
		</div>
@stop