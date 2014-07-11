@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::script('js/game/shop.js') }}
	<script>
		var Burl = {{ json_encode(asset('')) }};
		var disply_item_data = {{ json_encode($shop) }};
	</script>
@stop

@section('game_content')
	<div id="gameShopContainer">
		<div id="characterLook">
			<img class="character" id="characterHead" alt="head"/>
			<img class="character" id="characterFace" alt="face"/>
			<img class="character" id="characterBody" alt="body"/>
			<img class="character" id="characterFoot" alt="foot"/>
			<img class="character" id="characterItem" alt="item"/>
			<img class="character" id="characterMap" alt="map"/>
			<div id="characterEquipButton">Equip</div>
			<div id="characterReturnButton">Return</div>
		</div>
		<div id="gameShopBox">
			<div id="gameShopBar">
				<div class="gameShopTypeButton" action="{{ URL::to('game/shop/type') }}">頭部</div>
				<div class="gameShopTypeButton" action="{{ URL::to('game/shop/type') }}">表情</div>
				<div class="gameShopTypeButton" action="{{ URL::to('game/shop/type') }}">身體</div>
				<div class="gameShopTypeButton" action="{{ URL::to('game/shop/type') }}">下體</div>
				<div class="gameShopTypeButton" action="{{ URL::to('game/shop/type') }}">道具</div>
				<div class="gameShopTypeButton" action="{{ URL::to('game/shop/type') }}">地圖</div>
			</div>
			<div id="gameShopItems" action="{{ URL::to('game/shop/buy') }}">
				@foreach( $shop as $item )
					<div class="gameShopItem">
						<img class="gameShopItemImage" src="{{asset("images/gameShop/" . $item["small_picture"] )}}" look="{{asset("images/gameShop/" . $item["picture"] )}}">
						<div class="gameShopItemText">{{$item["id"] . " " . $item["name"]}}</div>
						<?php
							for ( $index = 0; $index < count($hadBuyItems); $index++ ) {
								if ( $hadBuyItems[$index]["item_id"] == $item["id"] ) {
						?>
									<div class="gameShopItemBuyButton" id="itemHadBuy" item="{{$item["id"]}}">{{$item["costgp"]}} BUY</div>
						<?php
								}
								else {
						?>
									<div class="gameShopItemBuyButton" item="{{$item["id"]}}">{{$item["costgp"]}} BUY</div>
						<?php
								}
							}
						?>				
					</div>
				@endforeach
			</div>
		</div>
	</div>
@stop

