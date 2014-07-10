$(function(){
$('.place').click(function(){
	var postData = 'num=' + $(this).attr("num");
	var formURL = 'select';
	$.ajax(
	{
		url: formURL,
		type: "POST",
		data: postData,
		success:function(data)
				{
					
				},
		error:function()
			  {

		      }
	});
});
});