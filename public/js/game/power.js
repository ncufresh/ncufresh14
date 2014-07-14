$(function()
{

    console.log(getTransferData('day-quest-url'));
    var count,correct,click;
initial();
    function initial()
    {
        ajaxPost(getTransferData('day-quest-url'),'', function(dayQuest) 
        {
            count = 1;
            correct = dayQuest[0]['correctans'];
            click = 0;

            $('#question').text("Q" + count + "： " + dayQuest[0]['question']);
            $('#qa').text("(A)  " + dayQuest[0]['qA']);
            $('#qb').text("(B)  " + dayQuest[0]['qB']);
            $('#qc').text("(C)  " + dayQuest[0]['qC']);
            $('#qd').text("(D)  " + dayQuest[0]['qD']);

            $('#qa').click(function() { click=1; showAnswer(dayQuest[0]['answer']); });
            $('#qb').click(function() { click=2; showAnswer(dayQuest[0]['answer']); });
            $('#qc').click(function() { click=3; showAnswer(dayQuest[0]['answer']); });
            $('#qd').click(function() { click=4; showAnswer(dayQuest[0]['answer']); });

        });
    }

    function showAnswer(getAnswer)
    {
        if(correct==click)
        {
            $('#correctAns').empty();
            $('#correctAns').show();
            $('#correctAns').text("答對囉~正確答案是\n" + getAnswer);
        }
        else
        {
            $('#correctAns').empty();
            $('#correctAns').show();
            $('#correctAns').text("答錯惹~正確答案是\n" + getAnswer);
        }
    }
  
});