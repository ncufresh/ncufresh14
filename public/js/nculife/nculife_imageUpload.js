$(function(){
	var bURL = getTransferData('burl');
	$( "#ajax-image-form" ).submit(function(event){
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
			success: UploadAndchangeLocaId
		});
    	event.preventDefault();
	});

	function UploadAndchangeLocaId(data){
		data = $.parseJSON(data);
		console.log(data);
		$('#local_id').val(data["id"]);
		$('#image').attr("src", bURL + "/img/uploadImage/" + data['file_name']);
		$('#image').css("width", "100%");
		$('#image').css("height", "100%");
	}
})