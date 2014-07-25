(function($)
{	
    $(document).ready(function()
    {
    	var mapType = new Array(6);
		$('.gameCampusType').each(function(index) {
			mapType[index] = $(this);
		});
		var life = 3;
		var combo = 0;
		var score = 0;
		var question_number = 0;
    	$("#gameCampusStartButton").click(function() {
    		ajaxPost($(this).attr("action"), '', function(data) {
    			life = 3;
				combo = 0;
				score = 0;
				question_number = 0;
                editStatus(data['user']['power'],data['user']['gp']);
    			if ( data['user']['play'] == true ) {
					$('#gameCampusMain').hide();
					$('#gameCampusMap').show();
					$('#gameCampusQuestion').text('Q' + (question_number+1) + ': ' + data['question']['question']);
                    mapType[data['question']['type']].show();
				}
                else {
                    noPowerDisplay();
                }
    		});
    	});

        $('.gameCampusBuilding').each(function(index) {
            $(this).click(function(){
                ajaxPost($('#gameCampusGameBox').attr('action'), {index: $(this).attr('index')}, function(data) {
                    if ( data['isRight'] == false ) {
                        alert('GG');
                    }
                    editStatus(data['user']['power'],data['user']['gp']);
                    $('.gameCampusType').each(function(index) {
                        $(this).hide();
                    });
                    question_number++;
                    if ( question_number < 10 ) {
                        $('#gameCampusQuestion').text('Q' + (question_number+1) + ': ' + data['question']['question']);
                        mapType[data['question']['type']].show();
                    }
                    else {
                        $('#gameCampusMap').hide();
                        $('#gameCampusScore').text(data['score']);
                        $('#gameCampusEnd').show();

                    }
                });
            });
        });
    	$('#gameCampusAgain').click(function() {
    		$('#gameCampusMain').show();
    		$('#gameCampusEnd').hide();
    	});

    	$('#gameCampusInfoButton').click(function() {
    		$('#gameCampusInfo').fadeIn();
    		$('#gameCampusMain').hide();
    		
    	});

    	$('#gameCampusInfoExit').click(function() {
    		$('#gameCampusInfo').hide();
    		$('#gameCampusMain').show();
    		
    	});
    });
})(jQuery);