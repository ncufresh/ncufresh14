$(function()
{
    var questNum,correct,click,id=0;
    var quest = new Array(10);
    initial();
    function initial()
    {
        ajaxPost(getTransferData('day-quest-url'),'', function(dayQuest) 
        {
            for(questNum=0;questNum<10;id++)
                radomSelect(id);
            click = 0;

            // for(var i=0; i<10; i++)
            //     alert(quest[i]);

            for(var i=0; i<10; i++)
            {
                correct = dayQuest[quest[i]]['correctans'];
                $('#question').text("Q" + i + "：" + dayQuest[quest[i]]['question']);
                $('#qa').text("(A)  " + dayQuest[quest[i]]['qA']);
                $('#qb').text("(B)  " + dayQuest[quest[i]]['qB']);
                $('#qc').text("(C)  " + dayQuest[quest[i]]['qC']);
                $('#qd').text("(D)  " + dayQuest[quest[i]]['qD']);

                $('#qa').click(function() { click=1; showAnswer(dayQuest[quest[i]]['answer']); });
                $('#qb').click(function() { click=2; showAnswer(dayQuest[quest[i]]['answer']); });
                $('#qc').click(function() { click=3; showAnswer(dayQuest[quest[i]]['answer']); });
                $('#qd').click(function() { click=4; showAnswer(dayQuest[quest[i]]['answer']); });
            }
            

        });
    }

    function radomSelect(getId)
    {
        var random = Math.random()*15;
        random -= random%1;
        var choose=1;
        
        for(var i=0; i<questNum; i++)
            if(quest[i]==random)
                choose = 0;
        if(choose==1)
        {
            quest[questNum] = getId;
            questNum++;
        }
        alert("random="+random+" choose="+choose+" questNum"+questNum);
        
    }
            // var timer = $.timer(tick);
            // timer.set({ time:30, autostart:true });
    function showAnswer(getAnswer)
    {
        if(correct==click)
            $('#correctAns').text("答對囉~正確答案是" + getAnswer);
        else
            $('#correctAns').text("答錯惹~正確答案是" + getAnswer);
        $('#correctAns').empty();
        $('#correctAns').show();
        $('#correctAns').click(function(){initial();
        });
        
    }
  
});