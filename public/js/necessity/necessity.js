
$(document).ready(function() {
	
	$("#buttonA").click(function(){
		$('#contDownSlideFreshman').hide();
		$('#contDownSlideResearch').show();
	}); 

	$("#buttonB").click(function(){
		$('#contDownSlideFreshman').show();
		$('#contDownSlideResearch').hide();
	});

});

