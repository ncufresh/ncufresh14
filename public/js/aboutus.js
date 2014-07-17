console.log(5);
$(document).ready(function(){
console.log(3);
	//$(".wrapper").hide();
	$(".item").hide(;fdgfdg
	$("#morecontent").click(function(){
		$(".item").show("slow");
		$("#picture").animate({
			width:'50px',
			marginLeft:'-30px'
		},1000);
		$(this).animate({
			width:'850px',
			marginLeft:'-850px'
			},1000);
	});

	$("#picture").click(function(){
		$(".item").hide("slow");
		$("#morecontent").animate({
			width:'5%',
			marginLeft:'10px'
		},1000);
		$(this).animate({
			width:'850px',
			marginLeft:'10px'
			},1000);

		
	});

	$(".item").click(function(){
		getID($(this).data('id'));
	});

	$(".close").mouseover(function(){
		$(this).css({"cursor":"pointer"});
	
	});

	$(".item").mouseover(function(){
		$(this).css({"cursor":"pointer"});


	});

	function getID(id){
		var url = getTransferData('about_modal');
		var data = {id: id};
		ajaxGet(url,data,OpenModal);
	}

console.log(2);

	function OpenModal(data){
		// var introduction = data['introduction'];
		// if(data['id']!=6){
		// 	$.jumpWindow("",introduction,"");
		// }
	}

	var carousel = $('#carousel').carouseSl();
  console.log(carousel);
	$('#carousel_prev').on('click', function(ev) {
		console.log('left');
	  carousel.carousel('prev');
	});
	$('#carousel_next').on('click', function(ev) {
	  carousel.carousel('next');
	});

	console.log(1);

});
