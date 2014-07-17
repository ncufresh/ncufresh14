(function($)
{
    ajaxPost();
    $(document).ready(function()
    {
    	var disply_type = 0;
    	$('.gameShopTypeButton').each(function(index) {
    		$(this).click(function() {
    			ajaxPost($(this).attr('action'), {type: index}, function(data) {
                    console.log(data);
    				disply_type = index;
    				$('#gameShopItems .jspPane').empty();
    				for ( var i = 0; i < data["shop"].length; i++ ) {
                        var buyClass = '';
                        if ( data["hadBuyItems"][i] == true ) {
                            buyClass = 'itemHadBuy';
                        }
    					$('<div class="gameShopItem">' + 
							'<img class="gameShopItemImage" src="' + bURL + '/images/gameShop/' + data["shop"][i]["small_picture"] + '" look="' + bURL + '/images/gameShop/' + data["shop"][i]["picture"] + '" itemId="' + data["shop"][i]["id"] + '" />' +
							'<div class="gameShopItemText">' + data["shop"][i]["id"] + ' ' + data["shop"][i]["name"] + '</div>' + 
							'<div class="gameShopItemBuyButton ' + buyClass + '" item="' + data["shop"][i]["id"] + '"></div>' +
						'</div>').appendTo($('#gameShopItems .jspPane'));
    				}
                    $('#gameShopItems').jScrollPane();
    				$('.gameShopItemBuyButton').each(function(index) {
			    		$(this).click(function() {
				    		buyItem($(this).attr('item'), $(this));
				    	});
			    	});
                    $('.gameShopItemImage').each(function(index) {
                        $(this).click(function() {
                            user_look[disply_type].attr('src', $(this).attr('look'));
                        })
                    });
    			});
    		})
    	});
    	function buyItem(id, button) {
    		ajaxPost($('#gameShopItems').attr('action'), {itemId: id}, function(data) {
				
                console.log(data);
                if ( data["isBuy"] ) {
                    button.css({
                        backgroundColor: 'lightblue'
                    });
                }
			});
    	};

    	$('.gameShopItemBuyButton').each(function(index) {
    		$(this).click(function() {
	    		buyItem($(this).attr('item'), $(this));
	    	});
    	});
        var user_look = new Array(6);
        var types = ['head', 'face', 'body', 'foot', 'item', 'map'];
        var init_equip =[];
        $('.character').each(function(index) {
            user_look[index] = $(this);
            init_equip[types[index]] = [ user_look[index].attr('itemId'), user_look[index].attr('src') ];
        });
        $('.gameShopItemImage').each(function(index) {
            $(this).click(function() {
                user_look[disply_type].attr('src', $(this).attr('look'));
                user_look[disply_type].attr('itemId', $(this).attr('itemId'));
            })
        });

        $('#characterEquipButton').click(function() {
            var user_want = new Array(6);
            for ( var i = 0; i < 6; i++ ) {
                user_want[i] = user_look[i].attr('itemId');
            }
            ajaxPost($(this).attr('action'), {user_want: user_want}, function(data) {
                console.log(data);
                for ( var i = 0; i < 6; i++ ) {
                    if ( !isBuy[i] ) {
                        
                    }
                }
            });
        });
        $('#characterReturnButton').click(function() {
            for ( var i = 0; i < 6; i++ ) {
                user_look[i].attr('itemId', init_equip[types[i]][0] );
                user_look[i].attr('src', init_equip[types[i]][1] );
            }
        });

        $('#gameShopItems').jScrollPane();
    });
})(jQuery);