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
//To indentify which tab and page we are now on
var tabLocation = "new";
var pageLocation = 1;

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

	getArticles(tabLocation,pageLocation,"#Test1");

	$("#articleTab").click(function(e){

		e.preventDefault();

		tabLocation = "new";
		pageLocation = 1;

		$("#Test1 .articleContainer").remove();

		getArticles(tabLocation,pageLocation,"#Test1");
		
	
		$("#Test2 .articleContainer").each(function(){
			$(this).remove();
		});
		$("#Test3 .articleContainer").each(function(){
			$(this).remove();
		});

		$(this).tab('show');
	});

	$("#new").change(function(){
		tabLocation = "new";
		pageLocation = 1;
		$("#Test1 .articleContainer").remove();
		getArticles(tabLocation,pageLocation,"#Test1");
	});

	$("#pop").change(function(){
		tabLocation = "pop";
		pageLocation = 1;
		$("#Test1 .articleContainer").remove();
		getArticles(tabLocation,pageLocation,"#Test1");
	});


	$("#clubTab").click(function(e){
		if(tabLocation != "club"){

			tabLocation = "club";
			pageLocation = 1;

			e.preventDefault();
			$(this).tab('show');
			
			$("#Test2 .articleContainer").each(function(){
				$(this).remove();
			});
			getArticles(tabLocation,pageLocation,"#Test3");
		}
	});

	$("#departmentTab").click(function(e){
		if(tabLocation != "department"){
			tabLocation = "department";
			pageLocation = 1;
			e.preventDefault();
			$(this).tab('show');
			$("#Test3 .articleContainer").each(function(){
				$(this).remove();
			});
			getArticles(tabLocation,pageLocation,"#Test2");
		}
	});

	$(document).on("click","#previousPage",function(e){
		e.preventDefault();
		pageLocation--;
		switch(tabLocation){
			case "new":
				$("#Test1 .articleContainer").remove();	
				getArticles(tabLocation,pageLocation,"#Test1");
				break;
			case "pop":
				$("#Test1 .articleContainer").remove();	
				getArticles(tabLocation,pageLocation,"#Test1");
				break;
			case "department":
				$("#Test2 .articleContainer").each(function(){
					$(this).remove();
				});
				getArticles(tabLocation,pageLocation,"#Test2");
				break;
			case "club":
				$("#Test3 .articleContainer").each(function(){
					$(this).remove();
				});
				getArticles(tabLocation,pageLocation,"#Test3");
				break;
		}
	});
	
	$(document).on("click","#nextPage",function(e){
		e.preventDefault();
		pageLocation++;
		switch(tabLocation){
			case "new":
				$("#Test1 .articleContainer").remove();	
				getArticles(tabLocation,pageLocation,"#Test1");
				break;
			case "pop":
				$("#Test1 .articleContainer").remove();	
				getArticles(tabLocation,pageLocation,"#Test1");
				break;
			case "department":
				$("#Test2 .articleContainer").each(function(){
					$(this).remove();
				});
				getArticles(tabLocation,pageLocation,"#Test2");
				break;
			case "club":
				$("#Test3 .articleContainer").each(function(){
					$(this).remove();
				});
				getArticles(tabLocation,pageLocation,"#Test3");
				break;
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
					var insertPlace;
					if(type == "P"){
						insertPlace = "#toolBar";
					}else if(type == "D"){
						insertPlace = "#departmentIndex";
					}else if(type == "C"){
						insertPlace = "#clubIndex";
					}
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

function getArticles(type,page,target){
    $.ajax({
		type:"POST",
		url:getArticlesUrl+"?page="+page,
		data:{
			'articleType' : type,
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
					target
				);
			}
			pageGenerate(pageLocation,data.last_page);
		},
		error:function(){
			$.alertMessage('Getting Articles failed');
		}
	},"json");
}

function pageGenerate(current,last){
	var pager="";
	if(current == 1 && last != 1){

		pager = "<span id='currentPage'>第 1 頁</span>\
				<ul class='pager'>\
					<li><a id='nextPage'>Next</a></li>\
				</ul>\
				<span id='totalPage'>共 "+last+" 頁</span>\
				";

	}else if(current == 1 && last == 1){

		pager = "";

	}else if(current == last && last != 1){

		pager = "<span id='currentPage'>最後一頁</span>\
				<ul class='pager'>\
					<li><a id='previousPage'>Previous</a></li>\
				</ul>\
				<span id='totalPage'>共 "+last+" 頁</span>\
				";

	}else{

		pager = "<span id='currentPage'>第 "+current+" 頁</span>\
				<ul class='pager'>\
					<li><a id='previousPage'>Previous</a></li>\
					<li><a id='nextPage'>Next</a></li>\
				</ul>\
				<span id='totalPage'>共 "+last+" 頁</span>\
				";

	}
	$(".paginationBox").html(pager);
}

