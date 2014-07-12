@extends('game.layout')

@section('js_css')
	{{ HTML::style('css/game.css') }}
	{{ HTML::script('js/game/shop.js') }}
	<script>
		var bURL = {{ json_encode(asset('')) }};
		var disply_item_data = {{ json_encode($shop) }};
	</script>
@stop

@section('game_content')
	<div id="gameShopContainer">
		<div id="characterLook">
			<img class="character" src="{{asset("images/gameShop/" . $EquipItem[0]["picture"] )}}" id="characterHead" alt="head" itemId="{{$EquipItem[0]["id"]}}"/>
			<img class="character" src="{{asset("images/gameShop/" . $EquipItem[1]["picture"] )}}" id="characterFace" alt="face" itemId="{{$EquipItem[1]["id"]}}"/>
			<img class="character" src="{{asset("images/gameShop/" . $EquipItem[2]["picture"] )}}" id="characterBody" alt="body" itemId="{{$EquipItem[2]["id"]}}"/>
			<img class="character" src="{{asset("images/gameShop/" . $EquipItem[3]["picture"] )}}" id="characterFoot" alt="foot" itemId="{{$EquipItem[3]["id"]}}"/>
			<img class="character" src="{{asset("images/gameShop/" . $EquipItem[4]["picture"] )}}" id="characterItem" alt="item" itemId="{{$EquipItem[4]["id"]}}"/>
			<img class="character" src="{{asset("images/gameShop/" . $EquipItem[5]["picture"] )}}" id="characterMap"  alt="map"  itemId="{{$EquipItem[5]["id"]}}"/>
			<div id="characterEquipButton" action="{{ URL::to('game/shop/equip') }}">Equip</div>
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
						<img class="gameShopItemImage" src="{{asset("images/gameShop/" . $item["small_picture"] )}}" look="{{asset("images/gameShop/" . $item["picture"] )}}" itemId="{{$item["id"]}}"/>
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

