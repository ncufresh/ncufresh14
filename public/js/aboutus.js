
$(document).ready(function(){

	$(".wrapper").hide();
	$(".items").hide();
	//$("#page2").hide();
	$("#photo").hide();

	$("#morecontent").click(function(){

		//$(".items").show("slow");
		$("#morecontent").animate({
			opacity:'0'
		},1);
		$("#page1").animate({
			width:'50px',
			marginLeft:'-10px',
			opacity:'0'
		},800,function(){
			//$("#page1").hide();
			$("#photo").show();
		});
		
		$("#page2").animate({
			width:'1023px',
			marginLeft:'-37px',
			opacity:'1'
			},800);

	 $("#page2").css({"visibility":"visible"});

	});

	$("#photo").click(function(){
		$("#photo").hide(1);
		$(".items").hide("slow");
		$("#page2").animate({
			width:'5%',
			marginLeft:'918px',
			opacity:'0'
		},1000);
		$("#page1").animate({
			width:'918px',
			marginLeft:'10px',
			opacity:'1'
			},1000,function(){
				$("#morecontent").animate({
			opacity:'1'
			},1);

				$("#page2").css({"visibility":"hidden"});
			});

		
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
