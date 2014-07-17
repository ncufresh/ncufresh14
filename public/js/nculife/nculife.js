$(function(){

	var LorP = 'picture';
	var canDrag = false;
	var drag = $('#1').draggable({
				containment: '#containment'
        		});
	var bURL = getTransferData('burl');
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

	$('.select').click(function(){

	});

	function changeIntroductionAndImage(data){
		var i = data['pictures'].length;
		$('#introduction').text(data['result']['introduction']);
		$('#1').attr("src", bURL + "/img/uploadImage/" + data['pictures'][0]['picture_admin'].file_name);
		$('#buttom').data("num", data['result']['id']);
		$('#1').css("width", "100%");
		$('#1').css("height", "100%");
		$('#1').css("top", "0px");
		$('#1').css("left", "0px");
	}

	function changePicture(data){
		var i = data['pictures'].length;
		var j = 0;
		$('#img').remove();
		$('#containment').remove();
		$('#picture').append('<div id="picture_select"></div>');
		for(j;j<i;j++)
		{
			$('#picture_select').append('<div id="' + data['pictures'][j].picture_id + '" class="select">' + (j+1) +'</div> ');
		}
		$('#picture').append('<div id="img"></div>');
		$('#img').append('<img id="1" src="' + bURL + "/img/uploadImage/" + data['pictures'][0]['picture_admin'].file_name +'">');
		$('#1').css("width", "100%").css("height", "100%").css("top", "0px").css("left", "0px");
	}

	function changeLocal(data){
		$('#1').attr("src", bURL + "/img/uploadImage/" + data['local'][0].file_name);
		var j=2;
		for(j;j<i;j++)
		{
			$('#' + j).remove();
		}
		$('#1').css("width", "140%").css("height", "140%");
		$('#picture_select').remove();
		$('#picture').append('<div id="containment"></div>');
		$('#img').css("top", "0px");
		// $('#1').css("top", "0px");
		// $('#1').css("left", "0px");
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