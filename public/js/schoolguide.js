$(document).ready(function(){
	$("#modal-back").hide();
	var burl = getTransferData('burl');

	var change = ['','department', 'administration', 'scence', 'exercise', 'food', 'dorm'];
	var changeChinese = ['','系館', '行政', '中大十景', '運動', '飲食', '住宿'];
 	
 	$(".left_item").hover(function(){
 		//console.log($(this).data('place_id'));
 	});

	$("#select").change(changeLeft);
	$(".pointer div").click(function(){
		clickImg($(this).data('id'));
		changePhoto($(this).data('id'));
	});
	makeLeftCanClick();	

	if(getTransferData('value') == '1'){
		$("#select").val(getTransferData('select'));
		$.jumpWindow("",getTransferData('intro')+"<div class='robot' backgroundPosition='-1536px -192px'>","");
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
		$("<div class='item2' backgroundPosition='-1536px -352px'>").appendTo("#leftlist");
		makeLeftCanClick();

		hoverTogether();
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
		ajaxGet(url, data, Photo);
	}

	function showPhoto(data){
		var introduction =data['introduction'];
		$.pushLocation(data['name'], '/SchoolGuide/'+change[data['categories']]+'/'+data['id'])
		$.jumpWindow("",introduction+"<div class='robot' backgroundPosition='-1536px -192px'>","");
	
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

	function hoverTogether() {
		$('.left_item').mouseenter(function() {
			var itemId = $(this).attr('data-place_id');
			$('.item').each(function() {
				var thisItem = $(this);
				if ( thisItem.attr('data-id') == itemId ) {
					thisItem.addClass(thisItem.attr('id') + '-hover');
				}
			});
		});

		$('.left_item').mouseleave(function() {
			$('.item').each(function() {
				var thisItem = $(this);
				thisItem.removeClass(thisItem.attr('id') + '-hover');
			});
		});
	}

	hoverTogether();

});
