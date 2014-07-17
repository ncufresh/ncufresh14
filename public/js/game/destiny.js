(function($)
{
	jQuery.fn.rotate = function(degrees) {
	    $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
	                 '-moz-transform' : 'rotate('+ degrees +'deg)',
	                 '-ms-transform' : 'rotate('+ degrees +'deg)',
	                 'transform' : 'rotate('+ degrees +'deg)'});
	    return $(this);
	};

    $(document).ready(function()
    {
    	var running = false;
    	$('#destinyStart').click(function() {
    		if ( !running ) {
				ajaxPost($(this).attr("action"), '', function(data) {

					if ( data["play"] == true) {
						$('#destinyStart').hide();
			    		var rotation = 0;
			    		var decrease = 20;
			    		var timer = $.timer(function() {
					        rotation += decrease;
					        decrease -= 0.1;
						    $('#rotateTable').rotate(rotation + decrease);
						    if ( decrease <= 0 ) {
						    	timer.stop();
						    	running = false;
						    	editStatus(data);
					    		$('#destinyStart').show();
					    		$('#startPage').hide();
					    		$('#bounsPage').fadeIn();
						    }
					    });
						timer.set({ time : 10, autostart : false });
				    	running = true;
				    	timer.play();
					}
					else {
						alert('no power.');
					}
				});
			}
		});
    	$('#destinyAgain').click(function(){
    		$('#bounsPage').hide();
    		$('#startPage').fadeIn();
    		running = false;
    	});
    });
})(jQuery);