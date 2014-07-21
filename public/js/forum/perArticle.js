var createCommentUrl;
var deleteArticleUrl;
var updateArticleUrl;
$(function(){
	createCommentUrl = $("#createComment").attr("direct");
	deleteArticleUrl = $("#deleteArticle").attr("direct");
	updateArticleUrl = $("#updateArticle").attr("direct");
	var articleTitle = $("#articleTitle").attr("articleTitle");
	var articleId = $("#articleId").attr("articleId");
	$.pushLocation(articleTitle, '/perArticle/'+articleId, {full: false});
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
					target.parent().parent().find(".responseBox")
				);
				target.find("#inputContent").val("");
				target.find("#commenterID").val("");
			},
			error :function(){
				alert("Error");
			}	
		},"json");
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
						history.go(-1);
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

function displayComments(author,content,createdAt,target){
	var comment = "\
		<div class='panel panel-default'>\
			<span class='commentAuthorId'>"+author+"</span><br>\
			<span class='commentContent'>"+content+"</span><br>\
			<span class='commentTime'>"+createdAt+"</span>\
		</div>";
	target.append(comment);
} 
