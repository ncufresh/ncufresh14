$(function()
{
    var burl = getTransferData('burl');
    var questCount=0,correct,correctCount=0,choose,option,click,clickCount=0,id=0;
    var recentPower = 0,maxPower,returnCount = 0;
    var quest = new Array(10);
    var dayQuest;
    var timer,count=0,returnC=0,powerreturncount;
    var done = false;
    var get = false;
    ajaxPost(getTransferData('day-quest-url'),'', storeQuest);
    ajaxPost(getTransferData('recent-power-url'),'', getRecent);

    $('#intro').click(function() {
            $('#introduction').show();
    });

    $('#introduction').click(function() {
            $('#introduction').hide();
    });

    $('#start').click(function() {
        if(done==true && get==true)
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
            $(this).addClass('target');
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
        $('.base').removeClass('target');

        if(clickCount==10)
        {
            $('#startGame').hide();
            $('#endScreen').show();
            $('#again').hide();
            returnCount = returnPower(correctCount);
            $('#getPower').text("回復電量 * " + returnCount);
            powerreturncount = recentPower;
            timer = $.timer(powerAnimate);
            timer.set({ time:500, autostart:true });
        }
        else
            nextQuest();
        ajaxPost(getTransferData('recent-power-url'),'', getRecent);
        $('#correctAns').empty();
        $('#next').hide();
    });

     $('#again').click(function() {
        $('#endScreen').hide();
        questCount=0;
        clickCount=0;
        correctCount=0;
        id=0;
        count=0;
        returnC=0;
        done = false;
        get = false; 
        ajaxPost(getTransferData('day-quest-url'),'', storeQuest);
        ajaxPost(getTransferData('recent-power-url'),'', getRecent);
        $('#cover').show();
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

    function getRecent(data)
    {
        get = true;
        recentPower = data['recentPower'];
        maxPower = data['maxPower'];
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
        $('#power').append('<img src="'+burl+'/images/gamePower/power'+powerreturncount+'.png">');
        if(returnCount==returnC)
        {
            timer.stop();
            ajaxPost(getTransferData('renew-value-url'),{power:(parseInt(recentPower)+parseInt(returnCount)),max:maxPower},'');
            $('#again').show();
            editStatus((parseInt(recentPower)+parseInt(returnCount)));
        }
            
        powerreturncount++;
        returnC++;
    }
});