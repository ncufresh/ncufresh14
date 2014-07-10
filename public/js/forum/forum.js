$(function(){
	$("#myTab a").click(function(e){
		e.preventDefault();
		$(this).tab('show');
	});
	$("#createBtn").click(function(){
		$('#myModal').modal('toggle')
	});
	$(".moreBtn").click(function(){
		//alert("click");
		$(this).parent().parent().parent().find(".responseContainer").slideToggle();
	});
});






































