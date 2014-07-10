$(function(){
	$('.place').click(function(){
		var num = $(this).data("num");
		var formURL = getTransferData('ncu_life_select_url');
		var data = {num: num};
		ajaxGet(formURL, data, changeIntroduction);
	});
	function changeIntroduction(data){
		console.log(data);
		$('#introduction').text(data['introduction']);
	}
	$('#left_buttom').click(function(){
		
	});
	$('#right_buttom').click(function(){
		
	});
});