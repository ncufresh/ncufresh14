$(function(){

	var clickTime = 0;
	var clickCount = 0;
	$('#admin-git').click(function(e){
		if($.now() - clickTime >= 3000){
			$.alertMessage('若要執行,請在3秒內再點三次');
			clickTime = $.now();
			e.preventDefault();
		}else if(clickCount < 3){
			clickCount++;
			e.preventDefault();
		}else{
			//go
		}

	});
});