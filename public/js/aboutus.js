
$(document).ready(function(){

	var burl = getTransferData('burl');
	$(".menu").hide();
	$(".close").hide();
	$(".m_intro").hide();
	$(".m_photo").hide();
	$(".wrapper").hide();
	$("#carousel-example-generic").hide();
	$("#scroll").hide();
	$(".items").hide();
	$("#photo").hide();

	$("#morecontent").click(function(){

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
	 $(".items").show(1000);
	 $("#morecontent").hide(1);

	});

	$("#photo").click(function(){
		
		
		$("#page2").animate({
			width:'5%',
			marginLeft:'918px',
		},600,function(){
			$("#morecontent").show(1);
		});
		$("#page1").animate({
			width:'918px',
			marginLeft:'10px',
			},600,function(){
				$("#page2").css({"visibility":"hidden"});
			});
		$("#photo").hide(1);
		$("#page1").css({"visibility":"visible"});
		$(".items").hide(1);
		
	});

	$(".items").click(function(){
		getID($(this).data('id'));
	});

	$(".close").click(function(){
		$(".menu").hide("slow");
		$(this).hide();
		$(".items").show("slow");
		$(".m_intro").hide();
		$(".m_photo").hide();
		$("#carousel-example-generic").hide();
		$("#scroll").hide();
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
	});

	function getID(id){
		var url = getTransferData('about_modal');
		var data = {id: id};
		ajaxGet(url,data,OpenModal);
	}

	function OpenModal(data){
		var introduction = data['introduction'];
		var teamphoto = data['teamphoto'];
		
			$(".items").hide(1);
			$(".close").show("slow");
		if(data['id']!=6){
			if(data['id']==1){
			 $("#operate_menu").show("slow");
			}else if(data['id']==2){
				$("#code_menu").show("slow");
			}else if(data['id']==3){
				$("#draw_menu").show("slow");
			}else if(data['id']==4){
				$("#project_menu").show("slow");
			}else if(data['id']==5){
				$("#movie_menu").show("slow");
			}
			$(".m_intro").show("slow");
			$(".m_photo").show("slow");
		}else{
				$("#back_menu").show("slow");
				$("#carousel-example-generic").show("slow");
				$("#scroll").show("slow");
			}
	}
	
});
