(function($)
{
    ajaxPost();
    $(document).ready(function()
    {
    	var disply_type = 0;
    	$('.gameShopTypeButton').each(function(index) {
    		$(this).click(function() {
    			ajaxPost($(this).attr('action'), {type: index}, function(data) {
    				disply_type = index;
    				$('#gameShopItems .jspPane').empty();
    				for ( var i = 0; i < data["shop"].length; i++ ) {
                        var buyClass = '';
                        if ( data["hadBuyItems"][i] == true ) {
                            buyClass = 'itemHadBuy';
                        }
                        var equipClass = '';
                        for ( var j = 0; j < 6; j++ ) {

                            if ( Equip_items[j]['id'] == data["shop"][i]["id"] )
                                equipClass = 'gameShopItemSelect';
                        }
    					$('<div class="gameShopItem ' + equipClass + '">' + 
							'<img class="gameShopItemImage" src="' + bURL + 'images/gameShop/' + data["shop"][i]["picture"] + '" itemId="' + data["shop"][i]["id"] + '" />' +
							'<div class="gameShopItemText">' + data["shop"][i]["costgp"] + '</div>' + 
							'<div class="gameShopItemBuyButton ' + buyClass + '" item="' + data["shop"][i]["id"] + '"></div>' +
						'</div>').appendTo($('#gameShopItems .jspPane'));
    				}
                    $('#gameShopItems').jScrollPane();
                    ItemImageClick();
    				buyClick();
    			});
    		})
    	});
    	function buyItem(id, button) {
    		ajaxPost($('#gameShopItems').attr('action'), {itemId: id}, function(data) {
                if( data['hadbuy'] == 0 ) {
                    if ( data['isBuy'] ) {
                        button.addClass('itemHadBuy');
                        editStatus(data['user']['power'], data['user']['gp']);
                        $.alertMessage('購買成功!', {type: 'alert-danger'});
                    }
                    else {
                        $.alertMessage('你GP不夠喔！', {type: 'alert-danger'});
                    }
                }
			});
    	};
        function ItemImageClick() {
            $('.gameShopItemImage').each(function(index) {
                $(this).click(function() {
                    user_look[disply_type].attr('src', $(this).attr('src'));
                    user_look[disply_type].attr('itemId', $(this).attr('itemId'));
                    $('.gameShopItem').each(function(index) {
                        $(this).removeClass('gameShopItemSelect');
                    });
                    $(this).parent().addClass('gameShopItemSelect');
                    if ( disply_type == 0 ) {
                        user_look[1].css({
                            top: disply_item_data[user_look[0].attr('itemId')-1]['face_middle_y']/2 - 35 + 'px',
                            left: disply_item_data[user_look[0].attr('itemId')-1]['face_middle_x']/2 + 17 + 'px'
                        });
                    }
                    for ( var j = 4; j < 6; j++ ) {
                        if ( user_look[j].attr('itemId') == 0 ) {
                            user_look[j].hide();
                        }
                        else {
                            user_look[j].show();
                        }
                    }
                });
                
            });
        }
        function buyClick() {
            $('.gameShopItemBuyButton').each(function(index) {
                $(this).click(function() {
                    buyItem($(this).attr('item'), $(this));
                });
            });
        }
    	
        var user_look = new Array(6);
        var types = ['head', 'face', 'body', 'foot', 'item', 'map'];
        var init_equip =[];
        $('.character').each(function(index) {
            user_look[index] = $(this);
            init_equip[types[index]] = [ user_look[index].attr('itemId'), user_look[index].attr('src') ];
        });
        for ( var j = 4; j < 6; j++ ) {
            if ( Equip_items[j]['id'] == 0 )
                user_look[j].hide();
        }

        $('#characterEquipButton').click(function() {
            var user_want = new Array(6);
            for ( var i = 0; i < 6; i++ ) {
                user_want[i] = user_look[i].attr('itemId');
            }
            ajaxPost($(this).attr('action'), {user_want: user_want}, function(data) {
                //console.log(data);
                for ( var i = 0; i < 6; i++ ) {
                    if ( !data['isBuy'][i] ) {
                        var words = ['頭盔', '表情', '身體', '下肢', '道具', '地圖碎片'];
                        $.alertMessage('你還沒買' + words[i] + '喔~', {type: 'alert-danger'});
                    }
                }
            });
        });
        $('#characterReturnButton').click(function() {
            for ( var i = 0; i < 6; i++ ) {
                user_look[i].attr('itemId', init_equip[types[i]][0] );
                user_look[i].attr('src', init_equip[types[i]][1] );
            }
            user_look[1].css({
                top: disply_item_data[user_look[0].attr('itemId')-1]['face_middle_y']/2 - 35 + 'px',
                left: disply_item_data[user_look[0].attr('itemId')-1]['face_middle_x']/2 + 17 + 'px'
            });
            $('.gameShopItem').each(function(index) {
                $(this).removeClass('gameShopItemSelect');
            });
        });

        $('#gameShopItems').jScrollPane();
        ItemImageClick();
        buyClick();
    });
})(jQuery);