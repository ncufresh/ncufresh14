
$(document).ready(function() {
	
	$("#buttonA").click(function(){
		$('#contDownSlideFreshman').hide();
		$('#contDownSlideResearch').show();
		$('#contDownLeftFreshman').hide();
		$('#contDownLeftResearch').show();
        $('#contDownSlideDownload').hide();
	}); 

	$("#buttonB").click(function(){
		$('#contDownSlideFreshman').show();
		$('#contDownSlideResearch').hide();
		$('#contDownLeftFreshman').show();
		$('#contDownLeftResearch').hide();
        $('#contDownSlideDownload').hide();
	});

    $("#buttonC").click(function(){
        $('#contDownSlideFreshman').hide();
        $('#contDownSlideResearch').hide();
        $('#contDownLeftFreshman').hide();
        $('#contDownLeftResearch').hide();
        $('#contDownSlideDownload').show();
    }); 

});


$(function(){
    
    // $("#contDownLeft").click(function(){
    //     $("html,body").animate({
    //         scrollTop: '0px'
    //     });
    // });
    
    $(window).scroll(function() {
        if ( $(this).scrollTop() < 600){
            $('#contDownLeftResearch').css({  
            	position: "relative"
            });
        } else {
             $('#contDownLeftResearch').css({
             	position: "fixed"
             });
        }
    });

     $(window).scroll(function() {
        if ( $(this).scrollTop() < 600){
            $('#contDownLeftFreshman').css({  
                position: "relative"
            });
        } else {
             $('#contDownLeftFreshman').css({
                position: "fixed"
             });
        }
    });


});

// $(function(){	
//   $("#buttonA").click(function(){
  
//     var url = getTransferData('about_rate_url');
//     var data = {video_id: video_id , id: id};

//     ajaxPost(url, data , rateNumber);

//   });

//   $(".ath2").click(function(){
//   $("#main").empty();
//   video_id = 2;
//   id = 2;
//   $('<iframe id="i_attached1" width="560" height="315" src="//www.youtube.com/embed/ePFWiPo0FzE" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  
//     var url = getTransferData('about_rate_url');
//     var data = {video_id: video_id , id : id};

//       ajaxPost(url, data , rateNumber);
// });