$(function()
{
    var burl = getTransferData('burl');
    $.konami({
        code: [49, 57, 54, 89, 79],
        interval: 1000,
        complete: function()
        {
            var timeCount;
            var timer = $.timer(tick);
            var hclick;
            var findEmpty;
            var randomSelect;
            var place = new Array(9);
                for(var i=0; i<9; i++)
                    place[i]=i;
            var choose = false,start,clickPic,win,fin;
            $('#cover').hide();
            $('#startGame').hide();
            $('#endScreen').hide();
            $('#hcover').show();

            $('.picture').each(function(index) 
            {
                $(this).click(function()
                {
                    choose = true;
                    $('.picture').removeClass('pictureClick');
                    hclick = $(this).data('getclick');
                    $(this).addClass('pictureClick');
                });
            })

            $('#hstart').click(function()
            {
                if(choose==true)
                {
                    $('#hcover').hide();
                    $('#hstartGame').show();
                    init();
                }
            });

            $('#hagain').click(function()
            {
                $('#hagain').hide();
                $('#finish').hide();
                $('#hstartGame').hide();
                $('#hcover').show();
            });

            function init()
            {
                timeCount = 0;
                findEmpty = 8;
                start = false;
                clickPic = false;
                win = true;
                fin = false;
                randomSelect = 0;
                $('#timing').empty();
                for(var i=0; i<9; i++)
                {
                    $('.c'+i+'').css({
                        background: 'url("'+burl+'/images/gamePower/photo.png")',
                        backgroundPosition: '-'+(i*199)+'px -'+(hclick*199)+'px'
                    });
                }
                timer.set({ time:10, autostart:true });
                clicking();
            }   
            
            function tick()
            {
                var min = 0,sec = 0;
                timeCount++;

                if(timeCount<200)
                    randomTurn();
                else if(timeCount%100==0)
                {
                    var rtime = timeCount-2;
                    start = true;
                    $('#timing').empty();
                    if(timeCount>=6000)
                        min = ((rtime)/6000) - ((rtime)/6000)%1;
                    sec = (rtime-min*6000)/100-((rtime-min*6000)/100)%1;
                    $('#timing').text(min+"分"+sec+"秒");
                }
            }

            function randomTurn()
            {
                var ran = Math.random()*9;
                ran = ran-ran%1;
                doOrNot(ran);
            }

            function clicking()
            {
                $('.c').each(function(index) 
                {
                    $(this).click(function()
                    {
                        if(fin==false)
                            doOrNot(index);
                    });
                })
            }

            function doOrNot(index)
            {
                if(index==0 && (findEmpty==1 || findEmpty==3))
                    clickPic = true;
                else if(index==1 && (findEmpty==0 || findEmpty==2 || findEmpty==4))
                    clickPic = true;
                else if(index==2 && (findEmpty==1 || findEmpty==5))
                    clickPic = true;
                else if(index==3 && (findEmpty==0 || findEmpty==4 || findEmpty==6))
                    clickPic = true;
                else if(index==4 && (findEmpty==1 || findEmpty==3 || findEmpty==5 || findEmpty==7))
                    clickPic = true;
                else if(index==5 && (findEmpty==2 || findEmpty==4 || findEmpty==8))
                    clickPic = true;
                else if(index==6 && (findEmpty==3 || findEmpty==7))
                    clickPic = true;
                else if(index==7 && (findEmpty==4 || findEmpty==6 || findEmpty==8))
                    clickPic = true;
                else if(index==8 && (findEmpty==5 || findEmpty==7))
                    clickPic = true;
                moveOrNot(index);
            }

            function moveOrNot(index)
            {
                if(clickPic==true)
                {
                    var buffer = place[index];
                    place[index] = place[findEmpty];
                    place[findEmpty] = buffer;
                    $('.c'+findEmpty+'').css({
                        background: 'url("'+burl+'/images/gamePower/photo.png")',
                        backgroundPosition: '-'+(place[findEmpty]*199)+'px -'+(hclick*199)+'px'
                    });
                    $('.c'+index+'').css({ 
                        background: 'url("'+burl+'/images/gamePower/photo.png")',
                        backgroundPosition: '-1592px -'+(hclick*199)+'px'
                    });
                    findEmpty = index;
                    if(start==true)
                       winOrNot();
                    clickPic = false;
                }
            }

            function winOrNot()
            {
                win=true;
                for(var i=0; i<9; i++)
                    if(place[i]!=i)
                        win = false;
                if(win==true)
                {
                    timer.stop();
                    fin = true;
                    for(var i=0; i<8; i++)
                    {
                        $('.c'+i+'').css({
                            background: 'url("'+burl+'/images/gamePower/photo.png")',
                            backgroundPosition: '-'+(i*199)+'px -'+(hclick*199)+'px'
                        });
                    }
                    $('.c8').css({
                        background: 'url("'+burl+'/images/gamePower/photo.png")',
                        backgroundPosition: '-1791px -'+(hclick*199)+'px'
                    });
                    $('#hagain').show();
                    $('#finish').show();
                }
            }


        }
    });

    var burl = getTransferData('burl');
    var correct,correctCount=0,option,click,clickCount=0,id=0;
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
            ajaxPost(getTransferData('renew-value-url'),{power:returnCount, _token: token},'');
            timer = $.timer(powerAnimate);
            timer.set({ time:500, autostart:true });
        }
        else
        {
            nextQuest();
            ajaxPost(getTransferData('recent-power-url'),'', getRecent);
        }
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
        else if(count < 8)
            hi = 2;
        else if(count < 9)
            hi = 3;
        else if(count < 10)
            hi = 4;
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
            $('#again').show();
            var total = parseInt(recentPower)+parseInt(returnCount);
            if(total>=0 && total<=maxPower)
                editStatus(parseInt(total));
        }
        
        powerreturncount++;
        returnC++;
    }
});