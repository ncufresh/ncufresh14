$(function(){

	//alert("NEW checked");
	var url = $("#new").attr("direct");
	//alert(url);
	$.ajax({
		type:"POST",
		url:url,
		data:{},
		success:function(data){
			alert("Ajax success");
			//alert(data['data'].length);
			for(i=0;i<data['data'].length;i++){
				$("#Test1").append("<div><div class='postTimeContainer'><div class='articlePostTime'><span class='author'>"+data['data'][i]['author_id']+"</span>posted"+data['data'][i]['created_at']+"</div></div></div>");
				$("#Test1").append("<div class='articleContainer' id="+data['data'][i]['id']+" ><div class='panel panel-default articleBody'><div class='panel-heading'><h3 class='panel-title'>"+data['data'][i]['title'] +" </h3></div><div class='panel-body'>"+data['data'][i]['content']+"</div><a class='moreBox'><div class='moreBtn' id='"+data['data'][i]['id']+"' direct="{{URL::to('/getComments')}}"><div class="panel panel-default arrow">&dArr;</div></div></a></div><div class="responseContainer"><form class="commentForm" route="createComment" direct="{{URL::to('/create')}}">{{ Form::label('comment','回覆貼文') }}{{ Form::submit('發表回覆',array('type' => 'button' , 'class' => 'btn btn-primary createComment')) }}{{ Form::text('commenterID','',array('class' => 'form-control commenterID' , 'placeholder' => 'Your ID' ,'id' => 'commenterID')) }}{{ Form::hidden('articleID','',array('id' => $article-> id , 'class' => 'articleID')) }}{{ Form::textarea('comment','',array('class' => 'form-control commentTextArea' , 'id' => 'inputContent')) }}</form></div></div>");
			}
		},
		error:function(){
			alert("ERROR");
		}
	},"json");

	//alert("");
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
		var responseContainer = target.parent().parent().parent().find(".responseContainer");
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
						var comment = "<div class='panel panel-default'><span class='commentAuthorId'>"+data['data'][i]['author_id']+"</span><br><span class='commentContent'>"+data['data'][i]['content']+"</span><br><span class='commentTime'>"+data['data'][i]['created_at']+"</span></div>";
						//responseContainer.append("<div class='panel panel-default'>"+data['data'][i]['content']+"</div>");
						responseContainer.append(comment);
					}
				},
				error : function(data){
					alert("Ajax error");
				}
			},"json");
		}
		if(response.css("display")=="block"){
			response.parent().css("background-color","#FFFFFF");
			responseContainer.children(".panel").remove();
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
	
	$("#new").change(function(){
		/*alert("new");
		var url = $(this).attr("direct");
		alert(url);
		$.ajax({
			type : "POST",
			url : url,
			data : { },
			success : function(data){
				alert("success");

			},
			error : function(){
				alert("ERROR");
			}
		},"json");*/
	});
	$("#pop").change(function(){
		alert("pop");
		/*$.ajax({
			type : "POST",
			url : url,
			data : { },
			success : function(data){
		

			},
			error : function(){

			}
		},"json");*/
	});


























});
