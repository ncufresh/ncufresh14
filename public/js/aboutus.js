
$(document).ready(function(){

	$(".wrapper").hide();
	$(".items").hide();
	$("#morecontent").click(function(){
		$(".items").show("slow");
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
		$(".items").hide("slow");
		$("#morecontent").animate({
			width:'5%',
			marginLeft:'10px'
		},1000);
		$(this).animate({
			width:'850px',
			marginLeft:'10px'
			},1000);

		
	});

	$(".items").click(function(){
		getID($(this).data('id'));
	});

	$(".close").mouseover(function(){
		$(this).css({"cursor":"pointer"});
	
	});

	$(".items").mouseover(function(){
		$(this).css({"cursor":"pointer"});


	});
	$(".a").mouseover(function(){
		$(this).css({"cursor":"pointer"});
	});
	
	$('.carousel').carousel({
  interval: 3000
	})

	function getID(id){
		var url = getTransferData('about_modal');
		var data = {id: id};
		ajaxGet(url,data,OpenModal);
	}

	function OpenModal(data){
		var introduction = data['introduction'];
		var teamphoto = data['teamphoto'];
		if(data['id']!=6){
			$.jumpWindow("",teamphoto+introduction,"");
		}
	}
	
});
