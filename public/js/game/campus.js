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
    	var mapType = new Array(6);
		$('.gameCampusType').each(function(index) {
			mapType[index] = $(this);
		});
    	$("#gameCampusStartButton").click(function() {
    		ajax($(this).attr("action"), $(this).serializeArray(), function(data, textStatus, jqXHR) {


    			function nextQuestion() {
    				$('#gameCampusQuestion').text('Q' + (question_number+1) + ': ' + data['question' + question_number]['question']);
					mapType[data['question' + question_number]['type']].show();
    			}
    			var life = 3;
    			var combo = 0;
    			var score = 0;
    			var question_number = 0;
				$('#gameCampusMain').hide();
				$('#gameCampusMap').show();
				nextQuestion();
				$('.gameCampusBuilding').click(function(){
					mapType[data['question' + question_number]['type']].hide();
					question_number++;
					if ( question_number < 10 ) {
						nextQuestion();	
					}
					else {
						$('#gameCampusMap').hide();
						$('#gameCampusEnd').show();
					}
					
				});
    		}, function() {

    		});
    	});
    });
})(jQuery);