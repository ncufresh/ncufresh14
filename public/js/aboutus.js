
$(document).ready(function(){

	var burl = getTransferData('burl');
	var change = 1;
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
		if(change==1){
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
	}

	});

	$("#photo").click(function(){
		
		if(change==1){
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
	}
	});

	$(".items").click(function(){
		getID($(this).data('id'));

	});

	

	$(".close").click(function(){
		change=1;
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
		var teamphoto = data['teamphoto'];
			change=0;
			$(".items").hide(1);
			$(".close").show("slow");
		if(data['id']!=6){
			if(data['id']==8){
			 $("#operate_menu").show("slow");
			}else if(data['id']==9){
				$("#code_menu").show("slow");
			}else if(data['id']==3){
				$("#draw_menu").show("slow");
			}else if(data['id']==10){
				$("#project_menu").show("slow");
			}else if(data['id']==4){
				$("#movie_menu").show("slow");
			}
			$(".m_intro").children().remove();
			$("<span>"+teamphoto+"</span>").appendTo(".m_intro");
			$(".m_intro").show("slow");
			$(".m_photo").show("slow");
		}else{
				
				$("#back_menu").show("slow");
				$("#carousel-example-generic").show("slow");
				$("#scroll").show("slow");
			}
	}

	$("#operate")
	.mouseenter(function(){
		$(this).attr('src',burl+"/images/aboutus/operate-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',burl+"/images/aboutus/operate.png");
	
	});
	$("#code")
	.mouseenter(function(){
		$(this).attr('src',burl+"/images/aboutus/code-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',burl+"/images/aboutus/code.png");
	
	});
	$("#draw")
	.mouseenter(function(){
		$(this).attr('src',burl+"/images/aboutus/draw-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',burl+"/images/aboutus/draw.png");
	
	});
	$("#movie")
	.mouseenter(function(){
		$(this).attr('src',burl+"/images/aboutus/movie-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',burl+"/images/aboutus/movie.png");
	
	});
	$("#back")
	.mouseenter(function(){
		$(this).attr('src',burl+"/images/aboutus/back-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',burl+"/images/aboutus/back.png");
	
	});
	$("#project")
	.mouseenter(function(){
		$(this).attr('src',burl+"/images/aboutus/project-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',burl+"/images/aboutus/project.png");
	
	});
	
});
