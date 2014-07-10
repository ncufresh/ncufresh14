@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::script('js/game/campus.js') }}
@stop

@section('game_content')
	<div id="gameCampusContainer">	
		<div id="gameCampusMain">
			<div id="gameCampusStartButton" action="{{ URL::to('game/campus/start') }}">開始</div>
			<div id="gameCampusInfoButton">遊戲說明</div>
		</div>

		<div id="gameCampusMap">背景地圖
			<div class="gameCampusType" id="gameCampusType0">TYPE
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
			</div>
			<div class="gameCampusType" id="gameCampusType1">TYPE
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
			</div>
			<div class="gameCampusType" id="gameCampusType2">TYPE
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
			</div>
			<div class="gameCampusType" id="gameCampusType3">TYPE
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
			</div>
			<div class="gameCampusType" id="gameCampusType4">TYPE
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
			</div>
			<div class="gameCampusType" id="gameCampusType5">TYPE
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
				<div class="gameCampusBuilding" style="top: 0px;left: 0px;">building</div>
			</div>
			<div id="gameCampusQuestion"></div>
		</div>
@stop