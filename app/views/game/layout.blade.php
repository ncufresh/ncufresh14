@extends('layouts.layout')

@section('content')
	<div id="gameContainer">
		<div id="userInfo">
			<a id="gameShop" href="{{ route('game.shop') }}"></a>
			<a id="gameRoom" href="{{ route('game') }}"></a>
			<div id="userNameImage"></div>
			<div class="gameInfoText" id="userName">{{ $name }}</div>
			<div id="userPowerImage"></div>
			<div class="gameInfoText" id="userPower" > 
				<div id="powerBox" style="background: url('{{asset("images/gameIndex/power/" . $user["power"] . ".png")}}') no-repeat;">
				</div>
			</div>
			<div id="userGpImage"></div>
			<div class="gameInfoText" id="userGP" >{{ $user["gp"] }}</div>
		</div>
		<div id="gameMain">
			@yield('game_content')
		</div>
		<div id="gmaeNoPowerContainer">
			<div id="gameNoPowerBox">
				<div class="gameNoPowerText">你的電池耗盡囉!</div>
				<div class="gameNoPowerText">該去電池補給站充電囉~</div>
				<div class="gameNoPowerButton" id="gameNoPowerIKnow">我知道了</div>
				<a href="{{ route('game.power') }}"><div class="gameNoPowerButton" id="gameNoPowerGoPower">去補給站</div></a>
				<div id="gameNoPowerExit"></div>
			</div>
		</div>
	</div>
@stop