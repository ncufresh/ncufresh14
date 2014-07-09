(function($)
{
	
	var rotation = 0;
	jQuery.fn.rotate = function(degrees) {
	    $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
	                 '-moz-transform' : 'rotate('+ degrees +'deg)',
	                 '-ms-transform' : 'rotate('+ degrees +'deg)',
	                 'transform' : 'rotate('+ degrees +'deg)'});
	    return $(this);
	};

	var timer = $.timer(function() {
            alert('This message was sent by a timer.');
    });

   

    $(document).ready(function()
    {
    	$('#destinyStart').click(function() {
		    rotation += 5;
		    $('#rotate_table').rotate(rotation);
		});
    	 timer.set({ time : 5000, autostart : true });
    });
})(jQuery);