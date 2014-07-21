
$(document).ready(function(){

	$(".wrapper").hide();
	$(".items").hide();
	//$("#page2").hide();
	$("#photo").hide();

	$("#morecontent").click(function(){

		//$(".items").show("slow");
		// $("#morecontent").animate({
		// 	opacity:'0'
		// },1);
		$("#morecontent").hide(1);
		$("#page1").animate({
			width:'50px',
			marginLeft:'32px',
		},600,function(){
			$("#photo").show();
		});
		
		$("#page2").animate({
			width:'1023px',
			marginLeft:'-37px',
			},600,function(){
				$("#page1").css({"visibility":"hidden"});
			});

	 $("#page2").css({"visibility":"visible"});
	 $(".items").show(1);

	});

	$("#photo").click(function(){
		$("#photo").hide(1);
		$(".items").hide("slow");
		$("#morecontent").show(1);
		$("#page2").animate({
			width:'5%',
			marginLeft:'918px',
		},600);
		$("#page1").animate({
			width:'918px',
			marginLeft:'10px',
			},600,function(){
				$("#page2").css({"visibility":"hidden"});
			});

		$("#page1").css({"visibility":"visible"});
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
