
$(document).ready(function() {
	
    var target = getTransferData('necessity-target');
    var burl = getTransferData('burl');
 
    if(target == 'research'){
        changeToA();
    }else if(target == 'freshman'){
        changeToB();
    }else if(target == 'download'){
        changeToC();
    }


	$("#buttonA").click(changeToA); 

	$("#buttonB").click(changeToB);

    $("#buttonC").click(changeToC); 

    function changeToA(){
        changeURL(burl + '/necessity/research');
        $('#contDownSlideFreshman').hide();
        $('#contDownSlideResearch').show();
        $('#contDownLeftFreshman').hide();
        $('#contDownLeftResearch').show();
        $('#contDownSlideDownload').hide();
    }

    function changeToB(){
        changeURL(burl + '/necessity/freshman');
        $('#contDownSlideFreshman').show();
        $('#contDownSlideResearch').hide();
        $('#contDownLeftFreshman').show();
        $('#contDownLeftResearch').hide();
        $('#contDownSlideDownload').hide();
    }

    function changeToC(){
        changeURL(burl + '/necessity/download');
        $('#contDownSlideFreshman').hide();
        $('#contDownSlideResearch').hide();
        $('#contDownLeftFreshman').hide();
        $('#contDownLeftResearch').hide();
        $('#contDownSlideDownload').show();
    }

});


$(function(){
  
    $(window).scroll(function() {
        if ( $(this).scrollTop() < 500){
            $('#contDownLeftResearch').css({  
            	
                position: "relative",
                top: "10px"
                
            });
        } else {
             $('#contDownLeftResearch').css({
             	
                position: "fixed",
                top: "109px"
                
             });
        }
    });

     $(window).scroll(function() {
        if ( $(this).scrollTop() < 530){
            $('#contDownLeftFreshman').css({  
                
                position: "relative",
                top: "10px"
            });
        } else {
             $('#contDownLeftFreshman').css({
                
                position: "fixed",
                top: "78px"

             });
        }
    });

    $(".Note1")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/Note2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/Note1.png");
    
    });




});




//===========================================================================//

