var createCommentUrl;
var deleteArticleUrl;
var updateArticleUrl;
var articleListUrl;
$(function(){
	var articleId = $(".articleContainer").attr("id");
	$("#errorMsgDialog").modal('toggle');
	createCommentUrl = $("#createComment").attr("direct");
	deleteArticleUrl = $("#deleteArticle").attr("direct");
	updateArticleUrl = $("#updateArticle").attr("direct");
	articleListUrl = $("#articleList").attr("direct");
	var articleTitle = $("#articleTitle").attr("articleTitle");
	$.pushLocation(articleTitle, '/perArticle/'+articleId, {full: false});
	$(".commentForm").submit(function(e){
		e.preventDefault();
		var content = $(this).find("#inputContent").val();
		$.ajax({
			type : "POST",
			url : createCommentUrl,
			data : { 
				"comment" : content ,
				"article_id" : articleId
			},
			success : function(data){
				displayComments(
					data.commentAuthor,
					data.commentContent,
					data.commentTime.date,
					$(document).find(".responseBox")
				);
				$(document).find("#inputContent").val("");
				$(document).find("#commenterID").val("");
			},
			error :function(){
				alert("Error");
			}	
		},"json");
	});
	$(".edit").click(function(){
		var target = $(document).find(".panel-body");
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
				var delBtn = $(this);
				$.ajax({
					type:"POST",
					url:deleteArticleUrl,
					data:{
						"id":articleId
					},
					success:function(){
						window.location.href = articleListUrl;
					},
					error:function(){
						alert("Ajax error");
					}
				},"json");
			});
			$(".saveBtn").click(function(){
				var newContent = $(document).find(".editArea").val();
				$.ajax({
					type:"POST",
					url: updateArticleUrl,
					data:{
						"id":articleId,
						"content":newContent
					},
					success:function(data){
						target.text(data.newContent);
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
