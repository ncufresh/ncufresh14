(function($)
{
	jQuery.fn.rotate = function(degrees) {
	    $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
	                 '-moz-transform' : 'rotate('+ degrees +'deg)',
	                 '-ms-transform' : 'rotate('+ degrees +'deg)',
	                 'transform' : 'rotate('+ degrees +'deg)'});
	    return $(this);
	};
	function ajax(formURL, postData, success_function, error_function) {
		$.ajax({
			url : formURL,
			type: "POST",
			data : postData,
			success: success_function,
			error: error_function
		});
	}
    $(document).ready(function()
    {
    	var running = false;
    	$('#destinyStart').click(function() {
    		if ( !running ) {
    			$(this).hide();
	    		var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				
				ajax(formURL, postData, function(data, textStatus, jqXHR) {
					if ( data["play"] ){
			    		var rotation = 0;
			    		var decrease = 20;
			    		var timer = $.timer(function() {
					        rotation += decrease;
					        decrease -= 0.1;
						    $('#rotate_table').rotate(rotation + decrease);
						    if ( decrease <= 0 ) {
						    	timer.stop();
						    	running = false;
						    	$('#userPower').text('電量: ' + data["power"]);
					    		$('#userGP').text('GP: ' + data["gp"]);
					    		$('#destinyStart').show();
					    		$('#startPage').hide();
					    		$('#bounsPage').show();
						    }
					    });
						timer.set({ time : 10, autostart : false });
					    	running = true;
					    	timer.play();
					}
				}, function() {

				});
			}
		});
    	$('#bounsPage').click(function(){
    		$(this).hide();
    		$('#startPage').show();
    	});
    	
    });
})(jQuery);