$(function(){
	var LorP = 'Picture';
	var canDrag = false;
	var drag = $('#1').draggable({
				containment: '#containment'
        		});
	var bURL = getTransferData('burl');
	DragLocal();

	$('#place').jScrollPane(
		{
			mouseWheelSpeed: 140
		});

	$('#introductionbox').jScrollPane();

	$('.place1').addClass("placeClick");
	
	$('.place').click(function(){
		var num = $(this).data("num");
		var id = $(this).data("id");
		var formURL = getTransferData('ncu_life_select_url');
		var data = {num: num};
		$('.place').removeClass("placeClick");
		$('.place' + id).addClass("placeClick");
		canDrag = false;
		DragLocal();
		ajaxGet(formURL, data, changeIntroductionAndImage);
	});

	$('#buttom').click(function(){
		var num = $(this).data("num");
		var formURL = getTransferData('ncu_life_select_url');
		var data = {num: num};
		if(LorP == 'Picture')
		{	
			LorP = 'Local';
			canDrag = true;
			DragLocal();
			ajaxGet(formURL, data, changeLocal);
		}
		else if(LorP == 'Local')
		{	
			LorP = 'Picture';
			canDrag = false;
			DragLocal();
			ajaxGet(formURL, data, changePicture);	
		}
	});

	$('.select').click(function(){
		var num = $(this).data("num");
		var id = $(this).data("id");
		var formURL = getTransferData('ncu_life_selectpicture_url');
		var data = {num: num};
		$('.select').css("background-image", "url(../images/nculife/item_img.png)");
		$('.select').css("background-position", "0px -608px");
		$('#select' + id).css("background-image", "url(../images/nculife/item_img.png)");
		$('#select' + id).css("background-position", "-64px -608px");
		ajaxGet(formURL, data, selectPicture);
	});

	function changeIntroductionAndImage(data){
		$('#introductionbox2').html(data['result']['introduction']);
		$('#introductionbox').jScrollPane();
		$('#introductionbox').scrollTop();
		$('#buttom').data("num", data['result']['id']);
		if(LorP == 'Picture')
		{
			$('#picture_select').remove();
			$('#img').remove();
			$('#picture').append('<div id="picture_select"></div>');
			i = data['pictures'].length;
			var j = 0;
			for(j;j<i;j++)
			{
				$('#picture_select').append('<div id="select' + (j+1) + '" class="select" data-num="' + data['pictures'][j].picture_id + '" data-id="' + (j+1) + '" ></div> ');
			}
			$('#picture').append('<div id="img"></div>');
			$('#img').append('<img id="1" class="img" class="img" src="' + bURL + "/img/uploadImage/" + data['pictures'][0]['picture_admin'].file_name +'">');
			$('#buttom').css("background-image", "url(../images/nculife/item_img.png)");
			$('#buttom').css("background-position", "0px -544px");
			drag = $('#1').draggable({
					containment: '#containment'
        			});
			DragLocal();
			$('.select').click(function(){
				var num = $(this).data("num");
				var formURL = getTransferData('ncu_life_selectpicture_url');
				var data = {num: num};
				var id = $(this).data("id");
				$('.select').css("background-image", "url(../images/nculife/item_img.png)");
				$('.select').css("background-position", "0px -608px");
				$('#select' + id).css("background-image", "url(../images/nculife/item_img.png)");
				$('#select' + id).css("background-position", "-64px -608px");
				ajaxGet(formURL, data, selectPicture);
			});
			LorP = 'Picture';
		}
		else if(LorP == 'Local')
		{
			$('#img').remove();
			$('#containment').remove();
			$('#picture').append('<div id="picture_select"></div>');
			i = data['pictures'].length;
			var j = 0;
			for(j;j<i;j++)
			{
				$('#picture_select').append('<div id="select' + (j+1) + '" class="select" data-num="' + data['pictures'][j].picture_id + '" data-id="' + (j+1) + '" ></div> ');
			}
			$('#picture').append('<div id="img"></div>');
			$('#img').append('<img id="1" class="img" src="' + bURL + "/img/uploadImage/" + data['pictures'][0]['picture_admin'].file_name +'">');
			$('#buttom').css("background-image", "url(../images/nculife/item_img.png)");
			$('#buttom').css("background-position", "0px -544px");
			drag = $('#1').draggable({
					containment: '#containment'
        			});
			DragLocal();
			$('.select').click(function(){
				var num = $(this).data("num");
				var formURL = getTransferData('ncu_life_selectpicture_url');
				var data = {num: num};
				var id = $(this).data("id");
				$('.select').css("background-image", "url(../images/nculife/item_img.png)");
				$('.select').css("background-position", "0px -608px");
				$('#select' + id).css("background-image", "url(../images/nculife/item_img.png)");
				$('#select' + id).css("background-position", "-64px -608px");
				ajaxGet(formURL, data, selectPicture);
			});
			LorP = 'Picture';
		}
		var length = data['local'].length;
		if(length == 1)
		{
			$('#buttom').show();
		}
		else if(length == 0)
		{
			$('#buttom').hide();
		}
	}

	function changePicture(data){
		var i = data['pictures'].length;
		var j = 0;
		$('#img').remove();
		$('#containment').remove();
		$('#picture').append('<div id="picture_select"></div>');
		for(j;j<i;j++)
		{
			$('#picture_select').append('<div id="select' + (j+1) + '" class="select" data-num="' + data['pictures'][j].picture_id + '" data-id="' + (j+1) + '" ></div> ');
		}
		$('#picture').append('<div id="img"></div>');
		$('#img').append('<img id="1" class="img" src="' + bURL + "/img/uploadImage/" + data['pictures'][0]['picture_admin'].file_name +'">');
		$('#buttom').css("background-image", "url(../images/nculife/item_img.png)");
		$('#buttom').css("background-position", "0px -544px");
		drag = $('#1').draggable({
				containment: '#containment'
        		});
		DragLocal();
		$('.select').click(function(){
			var num = $(this).data("num");
			var formURL = getTransferData('ncu_life_selectpicture_url');
			var data = {num: num};
			var id = $(this).data("id");
			$('.select').css("background-image", "url(../images/nculife/item_img.png)");
			$('.select').css("background-position", "0px -608px");
			$('#select' + id).css("background-image", "url(../images/nculife/item_img.png)");
			$('#select' + id).css("background-position", "-64px -608px");
			ajaxGet(formURL, data, selectPicture);
		});
	}

	function changeLocal(data){
		$('#picture_select').remove();
		$('#img').remove();
		$('#picture').append('<div id="img"></div>');
		$('#img').append('<div id="border"></div>');
		$('#border').css("width", "515px").css("height", "317px").css("margin-top", "170px").css("margin-left", "60px").css("overflow", "hidden");
		$('#border').append('<img id="1" class="img" src="' + bURL + "/img/uploadImage/" + data['local'][0].file_name +'">');
		$('#1').css("width", "783px").css("height", "522px").css("margin-top", "0px").css("margin-left", "0px").css("top", data['result']['top']).css("left", data['result']['left']);
		$('#picture').append('<div id="containment"></div>');
		$('#buttom').css("background-image", "url(../images/nculife/item_img.png)");
		$('#buttom').css("background-position", "0px -576px");
		drag = $('#1').draggable({
				containment: '#containment'
	        	});
		DragLocal();
	}

	function selectPicture(data){
		$('#1').attr("src", bURL + "/img/uploadImage/" + data['pictures'][0]['picture_admin'].file_name);
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