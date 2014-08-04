(function($)
{
    $(document).ready(function()
    {
    	var disply_type = 0;
        var specialequip = false;
    	$('.gameShopTypeButton').each(function(index) {
    		$(this).click(function() {
    			ajaxPost($(this).attr('action'), {type: index}, function(data) {
    				disply_type = index;
    				$('#gameShopItems .jspPane .gameShopItem').remove();
                    if ( disply_type == 4 || disply_type == 5 ) {
                        $('.gameShopItemSpecial').hide();
                    }
                    else {
                        $('.gameShopItemSpecial').show();
                    }
                    $('#gameShopItems').jScrollPane();
    				for ( var i = 0; i < data["shop"].length; i++ ) {
                        if ( data["shop"][i]["id"] != 42 ) {
                            var buyClass = '';
                            if ( data["hadBuyItems"][i] == true ) {
                                buyClass = 'itemHadBuy';
                            }
                            var equipClass = '';
                            for ( var j = 0; j < 6; j++ ) {
                                if ( Equip_items[j]['id'] == data["shop"][i]["id"] )
                                    equipClass = 'gameShopItemSelect';
                                if ( init_equip[types[j]][0] == data["shop"][i]["id"] )
                                    equipClass = 'gameShopItemSelect';
                            }
                            if ( specialequip && disply_type != 4 && disply_type != 5 ) {
                                equipClass = '';
                            }
        					$('<div class="gameShopItem ' + equipClass + '">' + 
    							'<img class="gameShopItemImage" src="' + bURL + 'images/gameShop/' + data["shop"][i]["picture"] + '" itemId="' + data["shop"][i]["id"] + '" />' +
    							'<div class="gameShopItemText">' + data["shop"][i]["costgp"] + '</div>' + 
    							'<div class="gameShopItemBuyButton ' + buyClass + '" item="' + data["shop"][i]["id"] + '"></div>' +
    						'</div>').appendTo($('#gameShopItems .jspPane'));
                        }
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
                        $.alertMessage('購買成功!');
                        if ( id == 42 ) {
                            $('#characterSpecial').attr('src', bURL + 'images/gameShop/special/real-special.png');
                        }
                    }
                    else {
                        $.alertMessage('你GP不夠喔！');
                    }
                }
			});
    	};
        function ItemImageClick() {
            $('.gameShopItemImage').each(function(index) {
                $(this).click(function() {
                    $('.gameShopItemSpecial').each(function(index) {
                        $(this).removeClass('gameShopItemSelectSpecial');
                    });
                    if ( disply_type < 4 ) {
                        if ( specialequip ) {
                            user_look[0].attr('src', bURL + 'images/gameShop/head/1.png');
                            user_look[0].attr('itemId', 1);
                            user_look[1].attr('src', bURL + 'images/gameShop/face/1.png');
                            user_look[1].attr('itemId', 7);
                            user_look[2].attr('src', bURL + 'images/gameShop/body/1.png');
                            user_look[2].attr('itemId', 13);
                            user_look[3].attr('src', bURL + 'images/gameShop/foot/1.png');
                            user_look[3].attr('itemId', 19);
                        }
                        user_look[6].hide();
                        specialequip = false;
                        for ( var j = 0; j < 4; j++ ) {
                            user_look[j].show();
                        }
                    }
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
            $('#gameShopItemImageSpecial').click(function() {
                $('.gameShopItem').each(function(index) {
                    $(this).removeClass('gameShopItemSelect');
                });
                $(this).parent().addClass('gameShopItemSelectSpecial');
                for ( var j = 0; j < 4; j++ ) {
                    user_look[j].hide();
                    user_look[j].attr('itemId', $(this).attr('itemId'));
                }
                for ( var j = 4; j < 6; j++ ) {
                    if ( user_look[j].attr('itemId') == 0 ) {
                        user_look[j].hide();
                    }
                    else {
                        user_look[j].show();
                    }
                }
                user_look[6].show();
                specialequip = true;
            });
        }
        function buyClick() {
            $('.gameShopItemBuyButton').each(function(index) {
                $(this).click(function() {
                    buyItem($(this).attr('item'), $(this));
                });
            });
            $('.gameShopItemBuyButtonSpecial').click(function() {
                buyItem($(this).attr('item'), $(this));
            });
        }
    	
        var user_look = new Array(7);
        var types = ['head', 'face', 'body', 'foot', 'item', 'map'];
        var init_equip =[];
        $('.character').each(function(index) {
            user_look[index] = $(this);
            init_equip[types[index]] = [ user_look[index].attr('itemId'), user_look[index].attr('src') ];
        });
        for ( var j = 0; j < 6; j++ ) {
            if ( j < 4 ){
                if ( user_look[j].attr('itemId') != 42 ) {
                    user_look[j].show();
                }
                else {
                    user_look[6].show();
                    specialequip = true;
                    $('.gameShopItemSpecial').each(function(index) {
                        $(this).addClass('gameShopItemSelectSpecial');
                    });
                }
            }
            else {
                if ( Equip_items[j]['id'] != 0 )
                    user_look[j].show();
            }
        }

        $('#characterEquipButton').click(function() {
            var user_want = new Array(6);
            for ( var i = 0; i < 6; i++ ) {
                user_want[i] = user_look[i].attr('itemId');
            }
            ajaxPost($(this).attr('action'), {user_want: user_want}, function(data) {
                //console.log(data);
                var success = true;
                for ( var i = 0; i < 6; i++ ) {
                    if ( !data['isBuy'][i] ) {
                        var words = ['頭盔', '表情', '身體', '下肢', '道具', '地圖碎片'];
                        if ( user_want[i] != 0 ) {
                            $.alertMessage('你還沒買' + words[i] + '喔~');
                        }
                        success = false;
                        user_look[i].attr('itemId', init_equip[types[i]][0] );
                        user_look[i].attr('src', init_equip[types[i]][1] );
                    }
                    else {
                        init_equip[types[i]] = [ user_look[i].attr('itemId'), user_look[i].attr('src') ];
                    }
                }
                if ( success ) {
                    $.alertMessage('成功裝備!', {type: 'alert-danger'});
                }
                else {
                    $.alertMessage('其餘裝備成功裝備!');
                }
            });
        });
        $('#characterReturnButton').click(function() {
            if ( init_equip['head'][0] == 42 ) {
                user_look[6].show();
                for ( var i = 0; i < 4; i++ ) {
                    user_look[i].hide();
                }
                specialequip = true;

            }
            else {
                user_look[6].hide();
                for ( var i = 0; i < 4; i++ ) {
                    user_look[i].attr('itemId', init_equip[types[i]][0] );
                    user_look[i].attr('src', init_equip[types[i]][1] );
                    user_look[i].show();
                }
                user_look[1].css({
                    top: disply_item_data[user_look[0].attr('itemId')-1]['face_middle_y']/2 - 35 + 'px',
                    left: disply_item_data[user_look[0].attr('itemId')-1]['face_middle_x']/2 + 17 + 'px'
                });
                specialequip = false;
            }
            for ( var i = 4; i < 6; i++ ) {
                if ( init_equip[types[i]][0] != 0 ) {
                    user_look[i].attr('itemId', init_equip[types[i]][0] );
                    user_look[i].attr('src', init_equip[types[i]][1] );
                }
                else {
                    user_look[i].hide();
                }
            }
            $('.gameShopItem').each(function(index) {
                $(this).removeClass('gameShopItemSelect');
                if ( $(this).children('.gameShopItemImage').attr('itemId') == init_equip[types[disply_type]][0]) {
                    $(this).addClass('gameShopItemSelect');
                }
            });
            $('.gameShopItemSpecial').each(function(index) {
                $(this).removeClass('gameShopItemSelectSpecial');
            });
            if ( init_equip['head'][0] == 42 ) {
                $('.gameShopItemSpecial').each(function(index) {
                    $(this).addClass('gameShopItemSelectSpecial');
                });
            }
        });

        $('#gameShopItems').jScrollPane();
        ItemImageClick();
        buyClick();
    });
})(jQuery);