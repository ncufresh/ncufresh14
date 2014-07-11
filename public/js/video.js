$(function(){
	
  $(".ath1").click(function(){
  $("#main").empty();
  $('<iframe id="i_attached1" width="560" height="315" src="//www.youtube.com/embed/ePFWiPo0FzE" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  });

  $(".ath2").click(function(){
  $("#main").empty();
  $('<iframe id="i_attached2" width="560" height="315" src="//www.youtube.com/embed/fzuy63eCUKc" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  });

  $(".ath3").click(function(){
  $("#main").empty();
  $('<iframe id="i_attached3" width="560" height="315" src="//www.youtube.com/embed/rVEMTxg_LrU" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  });

  $(".ath4").click(function(){
  $("#main").empty();
  $('<iframe id="i_attached4" width="560" height="315" src="//www.youtube.com/embed/2xKc-rAyAdQ" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  });

  $("#message").click(function(){
  $("#div1").fadeToggle("slow");
  });


  $('#like').click(function(){
		var url = getTransferData('like_video_url');
		var which=1;
		var data = {video_id: which, video_rate: 0};

	  	ajaxPost(url, data , iAmBack);
	});

  $('#love').click(function(){
  	var url = getTransferData('like_video_url');
	var which=1;
	var data = {video_id: which, video_rate: 1};

  	ajaxPost(url, data , iAmBack);
	});

	function iAmBack(data){
		console.log(data['created_at']);
	}

});