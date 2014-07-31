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
			var id=data[i]['id'];
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
		//$("<img class ='item2' backgroundPosition='"+burl+"/images/SchoolGuide/item2.png'>").appendTo("#leftlist").data('place_id', id);

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
		$.jumpWindow("",introduction+"<img class='robot' backgroundPosition='-960px -727px'>","");
	
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

	$(window).scroll(function() {
		console.log($(this).scrollTop());
		console.log($(document).height());
        if ( $(this).scrollTop() < 439 ){
            $('#fixMap').css({
				position: "absolute",
                top:"0px"
            });
            $('#fixmapLine').hide();
        }
        else if ( $(document).height() > 715  && $(this).scrollTop() > $(document).height() - 715 ) {
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
