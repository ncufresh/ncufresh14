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
		var response = $(this).parent().parent().parent().find(".responseContainer");
		var url = $(this).attr("direct");
		var target = $(this);
		if(response.css("display")=="none"){
			response.parent().css("background-color","#FFE6E6");
			var articleID = $(this).attr("id");
			//alert(articleID);
			$.ajax({
				type:"POST",
				url : url,
				data : {
					"articleID" : articleID
				},
				success : function(data){
					//alert("Ajax success");
					for(i=0;i<data['data'].length;i++)
					{
						//alert(data['data'][i]["id"]);
						var responseContainer = target.parent().parent().parent().find(".responseContainer");
						responseContainer.append("<div class='panel panel-default'>"+data['data'][i]['content']+"</div>");
					}
				},
				error : function(data){
					alert("Ajax error");
				}
			},"json");
		}
		if(response.css("display")=="block"){
			response.parent().css("background-color","#FFFFFF");
		}
		response.slideToggle();
	});
	$(".commentForm").submit(function(e){
		e.preventDefault();
		//alert("");
		var content = $(this).find("#inputContent").val();
		var commenterID = $(this).find("#commenterID").val();
		var url = $(this).attr("direct");
		var articleID = $(this).find(".articleID").attr("id");
		//alert("Content:"+content);
		//alert("authorID:"+commenterID);
		//alert("articleID"+articleID);
		var target = $(this);
		$.ajax({
			type : "POST",
			url : url,
			data : { 
				"comment" : content ,
				"author_id" : commenterID ,
				"article_id" : articleID
			},
			success : function(data){
				alert("Ajax Success");
				target.parent().parent().find(".responseContainer").append("<div class='panel panel-default'>"+content+"</div>");
			},
			error :function(){
				alert("Error");
			}	
		},"json");
	});
});






































