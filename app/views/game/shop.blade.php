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
			<div id="characterEquipButton" action="{{ URL::to('game/shop/equip') }}"></div>
			<div id="characterReturnButton"></div>
		</div>
		<div id="gameShopBox">
			<div id="gameShopBar">
				<div class="gameShopTypeButton" id="gameShopTypeHead" action="{{ URL::to('game/shop/type') }}"></div>
				<div class="gameShopTypeButton" id="gameShopTypeFace" action="{{ URL::to('game/shop/type') }}"></div>
				<div class="gameShopTypeButton" id="gameShopTypeBody" action="{{ URL::to('game/shop/type') }}"></div>
				<div class="gameShopTypeButton" id="gameShopTypeFoot" action="{{ URL::to('game/shop/type') }}"></div>
				<div class="gameShopTypeButton" id="gameShopTypeItem" action="{{ URL::to('game/shop/type') }}"></div>
				<div class="gameShopTypeButton" id="gameShopTypeMap" action="{{ URL::to('game/shop/type') }}"></div>
			</div>
			<div id="gameShopItems" action="{{ URL::to('game/shop/buy') }}">
				@foreach( $shop as $item )
					<div class="gameShopItem">
						<img class="gameShopItemImage" src="{{asset("images/gameShop/" . $item["small_picture"] )}}" look="{{asset("images/gameShop/" . $item["picture"] )}}" itemId="{{$item["id"]}}"/>
						<div class="gameShopItemText">{{$item["name"] . " " . $item["costgp"]}}</div>
						<?php
							for ( $index = 0; $index < count($hadBuyItems); $index++ ) {
								if ( $hadBuyItems[$index]["item_id"] == $item["id"] ) {
						?>
									<div class="gameShopItemBuyButton itemHadBuy" item="{{$item["id"]}}"></div>
						<?php
								}
								else {
						?>
									<div class="gameShopItemBuyButton" item="{{$item["id"]}}"></div>
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

