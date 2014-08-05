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
    if(getTransferData('login') == 0 ){
      $.alertMessage('請先登入！', {type: 'alert-danger'});//green^2
      // alert( "請先登入！" );
      event.preventDefault();
    }
    else{
      $.jumpWindow('留言框', $("#div1").html(), '', {pop: false});//green^2
    }

    $( "#videoPost" ).submit(function( event ) {
    });
    // $("#div1").fadeToggle("slow");
  }); //fade 留言框

 //var video_id=1;

  $('#like').click(function(){   
		var url = getTransferData('like_video_url');
    var data = {video_id: 1, video_rate: 0};
    if(getTransferData('login') == 0 ){
    $.alertMessage('請先登入！', {type: 'alert-danger'});
    event.preventDefault();
    }
	  ajaxPost(url, data , rateFinish);
	});  //like button

  $('#love').click(function(){
  	var url = getTransferData('like_video_url');
	  var data = {video_id: 1, video_rate: 1};
    if(getTransferData('login') == 0 ){
    $.alertMessage('請先登入！', {type: 'alert-danger'});
    event.preventDefault();
    }  
    ajaxPost(url, data , rateFinish);
	});  //love button
  
  $('#pinewave').click(function(){
    window.location.href="http://radio.pinewave.tw/";
  })

/*
  function shit(){
    var url = getTransferData('like_video_url');
    var data = {video_id: video_id};

      ajaxPost(url, data , 0);
  }   //determine which video
*/

  function rateFinish(gg){
    if (gg['a']==-1){
      $.alertMessage('你已經投過了！', {type: 'alert-danger'});
    }else{
      $("#rating_number1").text(gg['a']);
      $("#rating_number2").text(gg['b']);
    }
    
  }   //vote完重整，讓rating 即時顯示 and alert tips:你已經投過了

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



	var data = [
		['ANQBlZCff_c', 2, 1, '就排一場吧 反正第一堂課又不會考試', 'ebi-c8HczkM', '上課是本分 我要當個乖學生', '3wua8ZuE4-M'],
		['ebi-c8HczkM', 0, 0],
		['3wua8ZuE4-M', 3, 1, '走前面那條看妹子囉', 'F9B9tsFQvs8', '還是走右邊吧 下坡騎比較快', '5hjfxOiiMQM', '右邊比較快 不過我還是用牽的吧', '9E8VajOLwOM']
	];

	var stage = 'ANQBlZCff_c';

	function showOption(){
		var smallData = data[0];
		for(var key in data){
			if(stage == data[key][0]){
				smallData = data[key];
				break;
			}
		}

		console.log('id:' + smallData[0]);
		var target = $('#videoChoose').empty().data('correct', smallData[2]);
		for(var i=0; i<smallData[1]; i++){
			var button = $('<div class="video-button"></div>').text(smallData[3+i*2]).data('video-id', smallData[4+i*2]).hide();
				button.click(function(){

					changeVideo($(this).data('video-id'));

					stage = $(this).data('video-id');
					showOption();
				});
			button.appendTo(target).fadeIn();
			console.log(smallData[3+i*2] + ' : ' + smallData[4+i*2]);
		}
		var button = $('<div class="video-button"></div>').text('Try again!').click(function(){
			stage = 0;
			showOption();
		});
		button.appendTo(target).fadeIn();

	}

	function changeVideo(id){
		$("#main").empty();
		$('<iframe id="i_attached2" width="750" height="500" src="//www.youtube.com/embed/'+ id +'" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
	}
	showOption();


});