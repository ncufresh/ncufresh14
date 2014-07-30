$(document).ready(function(){
	$("#modal-back").hide();
	var burl = getTransferData('burl');

	var change = ['','department', 'administration', 'scence', 'exercise', 'food', 'dorm'];
	var changeChinese = ['','系館', '行政', '中大十景', '運動', '飲食', '住宿'];

	var addEvent =  window.attachEvent||window.addEventListener;
	var event = window.attachEvent ? 'onclick' : 'keydown';
	addEvent(event, function(event){
			
				if(event.keyCode=="65"){
				
				}
			
	});

	// $("#tollbar").appendTo("#chat-room-container");

	//  var $scrollingDiv = $("#tollbar");
 
	//   $(window).scroll(function(){ 
	//    $scrollingDiv
	//     .css({"margin-top": "200px"});   
	//   });

	//  $("#tollbar").click(function(){
	 	
	//  });
 
	$("#select").change(changeLeft);
	$(".pointer img").click(function(){
		clickImg($(this).data('id'));
		changePhoto($(this).data('id'));
	});
	makeLeftCanClick();	

	if(getTransferData('value') == '1'){
		$("#select").val(getTransferData('select'));
		$.jumpWindow("","","");
	}
	if(getTransferData('value') == '2'){
		$("#select").val(getTransferData('select'));
	}

	if($("#select").val()==1){
				$(".departments").show();
				$(".school").hide();
				$(".scence").hide();
				$(".dorm").hide();
				$(".eat").hide();
				$(".exercise").hide();
			}else if($("#select").val()==2){
				$(".school").show();
				$(".dorm").hide();
				$(".departments").hide();
				$(".scence").hide();
				$(".eat").hide();
				$(".exercise").hide();
			}else if($("#select").val()==3){
				$(".scence").show();
				$(".departments").hide();
				$(".dorm").hide();
				$(".school").hide();
				$(".eat").hide();
				$(".exercise").hide();
			}else if($("#select").val()==4){
				$(".exercise").show();
				$(".dorm").hide();
				$(".school").hide();
				$(".departments").hide();
				$(".scence").hide();
				$(".eat").hide();
			}else if($("#select").val()==5){
				$(".eat").show();
				$(".dorm").hide();
				$(".school").hide();
				$(".departments").hide();
				$(".scence").hide();
				$(".exercise").hide();
			}else if ($("#select").val()==6){
				$(".dorm").show();
				$(".school").hide();
				$(".departments").hide();
				$(".scence").hide();
				$(".eat").hide();
				$(".exercise").hide();
			}
	function changeSelect($item){
	
		 // location.replace(burl+"/SchoolGuide/"+$item);
	}
	function changePhoto($id){
		// var url = window.location.href;  
		// if (url.indexOf('?') > -1){
		//    url += '/'+$id;
		// }else{
		//    url += '/'+$id;
		// }
		//  window.location.href=url;
	}	

	function changeLeft(){
		var url = getTransferData('guide_left_url');// var url = $(this).data('url');
		var data = {value: $(this).val()};// var value = 'value='+$(this).val();
		ajaxGet(url, data, doChangeLeft);
		changeSelect($(this).find("option:selected").data('id'));

		
	}

	function doChangeLeft(data){ //success
		var count = data.length;
		//for(var key in data)
		$("#leftlist").children().remove();

		$('#siteMapContainer').children().last().remove();
		$.pushLocation(changeChinese[data[0]['categories']], '/SchoolGuide/'+change[data[0]['categories']]);

		for(var i=0; i<count; i++){
			var name =data[i]['name'];
			var id=data[i]['id'];
			var category = data[i]['categories'];
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
		//$("<img class ='item2' background-position='"+burl+"/images/SchoolGuide/item2.png'>").appendTo("#leftlist").data('place_id', id);

		makeLeftCanClick();
	}

	function makeLeftCanClick(){
		$('.left_item').each(function(){
			$(this).click(function(){
				getId($(this).data('place_id'));
				changePhoto($(this).data('place_id'));
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
		var introduction =data['introduction'];
		$.pushLocation(data['name'], '/SchoolGuide/'+change[data['categories']]+'/'+data['id'])
		$.jumpWindow("",introduction+"<img class='robot' background-position='-960px -727px'>","");
	
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
	$(".item").mouseenter(function(){
		$(this).css({"cursor":"pointer","z-index":"6"});
		})
		.mouseleave(function(){
		$(this).css({"z-index":"2"});
	});

    //=============================================================================
	$("#Zhidao")
	.mouseenter(function(){
		$(this).attr('background-position',"-735px -735px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-799px -737px");
	
	});

	$("#G14")
	.mouseenter(function(){
		$(this).attr('background-position',"-544px -288px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-608px -290px");
	
	});
	$("#G5")
	.mouseenter(function(){
		$(this).attr('background-position',"-672px -288px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-704px -290px");
	
	});



	$("#G14-ground")
	.mouseenter(function(){
		$(this).attr('background-position',"-480px -288px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-511px -291px");
	
	});

		$("#B11")
	.mouseenter(function(){
		$(this).attr('background-position',"-319px 0px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-384px -1px");
	
	});
		$("#B7")
	.mouseenter(function(){
		$(this).attr('background-position',"-1088px 0px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-1152px -2px");
	
	});
		$("#B6")
	.mouseenter(function(){
		$(this).attr('background-position',"-960px 0px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-1024px -128px");
	
	});

	$("#art")
	.mouseenter(function(){
		$(this).attr('background-position',"-128px 0px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-225px -2px");
	
	});

	$("#building")
	.mouseenter(function(){
		$(this).attr('background-position',"-896px -96px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-992px -98px");
	
	});

	$("#B13")
	.mouseenter(function(){
		$(this).attr('background-position',"-576px 0px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-640px -2px");
	
	});

	$("#schoolh")
	.mouseenter(function(){
		$(this).attr('background-position',"-927px -512px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-1022px -514px");
	
	});
		$("#door")
	.mouseenter(function(){
		$(this).attr('background-position',"0px -192px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-64px -194px");
	
	});
		$("#monument")
	.mouseenter(function(){
		$(this).attr('background-position',"-191px -481px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-225px -480px");
	
	});
		$("#B5")
	.mouseenter(function(){
		$(this).attr('background-position',"-832px 0px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-896px -2px");
	
	});

		$("#International")
	.mouseenter(function(){
		$(this).attr('background-position',"-192px -384px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-288px -386px");
	
	});

		$("#B3")
	.mouseenter(function(){
		$(this).attr('background-position',"-704px 0px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-768px -2px");
	
	});

		$("#science-1")
	.mouseenter(function(){
		$(this).attr('background-position',"-1118px -481px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-1210px -483px");
	
	});
		$("#administration")
	.mouseenter(function(){
		$(this).attr('background-position',"0px 0px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-64px -2px");
	
	});

		$("#library")
	.mouseenter(function(){
		$(this).attr('background-position',"-416px -384px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-480px -386px");
	
	});
			$("#tree")
	.mouseenter(function(){
		$(this).attr('background-position',"-480px -739px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-543px -740px");
	
	});
			$("#oldlibrary")
	.mouseenter(function(){
		$(this).attr('background-position',"-1px -576px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-93px -578px");
	
	});
			$("#tai")
	.mouseenter(function(){
		$(this).attr('background-position',"-257px -737px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-359px -739px");
	
	});

			$("#blackbox")
	.mouseenter(function(){
		$(this).attr('background-position',"-384px -96px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-480px -98px");
	
	});
			$("#literary")
	.mouseenter(function(){
		$(this).attr('background-position',"-544px -384px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-640px -386px");
	
	});
	$("#engineer-1")
	.mouseenter(function(){
		$(this).attr('background-position',"-320px -192px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-448px -194px");
	
	});
	$("#engineer-2")
	.mouseenter(function(){
		$(this).attr('background-position',"-576px -192px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-672px -194px");
	
	});
			
	$("#engineer-3")
	.mouseenter(function(){
		$(this).attr('background-position',"-799px -191px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-895px -193px");
	
	});
	$("#engineer-4")
	.mouseenter(function(){
		$(this).attr('background-position',"-992px -192px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-1088px -194px");
	
	});
	$("#engineer-5")
	.mouseenter(function(){
		$(this).attr('background-position',"0px -288px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-128px -289px");
	
	});
	$("#park")
	.mouseenter(function(){
		$(this).attr('background-position',"-546px -480px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-608px -481px");
	
	});
	$("#gym")
	.mouseenter(function(){
		$(this).attr('background-position',"-928px -288px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-1021px -289px");
	
	});

	$("#G-1-4")
	.mouseenter(function(){
		$(this).attr('background-position',"-320px -288px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-416px -290px");
	
	});

	$("#basketball")
	.mouseenter(function(){
		$(this).attr('background-position',"-320px -96px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-352px -98px");
	
	});
	$("#playground")
	.mouseenter(function(){
		$(this).attr('background-position',"-672px -515px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-802px -571px");
	
	});
		
		$("#rock")
	.mouseenter(function(){
		$(this).attr('background-position',"-192px -577px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-224px -579px");
	
	});
		
		$("#swimpool")
	.mouseenter(function(){
		$(this).attr('background-position',"-64px -736px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-159px -738px");
	
	});
		$("#pool")
	.mouseenter(function(){
		$(this).attr('background-position',"-1121px -738px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-384px -386px");
	
	});

			$("#skate")
	.mouseenter(function(){
		$(this).attr('background-position',"0px -734px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-32px -736px");
	
	});
			$("#valley")
	.mouseenter(function(){
		$(this).attr('background-position',"-608px -737px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-640px -739px");
	
	});
	$("#badminton")
	.mouseenter(function(){
		$(this).attr('background-position',"-256px -96px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-298px -109.5px");
	
	});
	$("#wood")
	.mouseenter(function(){
		$(this).attr('background-position',"-384px -737px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-417px -739px");
	});
	$("#science-2")
	.mouseenter(function(){
		$(this).attr('background-position',"-255px -575px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-320px -577px");
	});
	$("#science-3")
	.mouseenter(function(){
		$(this).attr('background-position',"-384px -576px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-479px -578px");
	});
	$("#tennis")
	.mouseenter(function(){
		$(this).attr('background-position',"-672px -735px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-705px -737px");
	});
	$("#mbuilding")
	.mouseenter(function(){
		$(this).attr('background-position',"0px -480px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-97px -479px");
	});
	$("#math")
	.mouseenter(function(){
		$(this).attr('background-position',"-1088px -384px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-1153px -386px");
	});
	$("#management-1")
	.mouseenter(function(){
		$(this).attr('background-position',"-736px -384px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-832px -384px");
	});
	$("#management-2")
	.mouseenter(function(){
		$(this).attr('background-position',"-896px -384px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-992px -385px");
	});
	$("#clibrary")
	.mouseenter(function(){
		$(this).attr('background-position',"-1088px -96px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-1152px -97px");
	});
	$("#Graduate")
	.mouseenter(function(){
		$(this).attr('background-position',"-736px -288px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-832px -290px");
	});
	$("#Hakkas")
	.mouseenter(function(){
		$(this).attr('background-position',"0px -384px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-93px -386px");
	});
	$("#electric")
	.mouseenter(function(){
		$(this).attr('background-position',"-181px -192px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-224px -194px");
	});
	$("#outerspace")
	.mouseenter(function(){
		$(this).attr('background-position',"-383px -480px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-476px -482px");
	});

	$("#ncu")
	.mouseenter(function(){
		$(this).attr('background-position',"-256px -480px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-320px");
	});
	$("#B9")
	.mouseenter(function(){
		$(this).attr('background-position',"0px -96px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-128px -98px");
	});
	$("#B12")
	.mouseenter(function(){
		$(this).attr('background-position',"-448px 0px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-512px -2px");
	});
	$("#lake")
	.mouseenter(function(){
		$(this).attr('background-position',"-352px -384px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-384px -386px");
	});
	$("#science-5")
	.mouseenter(function(){
		$(this).attr('background-position',"-736px -575px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-831px -577px");
	});
	$("#science-4")
	.mouseenter(function(){
		$(this).attr('background-position',"-542px -575px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-636px -577px");
	});
	$("#flower")
	.mouseenter(function(){
		$(this).attr('background-position',"-256px -288px");
	})
	.mouseleave(function(){
		$(this).attr('background-position',"-287px -291px");
	});

	$(window).scroll(function() {
		console.log($(this).scrollTop());
		console.log($('#bigcontent').height());
        if ( $(this).scrollTop() < 439 ){
            $('#fixMap').css({
				position: "absolute",
                top:"0px"
            });
            $('#fixmapLine').hide();
        }
        else if ( $(document).height() - 715 > 439 && $(this).scrollTop() > $(document).height() - 715 ) {
        	$('#fixMap').css({
				position: "absolute",
                top: $('#bigcontent').height() - 680 + 'px'
            });
        }
        else {
             $('#fixMap').css({
				position: "fixed",
				top:"-30px"
             });
             $('#fixmapLine').show();
        }
    });
		
});
