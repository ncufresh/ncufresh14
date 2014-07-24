/****Text for Error message panel to show****************************************/
var titleEmptyMsg = "文章標題";
var contentEmptyMsg = "文章內容";
var commentEmptyMsg = "留言內容";
var notLoginMsg = "您尚未登入會員哦！";
/****Variables to store the url**************************************************/
var orderNewUrl;
//var getCommentsUrl;
//var createCommentUrl;
var orderPopUrl;
//var deleteArticleUrl;
//var updateArticleUrl;
var newArticleUrl;
var perArticleUrl;
var getDepartmentUrl;
var getClubUrl;
/****Store current user's information*********************************************/
var loginStatus;
var userId;
var userName;
//To indentify which tab we are now on
var onDepartmentTab = false;
var onClubTab = false;
var articleOpened = false;

var burl = '';

$(function(){
	burl = getTransferData('burl');
	loginStatus = $("#loginStatus").val();
	if(loginStatus==1){
		userId = $("#userId").val();
		userName = $("#userName").val();
	}
	/***********************************************************/
	orderNewUrl = $("#orderNewHidden").attr("direct");
	orderPopUrl = $("#orderPopHidden").attr("direct");
	newArticleUrl = $("#newArticle").attr("direct");
	perArticleUrl = $("#perArticle").attr("direct");
	getDepartmentUrl = $("#getDepartment").attr("direct");
	getClubUrl = $("#getClub").attr("direct");
	/************************************************************/
	$.ajax({
		type:"POST",
		url:orderNewUrl,
		data:{
			'articleType' : "new"
		},
		success:function(data){
			for(i=0;i<data['data'].length;i++){
				showArticles(
					data['data'][i]['user']['name'],
					data['data'][i]['created_at'],
					data['data'][i]['id'],
					data['data'][i]['title'],
					data['data'][i]['content'],
					"#Test1"
				);
			}	
		},
		error:function(){
			alert("ERROR");
		}
	},"json");
	$("#articleTab").click(function(e){
		e.preventDefault();
		$(this).tab('show');
		onClubTab = false;
		onDepartment = false;
		$("#Test2 .articleContainer").each(function(){
			$(this).remove();
		});
		$("#Test3 .articleContainer").each(function(){
			$(this).remove();
		});
	});
	$("#clubTab").click(function(e){
		if(onClubTab == false){
			onClubTab = true;
			onDepartmentTab = false;
			e.preventDefault();
			$(this).tab('show');
			
			$("#Test2 .articleContainer").each(function(){
				$(this).remove();
			});
			$.ajax({
				type : "POST",
				url : getClubUrl ,
				data : {
					"articleType" : "club"
				},
				success : function(data){
					for(i=0;i<data['data'].length;i++){
						showArticles(
							data['data'][i]['user']['name'],
							data['data'][i]['created_at'],
							data['data'][i]['id'],
							data['data'][i]['title'],
							data['data'][i]['content'],
							"#Test3"
						);
					}
						
				},
				error : function(){
					alert("Getting department failed");
				}
			},"json");
		}
	});
	$("#departmentTab").click(function(e){
		if(onDepartmentTab == false){
			onDepartmentTab = true;
			onClubTab = false;
			e.preventDefault();
			$(this).tab('show');
			$("#Test3 .articleContainer").each(function(){
				$(this).remove();
			});
			$.ajax({
				type : "POST",
				url : getDepartmentUrl ,
				data : {
					"articleType" : "department"
				},
				success : function(data){
					for(i=0;i<data['data'].length;i++){
						showArticles(
							data['data'][i]['user']['name'],
							data['data'][i]['created_at'],
							data['data'][i]['id'],
							data['data'][i]['title'],
							data['data'][i]['content'],
							"#Test2"
						);
					}
				},
				error : function(){
					alert("Getting department failed");
				}
			},"json");
		}
	});
	$("#createBtn").click(function(){
		if(loginStatus != 1){
			$("#errorMsgContent").text(notLoginMsg);
			$("#errorMsgDialog").modal('toggle');
		}
		if(loginStatus == 1){
			$('#myModal').modal('toggle');
		}
	});
	//$("#errorMsgDialog").modal('toggle'); /*-----------------------------------------------------------------------------------------*/
	$("#new").change(function(){
		$.ajax({
			type : "POST",
			url : orderNewUrl,
			data : {
				"articleType" : "new"
			},
			success : function(data){
				$("#Test1 .articleContainer").remove();
				$("#Test1 .postTimeContainer").remove();
				for(i=0;i<data['data'].length;i++){
					showArticles(
						data['data'][i]['user']['name'],
						data['data'][i]['created_at'],
						data['data'][i]['id'],
						data['data'][i]['title'],
						data['data'][i]['content'],
						"#Test1"
					);	
				}	
			},
			error : function(){
				alert("ERROR");
			}
		},"json");
	});
	$("#pop").change(function(){
		$.ajax({
			type : "POST",
			url : orderPopUrl,
			data : {
				"articleType" : "pop"
			},
			success : function(data){
				$("#Test1 .postTimeContainer").remove();
				$("#Test1 .articleContainer").remove();
				for(i=0;i<data['data'].length;i++){
					
					showArticles(
						data['data'][i]['user']['name'],
						data['data'][i]['created_at'],
						data['data'][i]['id'],
						data['data'][i]['title'],
						data['data'][i]['content'],
						"#Test1"
					);
				}
			},
			error : function(){

			}
		},"json");
	});

	$("#submitArticle").click(function(){
		var title = $("#inputTitle").val();
		var content =$("#inputDetail").val();
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
					console.log(data);
					insertArticle(
						data.articleAuthor,
						data.articleTime.date,
						data.articleId,
						data.articleTitle,
						data.articleContent,
						insertPlace
					);	
				},
				error:function(){
					alert("Error");
				}
			},"json");

		}
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
	var editBtn = "";
	if(userId == author){
		editBtn = "<div class='btnBox'>&nbsp;<button type='button' class='btn btn-primary btn-sm edit'>編輯貼文</button></div>";
	}
	$(target).append("\
		<div class='articleContainer' id='"+articleId+"' >\
			<div class='postTimeContainer'>\
				<div class='articlePostTime'>\
					<span class='author'>"+author+"</span>發布於"+createdAt+"\
				</div>\
			</div>\
			<div class='panel panel-default articleBody'>\
				<div class='panel-heading'>\
					<a href='"+perArticleUrl+"/"+articleId+"'><h3 class='panel-title'>"+title+"</h3></a>\
				</div>\
				<div class='panel-body'>"+content+"</div>\
				"+editBtn+"\
			</div>\
		</div>"
	);
}

function insertArticle(author,currentTime,articleId,title,content,target){
	var editBtn = "";
	if(userId == author){
		editBtn = "<div class='btnBox'>&nbsp;<button type='button' class='btn btn-primary btn-sm edit'>編輯貼文</button></div>";
	}
	$(target).after("\
		<div class='articleContainer' id='"+articleId+"' >\
			<div class='postTimeContainer'>\
				<div class='articlePostTime'>\
					<span class='author'>"+author+"</span>發布於"+currentTime+"\
				</div>\
			</div>\
			<div class='panel panel-default articleBody'>\
				<div class='panel-heading'>\
					<a href='"+perArticleUrl+"/"+articleId+"'><h3 class='panel-title'>"+title+"</h3></a>\
				</div>\
				<div class='panel-body'>"+content+"</div>\
				"+editBtn+"\
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

