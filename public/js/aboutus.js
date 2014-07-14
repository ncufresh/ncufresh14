$(document).ready(function(){

	$("#morecontent").click(function(){
		$("#picture").animate({
			width:'50px',
			marginLeft:'-30px'
		},1000);
		$(this).animate({
			width:'850px',
			marginLeft:'-850px'
			},1000);
	});
	$("#picture").click(function(){
		$("#morecontent").animate({
			width:'5%',
			marginLeft:'10px'
		},1000);
		$(this).animate({
			width:'850px',
			marginLeft:'10px'
			},1000);
	});

	$(".window").hide();

	$(".item").click(OpenModal($(this).data('id')));

	public function OpenModal(id){
		var url = getTransferData('modal');
		var data = {id:id};
	}
});
