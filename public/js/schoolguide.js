$(document).ready(function(){

	$("#select").change(changeLeft);
	$(".pointer").click(function(){
		clickImg($(this).data('id'));
	});
	makeLeftCanClick();	

	if(getTransferData('value') == '1'){
		$("#select").val(getTransferData('select'))
		// $.jumpWindow("123","111","222");
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
			var category = data[i]['categories'];
			$("<img class ='line' src='http://localhost/ncufresh14/public/images/SchoolGuide/line.png'>").appendTo("#leftlist").data('place_id', id);
			$("<img class ='board' src='http://localhost/ncufresh14/public/images/SchoolGuide/board.png'>").appendTo("#leftlist").data('place_id', id);
			$("<li class='left_item'>"+name+"</li>").appendTo("#leftlist").data('place_id', id);

			if(category==1){
				$(".departments").show();
				$(".school").hide();
				$(".scence").hide();
				$(".dorm").hide();
				$(".eat").hide();
				$(".exercise").hide();
			}else if(category==2){
				$(".school").show();
				$(".dorm").hide();
				$(".departments").hide();
				$(".scence").hide();
				$(".eat").hide();
				$(".exercise").hide();
			}else if(category==3){
				$(".scence").show();
				$(".departments").hide();
				$(".dorm").hide();
				$(".school").hide();
				$(".eat").hide();
				$(".exercise").hide();
			}else if(category==4){
				$(".exercise").show();
				$(".dorm").hide();
				$(".school").hide();
				$(".departments").hide();
				$(".scence").hide();
				$(".eat").hide();
			}else if(category==5){
				$(".eat").show();
				$(".dorm").hide();
				$(".school").hide();
				$(".departments").hide();
				$(".scence").hide();
				$(".exercise").hide();
			}else if (category==6){
				$(".dorm").show();
				$(".school").hide();
				$(".departments").hide();
				$(".scence").hide();
				$(".eat").hide();
				$(".exercise").hide();
			}

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
		$.jumpWindow("123",a,"222");
	
	}

	function clickImg(id){
		
		var url =getTransferData('guide_map');
		var data = {id: id};
		ajaxGet(url,data,showPhoto);
	}

	$(".close2").click(function(){
		$(".content").children().remove();
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
	$(".pointer").mouseover(function(){
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

		$("#science-1")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science-1-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science-1.png");
	
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

	$("#G-1-4")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/G-1-4-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/G-1-4.png");
	
	});

	$("#basketball")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/basketball-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/basketball.png");
	
	});
	$("#playground")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/playground-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/playground.png");
	
	});
		
		$("#rock")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/rock-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/rock.png");
	
	});
		
		$("#swimpool")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/swimpool-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/swimpool.png");
	
	});

			$("#skate")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/skate-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/skate.png");
	
	});
			$("#valley")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/valley-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/valley.png");
	
	});
	$("#badminton")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/badminton-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/badminton.png");
	
	});
	$("#wood")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/wood-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/wood.png");
	});
	$("#science-2")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science-2-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science-2.png");
	});
	$("#science-3")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science-3-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science-3.png");
	});
	$("#mbuilding")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/mbuilding-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/mbuilding.png");
	});
	$("#math")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/math-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/math.png");
	});
	$("#management-1")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/management-1-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/management-1.png");
	});
	$("#management-2")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/management-2-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/management-2.png");
	});
	$("#clibrary")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/clibrary-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/clibrary.png");
	});
	$("#Graduate")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/Graduate-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/Graduate.png");
	});
	$("#Hakkas")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/Hakkas-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/Hakkas.png");
	});
	$("#electric")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/electric-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/electric.png");
	});
	$("#outerspace")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/outerspace-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/outerspace.png");
	});

	$("#ncu")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/ncu-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/ncu.png");
	});
	$("#B9")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B9-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B9.png");
	});
	$("#B12")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B12-P.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/B12.png");
	});
	$("#lake")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/lake-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/lake.png");
	});
	$("#science-5")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science-5-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science-5.png");
	});
	$("#science-4")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science-4-p.png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/science-4.png");
	});

		
		
		
			
});
