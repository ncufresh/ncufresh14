$(function($)
{
	var imageIndex = 1;		//1~4
	var speed = 8;
	var left = 0;
	var side = 'right';
	var bURL = getTransferData('burl');
	var arrive = false;
	var handup = false;
	var setLocationTimer = $.timer(setLocation);
	var location=  700;
	var timer = $.timer(function() {
		if ( arrive && handup ) {
			$('#topRobot').css({
				background: 'url("' + bURL + '/images/layout/robot/'+ side +'5.png") no-repeat'
			});
			speed = 8;
		}
		if ( !arrive ) {
			if ( handup ) {
				speed +=0.8;
			}
			$('#topRobot').css({
				background: 'url("' + bURL + '/images/layout/robot/' + side + imageIndex + '.png") no-repeat',
				left: left + 'px'
			});
			if ( Math.abs(location - left) < 10 ) {
				arrive = true;
			}
			else {
				arrive = false;
			}
			if ( left < 0 ) {
				left = 0;
				side = 'right';
			}
			else if ( left > 750 ) {
				left = 750;
				side = 'left';
			}
			if ( location < left ) {
				side = 'left';
			}
			else {
				side = 'right';
			}
			if ( side == 'right') {
				left += speed;
			}
			else {
				left -= speed;
			}
			imageIndex = imageIndex%4 + 1;
		}
	});
	$(document).ready(function()
	{		
		timer.set({ time : 300, autostart : true });
		setLocationTimer.set({ time : 5000, autostart : true });
		$('.topNavBarButton').each(function(index) {
			$(this).mouseenter(function() {
				location = 13 + (index+1)*77;
				handup = true;
				setLocationTimer.stop();
			});
			$(this).mouseleave(function() {
				handup = false;
				location = Math.floor(Math.random() * 750);
				setLocationTimer.play(true);
				arrive = false;
				speed = 8;
			});
		});
	});

    function setLocation() {
    	if ( !handup ) {
			location = Math.floor(Math.random() * 750);
			arrive = false;
		}
    }

   
});