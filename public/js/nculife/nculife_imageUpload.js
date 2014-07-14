$(function(){
	$('#Upload').click(function(){
		var formURL = getTransferData('ncu_life_imageupload_url');
		console.log(formURL);
		data = {upload: $('#imageUpload').val(), response_type: 'json'};
		ajaxPost(formURL, data, changeIntroductionAndImage1);
	});

	function changeIntroductionAndImage1(data){
		console.log(data);
	}
})