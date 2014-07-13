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
	$(".Img").mouseover(function(){
		$(this).css({"cursor":"pointer"});
	});
    //=============================================================================
	$("#Zhidao")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/志道樓(按).png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/志道樓.png");
	
	});

		$("#G-14")
	.mouseenter(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/女十四舍(按).png");
	})
	.mouseleave(function(){
		$(this).attr('src',"http://localhost/ncufresh14/public/images/SchoolGuide/女十四舍.png");
	
	});


});
