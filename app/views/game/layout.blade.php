@extends('layouts.layout')

@section('content')
	<div id="gameContainer">
		<div id="userInfo">
			<a id="gameShop" href="{{ route('game.shop') }}">
				<div>
					<p>SHOP</p>
				</div>
			</a>
			<a id="gameRoom" href="{{ route('game') }}">
				<div>
					<p>GAMERROOM</p>
				</div>
			</a>
			<div class="gameInfoText">使用者: {{ $name["nick_name"] }}</div>
			<div class="gameInfoText">電量: {{ $user["power"] }}</div>
			<div class="gameInfoText">GP: {{ $user["gp"] }}</div>
		</div>
		<div id="gameMain">
			@yield('game_content')
		</div>
	</div>
@stop