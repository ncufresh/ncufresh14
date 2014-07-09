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
    			$(this).hide();
	    		var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				$.ajax(
					{
						url : formURL,
						type: "POST",
						data : postData,
						success:function(data, textStatus, jqXHR)
						{
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
							
						},
						error: function(jqXHR, textStatus, errorThrown)
						{
							alert("foo");
						}
					});
				return false;
			}
		});
    	$('#bounsPage').click(function(){
    		$(this).hide();
    		$('#startPage').show();
    	});
    	
    });
})(jQuery);