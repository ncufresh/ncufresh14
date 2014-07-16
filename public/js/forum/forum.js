$(function(){

	var url = $("#new").attr("direct");
	var getCommentsUrl = $("#getComment").attr("direct");
	var createUrl = $("#createComment").attr("direct");
	var orderPopUrl = $("#orderPopHidden").attr("direct");
	var deleteArticleUrl = $("#deleteArticle").attr("direct");
	var updateArticleUrl = $("#updateArticle").attr("direct");
	//alert(url);
	//alert(getCommentsUrl);
	//alert(createUrl);
	$.ajax({
		type:"POST",
		url:url,
		data:{},
		success:function(data){
			//alert("Ajax success");
			//alert(data['data'].length);
			for(i=0;i<data['data'].length;i++){
				$("#Test1").append("<div class='postTimeContainer'><div class='articlePostTime'><span class='author'>"+data['data'][i]['author_id']+"</span>posted"+data['data'][i]['created_at']+"</div></div>");
				$("#Test1").append("<div class='articleContainer' id='"+data['data'][i]['id']+"' ><div class='panel panel-default articleBody'><div class='panel-heading'><h3 class='panel-title'>"+data['data'][i]['title'] +" </h3></div><div class='panel-body'>"+data['data'][i]['content']+"</div><a class='moreBox'><div class='moreBtn' id='"+data['data'][i]['id']+"' direct='"+getCommentsUrl+"'><div class='panel panel-default arrow'>&dArr;</div></div></a></div><div class='responseContainer'><form class='commentForm' route='createComment' direct='"+createUrl+"'><label>回覆貼文</label><input type='submit' class='btn btn-primary createComment' value='發表回覆'><input type='text' name='commenterID' class='form-control commenterID' placeholder='Your ID' id='commenterID'><input type='hidden' name='articleID' id='"+data['data'][i]['id']+"' class='articleID'><input type='textarea' name='comment' class='form-control commentTextArea' id='inputContent'></form></div></div>");
			}
				$("#Test1 .arrow").click(function(){
					//alert("arrow");
					var responseContainer = $(this).parent().parent().parent().parent().find(".responseContainer");
					var target = $(this);
					if(responseContainer.css("display")=="none"){
						responseContainer.parent().css("background-color","#FFE6E6");
						var articleID = $(this).parent().attr("id");
						//alert("articleID:"+articleID);
						$.ajax({
							type:"POST",
							url: getCommentsUrl,
							data:{
								"articleID":articleID
							},
							success:function(data){
								//alert("getCommentSuccess");
								for(i=0;i<data['data'].length;i++){
									var comment = "<div class='panel panel-default'><span class='commentAuthorId'>"+data['data'][i]['author_id']+"</span><br><span class='commentContent'>"+data['data'][i]['content']+"</span><br><span class='commentTime'>"+data['data'][i]['created_at']+"</span></div>";
									responseContainer.append(comment);
								}
							},
							error:function(){
								alert("Getting Comment Failed");
							}
						},"json");
					}
					if(responseContainer.css("display")=="block"){
						responseContainer.parent().css("background-color","#FFFFFF");
						responseContainer.children(".panel").remove();
					}
					responseContainer.slideToggle(); 
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
							//alert("Ajax Success");
							var dateTime = new Date();
							var currentTime = dateTime.getFullYear()+"-"+dateTime.getMonth()+1+"-"+dateTime.getDate()+" "+dateTime.getHours()+":"+dateTime.getMinutes();
							var comment = "<div class='panel panel-default'><span class='commentAuthorId'>"+commenterID+"</span><br><span class='commentContent'>"+content+"</span><br><span class='commentTime'>"+currentTime+"</span></div>";
							target.parent().parent().find(".responseContainer").append(comment);
							target.find("#inputContent").val("");
							target.find("#commenterID").val("");
						},
						error :function(){
							alert("Error");
						}	
					},"json");
				});
		},
		error:function(){
			alert("ERROR");
		}
	},"json");

	$("#myTab a").click(function(e){
		e.preventDefault();
		$(this).tab('show');
	});
	$("#createBtn").click(function(){
		$('#myModal').modal('toggle');
	});
	$("#new").change(function(){
		//alert("new");
		//alert(url);
		$.ajax({
			type : "POST",
			url : url,
			data : { },
			success : function(data){
				//alert("Ajax success");
				$("#Test1 .articleContainer").remove();
				$("#Test1 .postTimeContainer").remove();
				//alert(data['data'].length);
				for(i=0;i<data['data'].length;i++){
					
					$("#Test1").append("<div><div class='postTimeContainer'><div class='articlePostTime'><span class='author'>"+data['data'][i]['author_id']+"</span>posted"+data['data'][i]['created_at']+"</div></div></div>");
					$("#Test1").append("<div class='articleContainer' id='"+data['data'][i]['id']+"' ><div class='panel panel-default articleBody'><div class='panel-heading'><h3 class='panel-title'>"+data['data'][i]['title'] +" </h3></div><div class='panel-body'>"+data['data'][i]['content']+"</div><a class='moreBox'><div class='moreBtn' id='"+data['data'][i]['id']+"' direct='"+getCommentsUrl+"'><div class='panel panel-default arrow' >&dArr;</div></div></a></div><div class='responseContainer'><form class='commentForm' route='createComment' direct='"+createUrl+"'><label>回覆貼文</label><input type='submit' class='btn btn-primary createComment' value='發表回覆'><input type='text' name='commenterID' class='form-control commenterID' placeholder='Your ID' id='commenterID'><input type='hidden' name='articleID' id='"+data['data']['id']+"' class='articleID'><input type='textarea' name='comment' class='form-control commentTextArea' id='inputContent'></form></div></div>");
				}
				$("#Test1 .arrow").click(function(){
					//alert("arrow");
					var responseContainer = $(this).parent().parent().parent().parent().find(".responseContainer");
					var target = $(this);
					if(responseContainer.css("display")=="none"){
						responseContainer.parent().css("background-color","#FFE6E6");
						var articleID = $(this).parent().attr("id");
						//alert("articleID:"+articleID);
						$.ajax({
							type:"POST",
							url: getCommentsUrl,
							data:{
								"articleID":articleID
							},
							success:function(data){
								//alert("getCommentSuccess");
								for(i=0;i<data['data'].length;i++){
									var comment = "<div class='panel panel-default'><span class='commentAuthorId'>"+data['data'][i]['author_id']+"</span><br><span class='commentContent'>"+data['data'][i]['content']+"</span><br><span class='commentTime'>"+data['data'][i]['created_at']+"</span></div>";
									responseContainer.append(comment);
								}
							},
							error:function(){
								alert("Getting Comment Failed");
							}
						},"json");
					}
					if(responseContainer.css("display")=="block"){
						responseContainer.parent().css("background-color","#FFFFFF");
						responseContainer.children(".panel").remove();
					}
					responseContainer.slideToggle(); 
				});
				$(".commentForm").submit(function(e){
					e.preventDefault();
					alert("");
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
							//alert("Ajax Success");
							var dateTime = new Date();
							var currentTime = dateTime.getFullYear()+"-"+dateTime.getMonth()+1+"-"+dateTime.getDate()+" "+dateTime.getHours()+":"+dateTime.getMinutes();
							var comment = "<div class='panel panel-default'><span class='commentAuthorId'>"+commenterID+"</span><br><span class='commentContent'>"+content+"</span><br><span class='commentTime'>"+currentTime+"</span></div>";
							target.parent().parent().find(".responseContainer").append(comment);
							target.find("#inputContent").val("");
							target.find("#commenterID").val("");
						},
						error :function(){
							alert("Error");
						}	
					},"json");
				});
			},
			error : function(){
				alert("ERROR");
			}
		},"json");
	});
	$("#pop").change(function(){
		//alert("pop");
		$.ajax({
			type : "POST",
			url : orderPopUrl,
			data : { },
			success : function(data){
				$("#Test1 .postTimeContainer").remove();
				$("#Test1 .articleContainer").remove();
				for(i=0;i<data['data'].length;i++){
					
					$("#Test1").append("<div><div class='postTimeContainer'><div class='articlePostTime'><span class='author'>"+data['data'][i]['author_id']+"</span>posted"+data['data'][i]['created_at']+"</div></div></div>");
					$("#Test1").append("<div class='articleContainer' id='"+data['data'][i]['id']+"' ><div class='panel panel-default articleBody'><div class='panel-heading'><h3 class='panel-title'>"+data['data'][i]['title'] +" </h3></div><div class='panel-body'>"+data['data'][i]['content']+"</div><a class='moreBox'><div class='moreBtn' id='"+data['data'][i]['id']+"' direct='"+getCommentsUrl+"'><div class='panel panel-default arrow' >&dArr;</div></div></a></div><div class='responseContainer'><form class='commentForm' route='createComment' direct='"+createUrl+"'><label>回覆貼文</label><input type='submit' class='btn btn-primary createComment' value='發表回覆'><input type='text' name='commenterID' class='form-control commenterID' placeholder='Your ID' id='commenterID'><input type='hidden' name='articleID' id='"+data['data']['id']+"' class='articleID'><input type='textarea' name='comment' class='form-control commentTextArea' id='inputContent'></form></div></div>");
				}
				$("#Test1 .arrow").click(function(){
					//alert("arrow");
					var responseContainer = $(this).parent().parent().parent().parent().find(".responseContainer");
					var target = $(this);
					if(responseContainer.css("display")=="none"){
						responseContainer.parent().css("background-color","#FFE6E6");
						var articleID = $(this).parent().attr("id");
						//alert("articleID:"+articleID);
						$.ajax({
							type:"POST",
							url: getCommentsUrl,
							data:{
								"articleID":articleID
							},
							success:function(data){
								//alert("getCommentSuccess");
								for(i=0;i<data['data'].length;i++){
									var comment = "<div class='panel panel-default'><span class='commentAuthorId'>"+data['data'][i]['author_id']+"</span><br><span class='commentContent'>"+data['data'][i]['content']+"</span><br><span class='commentTime'>"+data['data'][i]['created_at']+"</span></div>";
									responseContainer.append(comment);
								}
							},
							error:function(){
								alert("Getting Comment Failed");
							}
						},"json");
					}
					if(responseContainer.css("display")=="block"){
						responseContainer.parent().css("background-color","#FFFFFF");
						responseContainer.children(".panel").remove();
					}
					responseContainer.slideToggle(); 
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
							//alert("Ajax Success");
							var dateTime = new Date();
							var currentTime = dateTime.getFullYear()+"-"+dateTime.getMonth()+1+"-"+dateTime.getDate()+" "+dateTime.getHours()+":"+dateTime.getMinutes();
							var comment = "<div class='panel panel-default'><span class='commentAuthorId'>"+commenterID+"</span><br><span class='commentContent'>"+content+"</span><br><span class='commentTime'>"+currentTime+"</span></div>";
							target.parent().parent().find(".responseContainer").append(comment);
							target.find("#inputContent").val("");
							target.find("#commenterID").val("");
						},
						error :function(){
							alert("Error");
						}	
					},"json");
				});
			},
			error : function(){

			}
		},"json");
	});
	$(".arrow").click(function(){
		//alert("arrow");
		var responseContainer = $(this).parent().parent().parent().parent().find(".responseContainer");
		var target = $(this);
		if(responseContainer.css("display")=="none"){
			responseContainer.parent().css("background-color","#FFE6E6");
			var articleID = $(this).parent().attr("id");
			//alert("articleID:"+articleID);
			$.ajax({
				type:"POST",
				url: getCommentsUrl,
				data:{
					"articleID":articleID
				},
				success:function(data){
					//alert("getCommentSuccess");
					for(i=0;i<data['data'].length;i++){
						var comment = "<div class='panel panel-default'><span class='commentAuthorId'>"+data['data'][i]['author_id']+"</span><br><span class='commentContent'>"+data['data'][i]['content']+"</span><br><span class='commentTime'>"+data['data'][i]['created_at']+"</span></div>";
						responseContainer.append(comment);
					}
				},
				error:function(){
					alert("Getting Comment Failed");
				}
			},"json");
		}
		if(responseContainer.css("display")=="block"){
			responseContainer.parent().css("background-color","#FFFFFF");
			responseContainer.children(".panel").remove();
		}
		responseContainer.slideToggle(); 
	});
	$(".edit").click(function(){
		var target = $(this).parent().parent().find(".panel-body");
		var btn = $(this);
		//alert(target.text());
		//alert(target.attr("class"));
		var originText = target.text();
		var originHeight = target.css("height");
		//alert(originHeight);
		target.empty();
		target.append("<button type='button' class='btn btn-default btn-sm delBtn'>刪除貼文</button>");
		target.append("<input type='textarea' class='form-control editArea' value='"+originText+"'>");
		target.append("<button type='button' class='btn btn-primary btn-sm saveBtn'>儲存編輯</button>");
		target.append("<button type='button' class='btn btn-default btn-sm canBtn'>取消</button>");
		$(".editArea").css("height",originHeight);
		$(this).css("display","none");
			$(".canBtn").click(function(){
				target.text(originText);
				btn.css("display","inline-block");
			});
			$(".delBtn").click(function(){
				var articleId = $(this).parent().parent().parent().attr("id");
				//alert(articleId);
				var delBtn = $(this);
				$.ajax({
					type:"POST",
					url:deleteArticleUrl,
					data:{
						"id":articleId
					},
					success:function(){
						alert("Ajax Success");
						delBtn.parent().parent().parent().parent().remove();
					},
					error:function(){
						alert("Ajax error");
					}
				},"json");
			});
			$(".saveBtn").click(function(){
				//alert("click");
				var articleId = $(this).parent().parent().parent().attr("id");
				var newContent = $(this).parent().find(".editArea").val();
				//alert(articleId);
				$.ajax({
					type:"POST",
					url: updateArticleUrl,
					data:{
						"id":articleId,
						"content":newContent
					},
					success:function(){
						target.text(newContent);
						btn.css("display","inline-block");
					},
					error:function(){
						alert("Ajax Error");
					}
				},"json");
			});







	});	
});


