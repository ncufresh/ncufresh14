@extends('layouts.layout')

@section('content')
	<div id="gameContainer">
		<div id="userInfo">
			<a id="gameShop" href="{{ route('game.shop') }}"></a>
			<a id="gameRoom" href="{{ route('game') }}"></a>
			<div id="userNameImage"></div>
			<div class="gameInfoText" id="userName">{{ $name["nick_name"] }}</div>
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
	</div>
@stop