$(function(){

	if(getTransferData('register-type') == 'email'){
		changeToEmail();
	}else if(getTransferData('register-type') == 'FB'){
		changeToFB();
	}

	$('#register-right').click(function(){
		pushLocation('一般註冊', '/register/email');
		changeToEmail();
	});

	function changeToEmail(){
		$('#register-mid').animate({opacity: 0, rotate: '+=360deg'}, 1000, function(){$(this).css({display: 'none'})});
		$('#register-left').animate({opacity: 0, left: '-500px'}, 1000, function(){$(this).css({display: 'none'})});
		$('#register-right').animate({opacity: 0, left: '1450px'}, 1000, function(){$(this).css({display: 'none'})});

		$('#normal').css({display: 'block', opacity: 0}).animate({opacity: 1}, 2000);
	}

	function changeToFB(){
		$('#register-mid').animate({opacity: 0, rotate: '+=360deg'}, 1000, function(){$(this).css({display: 'none'})});
		$('#register-left').animate({opacity: 0, left: '-500px'}, 1000, function(){$(this).css({display: 'none'})});
		$('#register-right').animate({opacity: 0, left: '1450px'}, 1000, function(){$(this).css({display: 'none'})});

		$('#fb').css({display: 'block', opacity: 0}).animate({opacity: 1}, 2000);
	}

	$("#high_school").autocomplete({
		source: getTransferData('register-high-school-url'),
		minLength: 1,
		messages: {
			noResults: '',
			results: function() {}
		}
	});
});