$(function()
{
    var burl = getTransferData('burl');
    var questCount=0,correct,correctCount=0,choose,option,click,clickCount=0,id=0;
    var recentPower=1,maxPower=5,returnCount;
    var quest = new Array(10);
    var dayQuest;
    var timer,count=0,returnC=0;
    var done = false;

    ajaxPost(getTransferData('day-quest-url'),'', storeQuest);

    $('#intro').click(function() {
            $('#introduction').show();
    });

    $('#introduction').click(function() {
            $('#introduction').hide();
    });

    $('#start').click(function() {
            if(done == true)
            {
                $('#cover').hide();
                $('#startGame').show();
                nextQuest();
            }   
    });

    $('.base').click(function(){
        if(click == 0)
        {
            click = $(this).data('getclick');
            $(this).css({backgroundColor: '#F8E566'});
            for(var i=1; i<5; i++)
                if(i==dayQuest[quest[clickCount]]['correctans'])
                {
                    if(i==1){
                        option = $('#qa').data('option');}
                    else if(i==2){
                        option = $('#qb').data('option');}
                    else if(i==3){
                        option = $('#qc').data('option');}
                    else{
                        option = $('#qd').data('option');}
                }
            showAnswer();
        }
    });

    $('#next').click(function(){
        if(clickCount==10)
        {
            $('#startGame').hide();
            $('#endScreen').show();
            $('#again').hide();

            returnCount = returnPower(correctCount);
            $('#getPower').text("回復電量 * " + returnCount);
            timer = $.timer(powerAnimate);
            timer.set({ time:500, autostart:true });
            recentPower=1;
            maxPower=5;
        }
        else
            nextQuest();
        $('#correctAns').empty();
        $('#next').hide();
        
    });

     $('#again').click(function() {
        $('#endScreen').hide();
        if(done == true)
            {
                questCount=0;
                clickCount=0;
                correctCount=0;
                id=0;
                count=0;
                returnC=0;
                ajaxPost(getTransferData('day-quest-url'),'', storeQuest);
                $('#cover').show();
            }   
    });


    function storeQuest(data)
    {
        done = true;
        dayQuest = data;
        while(questCount<10)
        {
            var random = Math.random()*15;
            random -= random%1;

            choose=1;
            for(var i=0; i<questCount; i++)
                if(quest[i]==random)
                    choose=0;
            if(choose==1)
            {
                quest[questCount]=random;
                questCount++;
            } 
        }
    }


    function nextQuest()
    {
        click = 0;
        correct = dayQuest[quest[clickCount]]['correctans'];

        $('#question').text("Q" + (clickCount+1) + "：" + dayQuest[quest[clickCount]]['question']);
        $('#qa').text("(A)  " + dayQuest[quest[clickCount]]['qA']);
        $('#qb').text("(B)  " + dayQuest[quest[clickCount]]['qB']);
        $('#qc').text("(C)  " + dayQuest[quest[clickCount]]['qC']);
        $('#qd').text("(D)  " + dayQuest[quest[clickCount]]['qD']);
    }

    function showAnswer()
    {
        if(correct==click)
        {
            $('#correctAns').text("答案正確！");
            correctCount++;
        }          
        else
            $('#correctAns').text("錯誤！正確答案為"+option);
        $('#correctAns').show();
        $('#next').show();
        clickCount++;  
    }

    function returnPower(count)
    {
        var hi = 0; 

        if(count<5)
            hi = 0;
        else if(count < 7)
            hi = 1;
        else if(count < 9)
            hi = 2;
        else if(count < 10)
            hi = 3;
        else if(count == 10)
            hi = maxPower;

        if(hi+recentPower > maxPower)
            hi = maxPower-recentPower;

        return hi;
    }

    function powerAnimate()
    {
        $('#power').empty();
          $('#power').append('<img src="'+burl+'/images/gamePower/power'+recentPower+'.png">');
        if(returnCount==returnC)
        {
            timer.stop();
            $('#again').show();
        }
            
        recentPower++;
        returnC++;
    }
});