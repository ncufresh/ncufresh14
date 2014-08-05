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
        var now_question_number = 0;
        var life_img = new Array(3);
        $(".gameCampusLife").each(function(index) {
            life_img[index] = $(this);
        });
    	$("#gameCampusStartButton").click(function() {
            $(".gameCampusLife").each(function(index) {
                $(this).removeClass('gameCampusLifeWrong');
            });
    		ajaxPost($(this).attr("action"), '', function(data) {
    			life = 3;
				combo = 0;
				score = 0;
				question_number = 0;
                now_question_number = 0;
                editStatus(data['user']['power'],data['user']['gp']);
    			if ( data['user']['play'] == true ) {
					$('#gameCampusMain').hide();
					$('#gameCampusMap').show();
					$('#gameCampusQuestion').text('Q' + (question_number+1) + ': ' + data['question']['question']);
                    mapType[data['question']['type']-1].show();
				}
                else {
                    noPowerDisplay();
                }
    		});
    	});

        $('.gameCampusBuilding').each(function(index) {
            $(this).click(function(){
                if ( question_number == now_question_number ) {
                    $('.gameCampusType').each(function(index) {
                        $(this).hide();
                    });
                    ajaxPost($('#gameCampusGameBox').attr('action'), {index: $(this).attr('index')}, function(data) {
                        if ( data['isRight'] == false ) {
                            $.alertMessage('你答錯囉~');
                            if ( life > 0 ) {
                                life_img[3-life].addClass('gameCampusLifeWrong');
                                life--;
                            }
                        }
                        else {
                            $.alertMessage('你答對囉~');
                        }
                        editStatus(data['user']['power'],data['user']['gp']);                        
                        question_number++;
                        now_question_number = question_number;
                        if ( question_number < 10 ) {
                            $('#gameCampusQuestion').text('Q' + (question_number+1) + ': ' + data['question']['question']);
                            mapType[data['question']['type']-1].show();
                        }
                        else {
                            $('#gameCampusMap').hide();
                            $('#gameCampusScore').text('你的分數: ' + data['score']);
                            $('#gameCampusEnd').show();

                        }
                    });
                }
                now_question_number++;
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