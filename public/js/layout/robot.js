(function($)
{
	var imageIndex = 1;		//1~4
	var speed = 8;
	var left = 0;
	var side = 'right';
	var timer = $.timer(function() {
	    $('#topRobot').css({
	    	background: 'url("' + bURL + 'images/layout/robot/' + imageIndex + '.png") no-repeat',
	    	left: 700 + left + 'px'
	    });
	    var isTurn = Math.floor(Math.random() * 100);
	    if ( left < 0 ) {
	    	side = 'right';
	    }
	    else if ( left > 700 ) {
	    	side = 'left';
	    }
	    else if ( isTurn < 5 ) {
	    	if ( side == 'right') {
	    		side = 'left';
	    	}
	    	else {
	    		side = 'right';	
	    	}
	    }
	    if ( side == 'right') {
    		left += speed;
    	}
    	else {
    		left -= speed;
    	}
	    imageIndex = imageIndex%4 + 1;
    });
    $(document).ready(function()
    {		
		timer.set({ time : 300, autostart : true });
    });
})(jQuery);