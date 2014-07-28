var createCommentUrl;
var deleteArticleUrl;
var updateArticleUrl;
var articleListUrl;
var burl = '';

$(function(){

	burl = getTransferData('burl');

	var articleId = $(".articleContainer").attr("id");

	var loginStatus = $("#data_section").attr("data-login");

	createCommentUrl = $("#createComment").attr("direct");

	deleteArticleUrl = $("#deleteArticle").attr("direct");

	updateArticleUrl = $("#updateArticle").attr("direct");

	articleListUrl = $("#articleList").attr("direct");

	var articleTitle = $("#articleTitle").attr("articleTitle");

	$.pushLocation(articleTitle, '/perArticle/'+articleId, {full: false});

	$(".commentForm").submit(function(e){

		e.preventDefault();

		var content = $(this).find("#inputContent").val();

		if(content == "" ){

			$("#errorMsgContent").text("請輸入留言內容");

			$("#errorMsgDialog").modal('toggle');

		}else if(loginStatus == "1"){

			$.ajax({

				type : "POST",

				url : createCommentUrl,

				data : { 
					"comment" : content ,
					"article_id" : articleId
				},

				success : function(data){
					if(data.washing == true){

						$("#errorMsgContent").text("您的留言時間間隔太短啦");

						$("#errorMsgDialog").modal('toggle');
					}else{

						var dateTime = new Date(data.commentTime.date);
						var currentTime = dateTime.getFullYear()
											+"-"+(dateTime.getMonth()+1)
											+"-"+dateTime.getDate()
											+" "+dateTime.getHours()
											+":"+dateTime.getMinutes()
											+":"+dateTime.getSeconds();

						displayComments(
							data.commentAuthor,
							data.authorId,
							data.commentContent,
							currentTime,
							$(document).find(".responseBox")
						);

						$(document).find("#inputContent").val("");

						$(document).find("#commenterID").val("");
					}
				},
				error :function(){

					alert("Error");
				}	
			},"json");
		}
	});

	$(".edit").click(function(){

		var target = $(document).find(".panel-body");

		var btn = $(this);

		var originText = target.html();

		var originHeight = target.css("height");

		target.empty();

		target.append("<button type='button' class='btn btn-default btn-sm delBtn'>刪除貼文</button>");

		target.append("<textarea class='form-control editArea'>"+originText.replace(/<br>/g,'')+"</textarea>");

		target.append("<button type='button' class='btn btn-primary btn-sm saveBtn'>儲存編輯</button>");

		target.append("<button type='button' class='btn btn-default btn-sm canBtn'>取消</button>");

		$(".editArea").css("height",originHeight);

		$(this).css("display","none");

		$(".canBtn").click(function(){

			target.html(originText);

			btn.css("display","inline-block");

		});

		$(".delBtn").click(function(){

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

			if( newContent == ""){

				$("#errorMsgContent").text("編輯內容不得為空");

				$("#errorMsgDialog").modal('toggle');

			}else if(loginStatus == "1"){

				$.ajax({

					type:"POST",

					url: updateArticleUrl,

					data:{
						"id":articleId,
						"content":newContent
					},

					success:function(data){
						target.html(data.newContent);
						btn.css("display","inline-block");
					},

					error:function(){
						alert("Ajax Error");
					}

				},"json");

			}
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

function displayComments(authorName,authorId,content,createdAt,target){
	var comment = "\
		<div class='panel panel-default'>\
			<div class='commentAuthorBox'>\
				<span class='commentAuthor'>"+authorName+"</span>\
			</div>\
			<div class='personalImageBox'>\
				<img class='personalImageComment' src='"+burl+"/person/"+authorId+"'>\
			</div>\
			<div class='commentContentBox'>\
				<span class='commentContent'>"+content+"</span>\
			</div>\
			<div class='commentTimeBox'>\
				<span class='commentTime'>"+createdAt+"</span>\
			</div>\
		</div>";
	target.before(comment);
} 
