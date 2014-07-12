$(function(){	
  $(".ath1").click(function(){
  $("#main").empty();
  video_id = 1;
  $('<iframe width="560" height="315" src="//www.youtube.com/embed/mzX0rhF8buo" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  
    var url = getTransferData('about_rate_url');
    var data = {video_id: video_id};

      ajaxPost(url, data , rateNumber);

  });

  $(".ath2").click(function(){
  $("#main").empty();
  video_id = 2;
  $('<iframe id="i_attached1" width="560" height="315" src="//www.youtube.com/embed/ePFWiPo0FzE" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  
    var url = getTransferData('about_rate_url');
    var data = {video_id: video_id};

      ajaxPost(url, data , rateNumber);
});

  $(".ath3").click(function(){
  $("#main").empty();
  video_id = 3;
  $('<iframe id="i_attached2" width="560" height="315" src="//www.youtube.com/embed/fzuy63eCUKc" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
    
    var url = getTransferData('about_rate_url');
    var data = {video_id: video_id};

      ajaxPost(url, data , rateNumber);
  });

  $(".ath4").click(function(){
  $("#main").empty();
  video_id = 4;
  console.log("4");
  $('<iframe id="i_attached3" width="560" height="315" src="//www.youtube.com/embed/rVEMTxg_LrU" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  
    var url = getTransferData('about_rate_url');
    var data = {video_id: video_id};

      ajaxPost(url, data , rateNumber);
  });

  $(".ath5").click(function(){
  $("#main").empty();
  video_id = 5;
  $('<iframe id="i_attached4" width="560" height="315" src="//www.youtube.com/embed/2xKc-rAyAdQ" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
    
    var url = getTransferData('about_rate_url');
    var data = {video_id: video_id};

      ajaxPost(url, data , rateNumber);
  });

  $("#message").click(function(){
  $("#div1").fadeToggle("slow");
  });

 var video_id=1;

  $('#like').click(function(){
		var url = getTransferData('like_video_url');
    var data = {video_id: video_id, video_rate: 0};

	  	ajaxPost(url, data , rateFinish);
	});

  $('#love').click(function(){
  	var url = getTransferData('like_video_url');
	  var data = {video_id: video_id, video_rate: 1};

  	   ajaxPost(url, data , rateFinish);
	});


  function shit(){
    var url = getTransferData('like_video_url');
    var data = {video_id: video_id};

      ajaxPost(url, data , 0);
  }


  function rateFinish(gg){
    window.location.reload();
  }

  function rateNumber(data){
    $('#rating_number1').text(data["videoRating1"]);
    $('#rating_number2').text(data["videoRating2"]);
  }

});