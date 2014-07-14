$(document).ready(function(){

	$(".photo").hide();
	$("#select").change(changeLeft);
	$(".Img").click(function(){
		clickImg($(this).data('id'));
	});
	makeLeftCanClick();	

	if(getTransferData('value') == '1'){
		$("#select").val(getTransferData('select'))
	$(".photo").show();
}



	function changeLeft(){
		var url = getTransferData('guide_left_url');// var url = $(this).data('url');
		var data = {value: $(this).val()};// var value = 'value='+$(this).val();
		ajaxGet(url, data, doChangeLeft)
	}

	function doChangeLeft(data){ //success
		var count = data.length;
		//for(var key in data)
		$("#leftlist").children().remove();

		for(var i=0; i<count; i++){
			var name =data[i]['name'];
			var id=data[i]['id'];
			$("<img class ='line' src='http://localhost/ncufresh14/public/images/SchoolGuide/line.png'>").appendTo("#leftlist").data('place_id', id);
			$("<img class ='board' src='http://localhost/ncufresh14/public/images/SchoolGuide/board.png'>").appendTo("#leftlist").data('place_id', id);
			$("<li class='left_item'>"+name+"</li>").appendTo("#leftlist").data('place_id', id);
		}
		makeLeftCanClick();
	}

	function makeLeftCanClick(){
		$('.left_item').each(function(){
			$(this).click(function(){
				getId($(this).data('place_id'));
			});
			$(this).mouseover(function(){
				$(this).css({"cursor":"pointer"});
	});

		});
	}

	function getId(id){
		var url = getTransferData('guide_right_url');// var url = $(this).data('url');
		var data = {id: id};
		ajaxGet(url, data, showPhoto);
	}

	function showPhoto(data){

		var a =data['introduction'];
		$("<div>"+a+"</div>").appendTo(".content");
		$(".photo").show();
	
	}

	function clickImg(id){
		
		var url =getTransferData('guide_map');
		var data = {id: id};
		ajaxGet(url,data,showPhoto);
	}

	$(".close2").click(function(){
		$(".content").children().remove();
		$(".photo").hide();
	});

	$(".close2").mouseover(function(){
		$(this).css({"cursor":"pointer"});
	});
	$(".left_item").mouseover(function(){
		$(this).css({"cursor":"pointer"});
	});
	$(".board").mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/board-p.png");
		})
		.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/board.png");
	});
	$(".Img").mouseover(function(){
		$(this).css({"cursor":"pointer"});
	});
    //=============================================================================
	$("#Zhidao")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/Zhidao-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/Zhidao.png");
	
	});

	$("#G14")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/G14-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/G14.png");
	
	});


	$("#G14-ground")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/G14-ground-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/G14-ground.png");
	
	});
		$("#B11")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B11-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B11.png");
	
	});
		$("#B7")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B7-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B7.png");
	
	});
		$("#B6")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B6-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B6.png");
	
	});

	$("#art")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/art-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/art.png");
	
	});

	$("#building")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/building-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/building.png");
	
	});

	$("#B13")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B13-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B13.png");
	
	});

	$("#schoolh")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/schoolh-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/schoolh.png");
	
	});
		$("#door")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/door-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/door.png");
	
	});
		$("#monument")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/monument-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/monument.png");
	
	});
		$("#B5")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B5-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B5.png");
	
	});

		$("#International")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/International-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/International.png");
	
	});

		$("#B3")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B3-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B3.png");
	
	});

		$("#science")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science.png");
	
	});
		$("#administration")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/administration-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/administration.png");
	
	});

		$("#library")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/library-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/library.png");
	
	});
			$("#tree")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/tree-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/tree.png");
	
	});
			$("#oldlibrary")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/oldlibrary-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/oldlibrary.png");
	
	});
			$("#tai")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/tai-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/tai.png");
	
	});

			$("#blackbox")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/blackbox-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/blackbox.png");
	
	});
			$("#literary")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/literary-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/literary.png");
	
	});
	$("#engineer-1")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/engineer-1-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/engineer-1.png");
	
	});
	$("#engineer-2")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/engineer-2-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/engineer-2.png");
	
	});
			
	$("#engineer-3")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/engineer-3-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/engineer-3.png");
	
	});
	$("#engineer-4")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/engineer-4-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/engineer-4.png");
	
	});
	$("#engineer-5")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/engineer-5-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/engineer-5.png");
	
	});
	$("#park")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/park-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/park.png");
	
	});
	$("#gym")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/gym-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/gym.png");
	
	});
			
});
