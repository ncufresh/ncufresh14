(function($)
{
	/*jQuery.fn.rotate = function(degrees) {
	    $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
	                 '-moz-transform' : 'rotate('+ degrees +'deg)',
	                 '-ms-transform' : 'rotate('+ degrees +'deg)',
	                 'transform' : 'rotate('+ degrees +'deg)'});
	    return $(this);
	};*/
	var rotateStart = [-6, 13, 38, 57, 83, 105, 129, 151, 175, 196, 222, 243, 267, 287, 309, 3290];
	var rotateEnd = [5, 30, 52, 75, 98, 122, 144, 169 , 190, 212, 235, 259, 280, 301, 322, 346];
	var giftTexts = ['獲得 500 GP', '獲得 500 GP', '獲得 1000 GP', '獲得 2500 GP', '獲得 隨機裝備',
					'獲得 隨機裝備', '獲得 隨機裝備', '獲得 地圖碎片', '電池回復', '獲得 隨機道具',
					'減少 500 GP', '獲得 隨機 GP', '獲得 250 GP', '獲得 250 GP', '獲得 250 GP', '獲得 250 GP'];
    $(document).ready(function()
    {
    	var running = false;
    	$('#destinyStart').click(function() {
    		if ( !running ) {
				ajaxPost($(this).attr("action"), '', function(data) {
					if ( data['user']['play'] == true) {
						$('#destinyStart').hide();
			    		var rotation = rotateStart[data['gift']-1] + (rotateEnd[data['gift']-1] - rotateStart[data['gift']-1])/2 -207;
			    		var decrease = 20;
			    		var timer = $.timer(function() {
					        rotation += decrease;
					        decrease -= 0.1;
						    $('#rotateTable').rotate(rotation);
						    if ( decrease <= 0 ) {
						    	timer.stop();
						    	running = false;
						    	editStatus(data['user']['power'],data['user']['gp']);
					    		$('#destinyStart').show();
					    		$('#startPage').hide();
					    		$('#bonusText').text(giftTexts[data['gift']-1]);
					    		$('#bounsPage').fadeIn();
						    }
					    });
						timer.set({ time : 10, autostart : false });
				    	running = true;
				    	timer.play();
					}
					else {
						noPowerDisplay();
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