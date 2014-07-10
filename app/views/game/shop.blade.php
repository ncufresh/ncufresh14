@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::script('js/game/shop.js') }}
@stop

@section('game_content')
	<div id="gameShopContainer">
		<div id="characterLook">
			<div class="character" id="characterHead">head</div>
			<div class="character" id="characterFace">face</div>
			<div class="character" id="characterBody">body</div>
			<div class="character" id="characterFoot">foot</div>
			<div class="character" id="characterItem">item</div>
			<div class="character" id="characterMap">map</div>
			<div id="characterEquipButton">Equip</div>
			<div id="characterReturnButton">Return</div>
		</div>
		<div id="gameShopBox">
			<div id="gameShopBar">
				<div class="gameShopTypeButton"></div>
				<div class="gameShopTypeButton"></div>
				<div class="gameShopTypeButton"></div>
				<div class="gameShopTypeButton"></div>
				<div class="gameShopTypeButton"></div>
				<div class="gameShopTypeButton"></div>
			</div>
			<div id="gameShopItems">
				<div class="gameShopItem"></div>
				<div class="gameShopItem"></div>
				<div class="gameShopItem"></div>
				<div class="gameShopItem"></div>
				<div class="gameShopItem"></div>
				<div class="gameShopItem"></div>
				<div class="gameShopItem"></div>
				<div class="gameShopItem"></div>
			</div>
		</div>
	</div>
@stop

