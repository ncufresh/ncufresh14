$(function()
{
    var burl = getTransferData('burl');
    var correct,correctCount=0,choose,option,click,clickCount=0,id=0;
    var recentPower = 0,maxPower = 0,returnCount = 0;
    var dayQuest;
    var timer,count=0,returnC=0,powerreturncount;
    var done = false;
    var token = '';
    ajaxPost(getTransferData('day-quest-url'),'', storeQuest);
    ajaxPost(getTransferData('recent-power-url'),'', getRecent);

    $('#intro').click(function() {
            $('#introduction').show();
    });

    $('#introduction').click(function() {
            $('#introduction').hide();
    });

    $('#start').click(function() {
        if(done==true)
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
                if(i==dayQuest[clickCount]['correctans'])
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
            timer.set({ time:1000, autostart:true });
        }
        else
            nextQuest();
        ajaxPost(getTransferData('recent-power-url'),'', getRecent);
        $('#correctAns').empty();
        $('#next').hide();
    });

     $('#again').click(function() {
        $('#endScreen').hide();
        clickCount=0;
        correctCount=0;
        id=0;
        count=0;
        returnC=0;
        done = false;
        ajaxPost(getTransferData('day-quest-url'),'', storeQuest);
        ajaxPost(getTransferData('recent-power-url'),'', getRecent);
        $('#cover').show();
    });

    function storeQuest(data)
    {
        done = true;
        token = data['token'];
        dayQuest = data['questions'];
    }

    function getRecent(data)
    {
        recentPower = parseInt(data['recentPower']);
        maxPower = parseInt(data['maxPower']);
    }

    function nextQuest()
    {
        click = 0;
        correct = dayQuest[clickCount]['correctans'];

        $('#question').text("Q" + (clickCount+1) + "：" + dayQuest[clickCount]['question']);
        $('#qa').text("(A)  " + dayQuest[clickCount]['qA']);
        $('#qb').text("(B)  " + dayQuest[clickCount]['qB']);
        $('#qc').text("(C)  " + dayQuest[clickCount]['qC']);
        $('#qd').text("(D)  " + dayQuest[clickCount]['qD']);
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
            ajaxPost(getTransferData('renew-value-url'),{power:returnCount, _token: token},'');
            $('#again').show();
            var total = parseInt(recentPower)+parseInt(returnCount);
            if(total>=0 && total<=maxPower)
                editStatus(parseInt(total));
        }
        
        powerreturncount++;
        returnC++;
    }
});