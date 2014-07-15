$(document).ready(function(){

	$(".window").hide();
	$(".item").hide();
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
	$("#back").click(function(){
		$(this).carousel();
	});

	$(".close").mouseover(function(){
		$(this).css({"cursor":"pointer"});
	
	});
	$(".item").mouseover(function(){
		$(this).css({"cursor":"pointer"});
		open = 0;
	});

	function getID(id){
		var url = getTransferData('about_modal');
		var data = {id: id};
		ajaxGet(url,data,OpenModal);
	}
	function OpenModal(data){
		//$(".window").show();
		$.jumpWindow("123","111","222");
	}
});
