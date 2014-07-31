$(document).ready(function(){
	
	var mousePressed = false;
	var lastX, lastY;
	var ctx = document.getElementById("canvas").getContext("2d");
	 

	$.konami({
		code:  			[83],
		interval:		100,
	    complete:	function(){
		  	var canvas = document.getElementsByTagName('canvas')[0];
			canvas.width  = screen.width;
			canvas.height = screen.height;
			$("body").css({"overflow-y":"hidden"});
			fog();
			}
	});

	$('#canvas').mousedown(function (e) {
        mousePressed = true;
        Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);
    });

    $('#canvas').mousemove(function (e) {
        if (mousePressed) {
            Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
        }
    });

    $('#canvas').mouseup(function (e) {
        mousePressed = false;
    });
	    $('#canvas').mouseleave(function (e) {
        mousePressed = false;
    });

	function Draw(x, y, isDown) {
	    if (isDown) {
	        ctx.beginPath();
	        ctx.strokeStyle = "white";
	        ctx.lineWidth = 10;
	        ctx.lineJoin = "round";
	        ctx.moveTo(lastX, lastY);
	        ctx.lineTo(x, y);
	        ctx.closePath();
	        ctx.stroke();
	    }
	    lastX = x; lastY = y;
	}

		function fog(){
			
			ctx.fillStyle = "#dd0000";
			ctx.fillRect(0,0,canvas.width,canvas.height);
		}

	
});