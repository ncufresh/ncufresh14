$(function(){
	var bURL = getTransferData('burl');

	$('#item1').mouseenter(function(){
		$('#food').attr("src", bURL + "/images/nculife/prese_food.png")
	});

	$('#item1').mouseleave(function(){
		$('#food').attr("src", bURL + "/images/nculife/food.png")
	});

	$('#item2').mouseenter(function(){
		$('#live').attr("src", bURL + "/images/nculife/prese_live.png")
	});
	
	$('#item2').mouseleave(function(){
		$('#live').attr("src", bURL + "/images/nculife/live.png")
	});

	$('#item3').mouseenter(function(){
		$('#go').attr("src", bURL + "/images/nculife/prese_go.png")
	});
	
	$('#item3').mouseleave(function(){
		$('#go').attr("src", bURL + "/images/nculife/go.png")
	});

	$('#item4').mouseenter(function(){
		$('#inschool').attr("src", bURL + "/images/nculife/prese_inschool.png")
	});

	$('#item4').mouseleave(function(){
		$('#inschool').attr("src", bURL + "/images/nculife/inschool.png")
	});

	$('#item5').mouseenter(function(){
		$('#outschool').attr("src", bURL + "/images/nculife/prese_outschool.png")
	});
	
	$('#item5').mouseleave(function(){
		$('#outschool').attr("src", bURL + "/images/nculife/outschool.png")
	});
})