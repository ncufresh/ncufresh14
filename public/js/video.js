$(function(){	
  /*
  $(".ath1").click(function(){
  $("#main").empty();
  video_id = 1;
  id = 1;
  $('<iframe width="560" height="315" src="//www.youtube.com/embed/mzX0rhF8buo" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  
    var url = getTransferData('about_rate_url');
    var data = {video_id: video_id };

      ajaxPost(url, data , rateNumber);

    var url = getTransferData('change_intro_url');
    var intro = {id : id};

      ajaxGet(url, intro , changeIntro);
  });

  $(".ath2").click(function(){
  $("#main").empty();
  video_id = 2;
  id = 2;
  $('<iframe id="i_attached1" width="560" height="315" src="//www.youtube.com/embed/ePFWiPo0FzE" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  
    var url = getTransferData('about_rate_url');
    var data = {video_id: video_id};

      ajaxPost(url, data , rateNumber);

    var url = getTransferData('change_intro_url');
    var intro = {id : id};

      ajaxGet(url, intro , changeIntro);
});

  $(".ath3").click(function(){
  $("#main").empty();
  video_id = 3;
  id = 3;
  $('<iframe id="i_attached2" width="560" height="315" src="//www.youtube.com/embed/fzuy63eCUKc" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
    
    var url = getTransferData('about_rate_url');
    var data = {video_id: video_id};

      ajaxPost(url, data , rateNumber);
    var url = getTransferData('change_intro_url');
    var intro = {id : id};

      ajaxGet(url, intro , changeIntro);

  });

  $(".ath4").click(function(){
  $("#main").empty();
  video_id = 4;
  id = 4;
  $('<iframe id="i_attached3" width="560" height="315" src="//www.youtube.com/embed/rVEMTxg_LrU" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  
    var url = getTransferData('about_rate_url');
    var data = {video_id: video_id };

      ajaxPost(url, data , rateNumber);
    var url = getTransferData('change_intro_url');
    var intro = {id : id};

      ajaxGet(url, intro , changeIntro);
  });

  $(".ath5").click(function(){
  $("#main").empty();
  video_id = 5;
  id = 5;
  $('<iframe id="i_attached4" width="560" height="315" src="//www.youtube.com/embed/2xKc-rAyAdQ" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
    
    var url = getTransferData('about_rate_url');
    var data = {video_id: video_id };

      ajaxPost(url, data , rateNumber);
    var url = getTransferData('change_intro_url');
    var intro = {id : id};

      ajaxGet(url, intro , changeIntro);
  });
*/
  $("#message").click(function(){
    $("#div1").fadeToggle("slow");
  }); //fade 留言框

 //var video_id=1;

  $('#like').click(function(){   
		var url = getTransferData('like_video_url');
    var data = {video_id: 1, video_rate: 0};

	  ajaxPost(url, data , rateFinish);
	});  //like button

  $('#love').click(function(){
  	var url = getTransferData('like_video_url');
	  var data = {video_id: 1, video_rate: 1};

    ajaxPost(url, data , rateFinish);
	});  //love button

/*
  function shit(){
    var url = getTransferData('like_video_url');
    var data = {video_id: video_id};

      ajaxPost(url, data , 0);
  }   //determine which video
*/

  function rateFinish(gg){
    $("#rating_number1").text(gg['a']);
    $("#rating_number2").text(gg['b']);
    console.log(gg);
  }   //vote完重整，讓rating 即時顯示

  function LogInAlert(alert){
    alert("請先登入!");
  }   //訪客留言

  function rateNumber(data){
    $('#rating_number1').text(data["videoRating1"]);
    $('#rating_number2').text(data["videoRating2"]);
    //$('about_introduction_url').text(data["id"]);
  }   //顯示rating data
/*
  function changeIntro(intro){
    $('#intro').text(intro["video_introduction"]);
  }
*/


});