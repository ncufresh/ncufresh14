$(function(){
	var bURL = getTransferData('burl');
	var drag = $('#local').draggable({
				containment: '#containment',
				stop: function(){
	        				var left = $('#local').css('left');
	        				var top = $('#local').css('top');
	        				$("#top").attr("value", top);
	        				$("#left").attr("value", left);
    					}
        		});

	$( "#ajax-local-form" ).submit(function(event){
		event.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			url: getTransferData('ncu_life_imageupload_url'),
			type: 'POST',
			data:  formData,
			mimeType:"multipart/form-data",
			contentType: false,
			cache: false,
			processData:false,
			success: UploadAndchangeLocalId
		});
    	event.preventDefault();
	});

	$( "#ajax-picture-form" ).submit(function(event){
		event.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			url: getTransferData('ncu_life_imageupload_url'),
			type: 'POST',
			data:  formData,
			mimeType:"multipart/form-data",
			contentType: false,
			cache: false,
			processData:false,
			success: UploadAndchangePictureId
		});
    	event.preventDefault();
	});

	function UploadAndchangeLocalId(data){
		data = $.parseJSON(data);
		$('#local_id').val(data["id"]);
		$('#local').attr("src", bURL + "/img/uploadImage/" + data['file_name']);
		$('#local').css("width", "100%");
		$('#local').css("height", "100%");
	}

	function UploadAndchangePictureId(data){
		data = $.parseJSON(data);
		$('#picture_id').val(data["id"]);
		$('#picture').attr("src", bURL + "/img/uploadImage/" + data['file_name']);
		$('#picture').css("width", "100%");
		$('#picture').css("height", "100%");
	}
})