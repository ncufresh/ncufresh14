(function($)
{
	function ajax(formURL, postData, success_function, error_function) {
		$.ajax({
			url : formURL,
			type: "POST",
			data : postData,
			success: success_function,
			error: error_function
		});
	}
	
    $(document).ready(function()
    {
    	
    });
})(jQuery);