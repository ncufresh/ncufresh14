
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
        $('.ContentDownBF').fadeOut();
        $('.ContentDownBR').fadeIn();
        $('.ContentDownYF').fadeOut();
        $('.ContentDownYR').fadeIn();
        $('.ContentDownBD').fadeOut();
    }

    function changeToB(){
        changeURL(burl + '/necessity/freshman');
        $('.ContentDownBF').fadeIn();
        $('.ContentDownBR').fadeOut();
        $('.ContentDownYF').fadeIn();
        $('.ContentDownYR').fadeOut();
        $('.ContentDownBD').fadeOut();
    }

    function changeToC(){
        changeURL(burl + '/necessity/download');
        $('.ContentDownBF').fadeOut();
        $('.ContentDownBR').fadeOut();
        $('.ContentDownYF').fadeOut();
        $('.ContentDownYR').fadeOut();
        $('.ContentDownBD').fadeIn();
    }

});


$(function(){
  
    $(window).scroll(function() {
        if ( $(this).scrollTop() < 687){
            $('.ContentDownYR').css({  
            	
                position: "absolute",
                 top:"10px"
                // left:"10px"
                
            });
        } else {
             $('.ContentDownYR').css({
             	
                position: "fixed",
                top: "95px"
                // left:"173px"
                
             });
        }
    });

     $(window).scroll(function() {
        if ( $(this).scrollTop() < 757){
            $('.ContentDownYF').css({  
                
                position: "absolute",
                top:"15px"
                // left:"10px"
            });
        } else {
             $('.ContentDownYF').css({
                
                position: "fixed",
                top: "30px"
                // left:"173px"

             });
        }
    });

});






