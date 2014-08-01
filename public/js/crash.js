$(document).ready(function(){
	
	var burl = getTransferData('burl');

	var mousePressed = false;
	var lastX, lastY;
	var ctx = document.getElementById("canvas").getContext("2d");
	
	var img = new Image();   // Create new img element
	img.addEventListener("load", function() {
	  // execute drawImage statements here
	}, false);
	

	$.konami({
		code:  			[83],
		interval:		100,
	    complete:	function(){
		  	var canvas = document.getElementsByTagName('canvas')[0];
			canvas.width  = screen.width;
			canvas.height = screen.height;
			$("body").css({"overflow-y":"hidden"});
			draw();
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
	        ctx.clearRect(x,y,20,20);
	    }
	}

		function draw() {
		  var ctx = document.getElementById('canvas').getContext('2d');
		  var img = new Image();
		  img.src = burl+'/images/SchoolGuide/fog.jpeg'; 
		  img.onload = function(){
		   ctx.drawImage(img, 0, 0,canvas.width,canvas.height);
		   ctx.stroke();
		  };
	}
	
});