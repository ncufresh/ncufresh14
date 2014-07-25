/****Text for Error message panel to show****************************************/
var titleEmptyMsg = "文章標題";
var contentEmptyMsg = "文章內容";
var commentEmptyMsg = "留言內容";
var notLoginMsg = "您尚未登入會員哦！";
/****Variables to store the url**************************************************/
var newArticleUrl;
var perArticleUrl;
var getArticlesUrl;
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
	loginStatus = $("#data_section").attr("data-login");
	if(loginStatus == 1){
		userId = $("#data_section").attr("data-user-id");
		userName = $("#data_section").attr("data-user-name");
	}
	/***********************************************************/
	newArticleUrl = $("#newArticle").attr("direct");
	perArticleUrl = $("#perArticle").attr("direct");
	getArticlesUrl = $("#getArticles").attr("direct");
	/************************************************************/
	$.ajax({
		type:"POST",
		url:getArticlesUrl,
		data:{
			'articleType' : "new"
		},
		success:function(data){
			for(i=0;i<data['data'].length;i++){
				
				showArticles(
					data['data'][i]['user']['name'],
					data['data'][i]['author_id'],
					data['data'][i]['created_at'],
					data['data'][i]['id'],
					data['data'][i]['title'],
					data['data'][i]['content'].replace(/\n/g,"<br>"),
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
				url : getArticlesUrl ,
				data : {
					"articleType" : "club"
				},
				success : function(data){
					for(i=0;i<data['data'].length;i++){
						//console.log(data);
						showArticles(
							data['data'][i]['user']['name'],
							data['data'][i]['author_id'],
							data['data'][i]['created_at'],
							data['data'][i]['id'],
							data['data'][i]['title'],
							data['data'][i]['content'].replace(/\n/g,"<br>"),
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
				url : getArticlesUrl ,
				data : {
					"articleType" : "department"
				},
				success : function(data){
					for(i=0;i<data['data'].length;i++){
						showArticles(
							data['data'][i]['user']['name'],
							data['data'][i]['author_id'],
							data['data'][i]['created_at'],
							data['data'][i]['id'],
							data['data'][i]['title'],
							data['data'][i]['content'].replace(/\n/g,"<br>"),
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
			url : getArticlesUrl,
			data : {
				"articleType" : "new"
			},
			success : function(data){
				$("#Test1 .articleContainer").remove();
				$("#Test1 .postTimeContainer").remove();
				for(i=0;i<data['data'].length;i++){
					showArticles(
						data['data'][i]['user']['name'],
						data['data'][i]['author_id'],
						data['data'][i]['created_at'],
						data['data'][i]['id'],
						data['data'][i]['title'],
						data['data'][i]['content'].replace(/\n/g,"<br>"),
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
			url : getArticlesUrl,
			data : {
				"articleType" : "pop"
			},
			success : function(data){
				$("#Test1 .postTimeContainer").remove();
				$("#Test1 .articleContainer").remove();
				for(i=0;i<data['data'].length;i++){
					
					showArticles(
						data['data'][i]['user']['name'],
						data['data'][i]['author_id'],
						data['data'][i]['created_at'],
						data['data'][i]['id'],
						data['data'][i]['title'],
						data['data'][i]['content'].replace(/\n/g,"<br>"),
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
						data.authorId,
						data.articleTime.date,
						data.articleId,
						data.articleTitle,
						data.articleContent.replace(/\n/g,"<br>"),
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

function showArticles(authorName,authorId,createdAt,articleId,title,content,target){
	$(target).append("\
		<div class='articleContainer' id='"+articleId+"' >\
			<div class='postTimeContainer'>\
				<div class='articlePostTime'>\
					<span class='author'>"+authorName+"</span>發布於"+createdAt+"\
				</div>\
			</div>\
			<div class='panel panel-default articleBody'>\
				<div class='panel-heading'>\
					<a href='"+perArticleUrl+"/"+articleId+"'><h3 class='panel-title'>"+title+"</h3></a>\
				</div>\
				<div class='personalImageBox' >\
					<img class='personalImage' src='"+burl+"/person/"+authorId+"'>\
				</div>\
				<div class='panel-body content'>"+content+"</div>\
				<div class='clear'></div>\
			</div>\
		</div>"
	);
}

function insertArticle(authorName,authorId,currentTime,articleId,title,content,target){
	$(target).after("\
		<div class='articleContainer' id='"+articleId+"' >\
			<div class='postTimeContainer'>\
				<div class='articlePostTime'>\
					<span class='author'>"+authorName+"</span>發布於"+currentTime+"\
				</div>\
			</div>\
			<div class='panel panel-default articleBody'>\
				<div class='panel-heading'>\
					<a href='"+perArticleUrl+"/"+articleId+"'><h3 class='panel-title'>"+title+"</h3></a>\
				</div>\
				<div class='personalImageBox' >\
					<img class='personalImage' src='"+burl+"/person/"+authorId+"'>\
				</div>\
				<div class='panel-body content'>"+content+"</div>\
				<div class='clear'></div>\
			</div>\
		</div>"
	);
}


