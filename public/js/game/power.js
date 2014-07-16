$(function()
{
    $('#intro').click(function() {
            $('#cover').hide();
            $('#introduction').show();
    });

    $('#introduction').click(function() {
            $('#introduction').hide();
            $('#cover').show();
    });

    var questCount=0,correct,choose,option,click,clickCount=0,id=0;
    var quest = new Array(10);
    var dayQuest;

    $('#start').click(function() {
            $('#cover').hide();
            $('#startGame').show();
            nextQuest();
    });

    $('.base').click(function(){
        if(click == 0)
        {
            click = $(this).data('getclick');
            option = $(this).data('option');
            showAnswer();
        }
    });

    ajaxPost(getTransferData('day-quest-url'),'', storeQuest);
    function storeQuest(data)
    {
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
            $('#correctAns').text("答案正確！");
        else
            $('#correctAns').text("錯誤！正確答案為"+option);
        $('#correctAns').show();
        clickCount++;   
    }

    $('#button').click(function(){
        nextQuest();
        $('#correctAns').empty();
    })

});