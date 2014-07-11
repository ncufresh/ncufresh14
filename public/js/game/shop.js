(function($)
{

    $(document).ready(function()
    {
    	var disply_type = 0;
    	$('.gameShopTypeButton').each(function(index) {
    		$(this).click(function() {
    			ajaxPost($(this).attr('action'), {type: index}, function(data) {
    				disply_type = index;
    				$("#gameShopItems").empty();
    				for ( var i = 0; i < data.length; i++ ) {
    					$('<div class="gameShopItem">' + 
							'<img class="gameShopItemImage" src="' + Burl + '/images/gameShop/' + data[i]["small_picture"] + '" look="' + Burl + '/images/gameShop/' + data[i]["picture"] + '">' +
							'<div class="gameShopItemText">' + data[i]["id"] + ' ' + data[i]["name"] + '</div>' + 
							'<div class="gameShopItemBuyButton" item="' + data[i]["id"] + '">' + data[i]["costgp"] + ' BUY</div>' +
						'</div>').appendTo($("#gameShopItems"));
    				}
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
        $('.character').each(function(index) {
            user_look[index] = $(this);
        });
        $('.gameShopItemImage').each(function(index) {
            $(this).click(function() {
                user_look[disply_type].attr('src', $(this).attr('look'));
            })
        });
    });
})(jQuery);