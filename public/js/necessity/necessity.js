
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

    //======================================================================================= 

    $(".Note1")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/Note2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/Note1.png");
    
    });

    $(".ButtonUpA")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/ButtonUpA2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/ButtonUpA1.png");
    
    });

    $(".ButtonUpB")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/ButtonUpB2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/ButtonUpB1.png");
    
    });

    $(".ButtonUpC")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/ButtonUpC2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/ButtonUpC1.png");
    
    });

    $(".ResearchButtonA")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonA2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonA1.png");
    
    });

    $(".ResearchButtonB")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonB2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonB1.png");
    
    });

    $(".ResearchButtonC")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonC2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonC1.png");
    
    });

    $(".ResearchButtonD")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonD2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonD1.png");
    
    });

    $(".ResearchButtonE")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonE2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonE1.png");
    
    });

    $(".ResearchButtonF")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonF2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonF1.png");
    
    });

    $(".ResearchButtonG")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonG2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonG1.png");
    
    });

    $(".ResearchButtonH")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonH2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/ResearchButtonH1.png");
    
    });

    $(".FreshmanButtonA")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonA2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonA1.png");
    
    });

    $(".FreshmanButtonB")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonB2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonB1.png");
    
    });

    $(".FreshmanButtonC")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonC2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonC1.png");
    
    });

    $(".FreshmanButtonD")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonD2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonD1.png");
    
    });

    $(".FreshmanButtonE")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonE2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonE1.png");
    
    });

    $(".FreshmanButtonF")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonF2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonF1.png");
    
    });

    $(".FreshmanButtonG")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonG2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonG1.png");
    
    });

    $(".FreshmanButtonH")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonH2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonH1.png");
    
    });

    $(".FreshmanButtonI")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonI2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonI1.png");
    
    });

    $(".FreshmanButtonJ")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonJ2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonJ1.png");
    
    });

    $(".FreshmanButtonK")
    .mouseenter(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonK2.png");
    })
    .mouseleave(function(){
        $(this).attr('src',"../images/necessity/FreshmanButtonK1.png");
    
    });









});






