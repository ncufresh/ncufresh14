var titleEmptyMsg = "文章標題";
var contentEmptyMsg = "文章內容";
var commentEmptyMsg = "留言內容";

$(function(){
	var orderNewUrl = $("#orderNewHidden").attr("direct");
	var getCommentsUrl = $("#getComment").attr("direct");
	var createCommentUrl = $("#createComment").attr("direct");
	var orderPopUrl = $("#orderPopHidden").attr("direct");
	var deleteArticleUrl = $("#deleteArticle").attr("direct");
	var updateArticleUrl = $("#updateArticle").attr("direct");
	var newArticleUrl = $("#newArticle").attr("direct");
	$.ajax({
		type:"POST",
		url:orderNewUrl,
		data:{},
		success:function(data){
			for(i=0;i<data['data'].length;i++){
				showArticles(
					data['data'][i]['author_id'],
					data['data'][i]['created_at'],
					data['data'][i]['id'],
					data['data'][i]['title'],
					data['data'][i]['content'],
					"#Test1"
				);
			}
			$("#Test1 .arrow").click(function(){
				var responseContainer = $(this).parent().parent().parent().parent().find(".responseContainer");
				var target = $(this);
				if(responseContainer.css("display")=="none"){
					responseContainer.parent().css("background-color","#FFE6E6");
					var articleID = $(this).parent().attr("id");
					$.ajax({
						type:"POST",
						url: getCommentsUrl,
						data:{
							"articleID":articleID
						},
						success:function(data){
							//alert("getCommentSuccess");
							for(i=0;i<data['data'].length;i++){
								displayComments(
									data['data'][i]['author_id'],
									data['data'][i]['content'],
									data['data'][i]['created_at'],
									responseContainer
								);
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
				var content = $(this).find("#inputContent").val();
				var commenterID = $(this).find("#commenterID").val();
				var articleID = $(this).find(".articleID").attr("id");
				var target = $(this);
				$.ajax({
					type : "POST",
					url : createCommentUrl,
					data : { 
						"comment" : content ,
						"author_id" : commenterID ,
						"article_id" : articleID
					},
					success : function(data){
						var currentTime = getCurrentTime(); 
						displayComments(
							commenterID,
							content,
							currentTime,
							target.parent().parent().find(".responseContainer")
						);
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
	//$("#errorMsgDialog").modal('toggle'); /*-----------------------------------------------------------------------------------------*/
	$("#new").change(function(){
		//alert("new");
		//alert(url);
		$.ajax({
			type : "POST",
			url : orderNewUrl,
			data : { },
			success : function(data){
				//alert("Ajax success");
				$("#Test1 .articleContainer").remove();
				$("#Test1 .postTimeContainer").remove();
				//alert(data['data'].length);
				for(i=0;i<data['data'].length;i++){
					showArticles(
						data['data'][i]['author_id'],
						data['data'][i]['created_at'],
						data['data'][i]['id'],
						data['data'][i]['title'],
						data['data'][i]['content'],
						"#Test1"
					);	
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
									displayComments(
										data['data'][i]['author_id'],
										data['data'][i]['content'],
										data['data'][i]['created_at'],
										responseContainer
									);
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
					var content = $(this).find("#inputContent").val();
					var commenterID = $(this).find("#commenterID").val();
					var articleID = $(this).parent().parent().attr("id");
					var target = $(this);
					$.ajax({
						type : "POST",
						url : createCommentUrl,
						data : { 
							"comment" : content ,
							"author_id" : commenterID ,
							"article_id" : articleID
						},
						success : function(data){
							var currentTime = getCurrentTime();
							displayComments(
								commenterID,
								content,
								currentTime,
								target.parent().parent().find(".responseContainer")
							);
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
					
					showArticles(
						data['data'][i]['author_id'],
						data['data'][i]['created_at'],
						data['data'][i]['id'],
						data['data'][i]['title'],
						data['data'][i]['content'],
						"#Test1"
					);
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
									displayComments(
										data['data'][i]['author_id'],
										data['data'][i]['content'],
										data['data'][i]['created_at'],
										responseContainer
									);
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
					var articleID = $(this).find(".articleID").attr("id");
					var target = $(this);
					$.ajax({
						type : "POST",
						url : createCommentUrl,
						data : { 
							"comment" : content ,
							"author_id" : commenterID ,
							"article_id" : articleID
						},
						success : function(data){
							var currentTime = getCurrentTime();
							displayComments(
								commenterID,
								content,
								currentTime,
								target.parent().parent().find(".responseContainer")
							);
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
		var responseContainer = $(this).parent().parent().parent().parent().find(".responseContainer");
		var target = $(this);
		if(responseContainer.css("display")=="none"){
			responseContainer.parent().css("background-color","#FFE6E6");
			var articleID = $(this).parent().attr("id");
			$.ajax({
				type:"POST",
				url: getCommentsUrl,
				data:{
					"articleID":articleID
				},
				success:function(data){
					for(i=0;i<data['data'].length;i++){
						displayComments(
							data['data'][i]['author_id'],	
							data['data'][i]['content'],
							data['data'][i]['created_at'],
							responseContainer
						);
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

	$("#submitArticle").click(function(){
		var title = $("#inputTitle").val();
		var content =$("#inputDetail").val();
		var authorId = $("#inputAuthor_id").val();
		var type = $("#selectType").val();
		if(title == '' && content == ''){
			$("#errorMsgContent").text("請輸入"+titleEmptyMsg+" , "+contentEmptyMsg);
			$("#errorMsgDialog").modal('toggle');
		}else if(title =='' && content != ''){
			$("#errorMsgContent").text("請輸入"+titleEmptyMsg);
			$("#errorMsgDialog").modal('toggle');
		}else if(title !='' && content ==''){
			$("#errorMsgContent").text("請輸入"+contentEmptyMsg);
			$("#errorMsgDialog").modal('toggle');
		}else{
			$.ajax({
				type:"POST",
				url:newArticleUrl,
				data:{
					"title":title,
					"id":authorId,
					"content":content,
					"article_type":type
				},
				success:function(data){
					$("#inputTitle").val("");
					$("#inputAuthor_id").val("");
					$("#inputDetail").val("");
					$('#myModal').modal('toggle');
					var currentTime = getCurrentTime(); 
					var insertPlace;
					if(type == "P"){
						insertPlace = "#toolBar";
					}else if(type == "D"){
						insertPlace = "#departmentIndex";
					}else if(type == "C"){
						insertPlace = "#clubIndex";
					}
					insertArticle(authorId,currentTime,data.articleId,title,content,insertPlace);
					$(".arrow").click(function(){
						var responseContainer = $(this).parent().parent().parent().parent().find(".responseContainer");
						var target = $(this);
						if(responseContainer.css("display")=="none"){
							responseContainer.parent().css("background-color","#FFE6E6");
							var articleID = $(this).parent().attr("id");
							$.ajax({
								type:"POST",
								url: getCommentsUrl,
								data:{
									"articleID":articleID
								},
								success:function(data){
									for(i=0;i<data['data'].length;i++){
										displayComments(
											data['data'][i]['author_id'],	
											data['data'][i]['content'],
											data['data'][i]['created_at'],
											responseContainer
										);
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
						var articleID = $(this).parent().parent().attr("id");
						var target = $(this);
						$.ajax({
							type : "POST",
							url : createCommentUrl,
							data : { 
								"comment" : content ,
								"author_id" : commenterID ,
								"article_id" : articleID
							},
							success : function(data){
								var currentTime = getCurrentTime(); 
								displayComments(
									commenterID,
									content,
									currentTime,
									target.parent().parent().find(".responseContainer")
								);
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
					alert("Error");
				}
			},"json");

		}
	});

	$(".edit").click(function(){
		var target = $(this).parent().parent().find(".panel-body");
		var btn = $(this);
		var originText = target.text();
		var originHeight = target.css("height");
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

function getCurrentTime(){
	var dateTime = new Date();
	var year = dateTime.getFullYear();
	var month = dateTime.getMonth() + 1;
	var date = dateTime.getDate();
	var hour = dateTime.getHours();
	var minute = dateTime.getMinutes();
	var second = dateTime.getSeconds();
	var currentTime = year+"-"+month+"-"+date+" "+hour+":"+minute+":"+second;
	return currentTime;
}

function showArticles(author,createdAt,articleId,title,content,target){
	$(target).append("\
		<div class='postTimeContainer'>\
			<div class='articlePostTime'>\
				<span class='author'>"+author+"</span>發布於"+createdAt+"\
			</div>\
		</div>"
	);
	$(target).append("\
		<div class='articleContainer' id='"+articleId+"' >\
			<div class='panel panel-default articleBody'>\
				<div class='panel-heading'>\
					<h3 class='panel-title'>"+title+"</h3>\
				</div>\
				<div class='panel-body'>"+content+"</div>\
				<a class='moreBox'>\
					<div class='moreBtn' id='"+articleId+"'>\
						<div class='panel panel-default arrow'>&dArr;</div>\
					</div>\
				</a>\
			</div>\
			<div class='responseContainer'>\
				<form class='commentForm' route='createComment'>\
					<label>回覆貼文</label>\
					<input type='submit' class='btn btn-primary createComment' value='發表回覆'>\
					<input type='text' name='commenterID' class='form-control commenterID' placeholder='Your ID' id='commenterID'>\
					<input type='hidden' name='articleID' id='"+articleId+"' class='articleID'>\
					<input type='textarea' name='comment' class='form-control commentTextArea' id='inputContent'>\
				</form>\
			</div>\
		</div>"
	);
}

function insertArticle(author,currentTime,articleId,title,content,target){
	$(target).after("\
		<div class='articleContainer' id='"+articleId+"' >\
			<div class='panel panel-default articleBody'>\
				<div class='panel-heading'>\
					<h3 class='panel-title'>"+title+"</h3>\
				</div>\
				<div class='panel-body'>"+content+"</div>\
				<a class='moreBox'>\
					<div class='moreBtn' id='"+articleId+"'>\
						<div class='panel panel-default arrow'>&dArr;</div>\
					</div>\
				</a>\
			</div>\
			<div class='responseContainer'>\
				<form class='commentForm' route='createComment'>\
					<label>回覆貼文</label>\
					<input type='submit' class='btn btn-primary createComment' value='發表回覆'>\
					<input type='text' name='commenterID' class='form-control commenterID' placeholder='Your ID' id='commenterID'>\
					<input type='hidden' name='articleID' id='"+articleId+"' class='articleID'>\
					<input type='textarea' name='comment' class='form-control commentTextArea' id='inputContent'>\
				</form>\
			</div>\
		</div>"
	);
	$(target).after("\
		<div class='postTimeContainer'>\
			<div class='articlePostTime'>\
				<span class='author'>"+author+"</span>發布於"+currentTime+"\
			</div>\
		</div>"
	);
	
}

function displayComments(author,content,createdAt,target){
	var comment = "\
		<div class='panel panel-default'>\
			<span class='commentAuthorId'>"+author+"</span><br>\
			<span class='commentContent'>"+content+"</span><br>\
			<span class='commentTime'>"+createdAt+"</span>\
		</div>";
	target.append(comment);
} 



