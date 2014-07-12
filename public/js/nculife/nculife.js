$(function(){

	var LorP = 'picture';
	var canDrag = false;
	var drag = $('#image').draggable({
				containment: '#containment'
        		});
	DragLocal();

	$('.place').click(function(){
		var num = $(this).data("num");
		var formURL = getTransferData('ncu_life_select_url');
		var data = {num: num};
		LorP = 'picture';
		canDrag = false;
		DragLocal();
		ajaxGet(formURL, data, changeIntroductionAndImage);
	});

	$('#buttom').click(function(){
		var num = $(this).data("num");
		var formURL = getTransferData('ncu_life_select_url');
		var data = {num: num};
		if(LorP == 'picture')
		{	
			LorP = 'Local';
			canDrag = true;
			DragLocal();
			ajaxGet(formURL, data, changeLocal);
		}
		else if(LorP == 'Local')
		{	
			LorP = 'picture';
			canDrag = false;
			DragLocal();
			ajaxGet(formURL, data, changePicture);	
		}
	});

	function changeIntroductionAndImage(data){
		$('#introduction').text(data['introduction']);
		$('#image').attr("src", "http://localhost/ncufresh14/public/images/nculife/" + data['picture']);
		$('#buttom').data("num", data['id']);
		$('#image').css("width", "100%");
		$('#image').css("height", "100%");
		$('#image').css("top", "0px");
		$('#image').css("left", "0px");
	}

	function changePicture(data){
		$('#image').attr("src", "http://localhost/ncufresh14/public/images/nculife/" + data['picture']);
		$('#image').css("width", "100%");
		$('#image').css("height", "100%");
		$('#image').css("top", "0px");
		$('#image').css("left", "0px");
	}

	function changeLocal(data){
		$('#image').attr("src", "http://localhost/ncufresh14/public/images/nculife/" + data['local']);
		$('#image').css("width", "140%");
		$('#image').css("height", "140%");
	}

	function DragLocal(){
		if(canDrag == true)
		{
			drag.draggable('enable');
		}
		else if(canDrag == false)
		{
			drag.draggable('disable');
		}
	}
})