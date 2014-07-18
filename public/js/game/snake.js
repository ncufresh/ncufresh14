$(document).ready(function(){
	var burl = getTransferData('burl');
	$('#intro').click(function() {
            $('#introduction').show();
    });

    $('#introduction').click(function() {
            $('#introduction').hide();
    });

	var difficult=0, mode=0;
	$('#difficulty1').click(function(){		clickDifficult();	difficult=1;
		$('#difficulty1').children().attr('src',''+burl+'/images/gameSnake/d1Click.png');
	});
	$('#difficulty2').click(function(){		clickDifficult();	difficult=2;
		$('#difficulty2').children().attr('src',''+burl+'/images/gameSnake/d2Click.png');
	});
	$('#difficulty3').click(function(){		clickDifficult();	difficult=3;
		$('#difficulty3').children().attr('src',''+burl+'/images/gameSnake/d3Click.png');
	});
	$('#mode1').click(function(){			clickMode();		mode=1;
		$('#mode1').children().attr('src',''+burl+'/images/gameSnake/m1Click.png');
	});
	$('#mode2').click(function(){			clickMode();		mode=2;
		$('#mode2').children().attr('src',''+burl+'/images/gameSnake/m2Click.png');
	});
	$('#mode3').click(function(){			clickMode();		mode=3;
		$('#mode3').children().attr('src',''+burl+'/images/gameSnake/m3Click.png');
	});
	function clickDifficult()
	{
		if(difficult==1)
			$('#difficulty1').children().attr('src',''+burl+'/images/gameSnake/d1.png');
		if(difficult==2)
			$('#difficulty2').children().attr('src',''+burl+'/images/gameSnake/d2.png');
		if(difficult==3)
			$('#difficulty3').children().attr('src',''+burl+'/images/gameSnake/d3.png');
	}
	function clickMode()
	{
		if(mode==1)
			$('#mode1').children().attr('src',''+burl+'/images/gameSnake/m1.png');
		if(mode==2)
			$('#mode2').children().attr('src',''+burl+'/images/gameSnake/m2.png');
		if(mode==3)
			$('#mode3').children().attr('src',''+burl+'/images/gameSnake/m3.png');
	}

	var power,done=false,recentScore = 0,waiting=false;
	ajaxPost(getTransferData('get-power-url'),'', getData);
	$('#start').click(function() 
	{
		if(power>0)
			if(difficult!=0&&mode!=0&&done==true)
			{
				$('#cover').hide();
				$('#content').show();
				$('#space').show();
				key=0;
				waiting = true;
			}
	});

////////////////////////////////init////////////////////////////////////////////
	var lose;
	var score = 0;
	var scorecount = new Array(6);
	var timer = $.timer(tick);
	var round;
	var timeCount;
	var loseTimer=0;
	$(document).keydown(function(event)
	{
		event.preventDefault();
		if(event.keyCode==32 && waiting == true) // press space
		{
			$('#space').hide();
			initial();
			startGame();
		}
		if(event.keyCode==37) // press left
			key=37;
		else if (event.keyCode==38) // press up
			key=38;	
		else if (event.keyCode==39) // press right
			key=39;	
		else if (event.keyCode==40) // press down
			key=40;
	});
////////////////////////////////snake////////////////////////////////////////////
	var coordx, coordy;
	var blocknum = 30;
	var Box = new Array(blocknum);
		for(var i=0; i<blocknum; i++)
			Box[i] = new Array(blocknum);
		for(var i=0; i<Box.length; i++)
		{
			var tr = $('<tr></tr>');
			tr.appendTo($('#snakeContent'));
			for(var j=0; j<Box[i].length; j++) 
			{
				Box[i][j] = $('<td class="block"></td>');
				Box[i][j].appendTo(tr);
			}
		}
	var snakes = new Array(2);
	var snakespath = new Array(900);
		for(var i=0 ; i<900 ; i++) 
			snakespath[i] = new Array(2);
	var snakespathnum;
	var length = 5;
	var key;
	var snakeDirection = 37;
////////////////////////////////echinacea////////////////////////////////////////////
	var echinacea;
	var bomb = new Array(50);
		for(var i=0 ; i<50 ; i++) 
			bomb[i] = new Array(2);
	var bombcount;
	var bombscorecount;
	var bombpicture;
	var bombEx = new Array(20);
	var point = new Array(2);
	var pointcount;
	var echina;
	var rx,ry;
	var x,y;
////////////////////////////////explosion////////////////////////////////////////////
	var explorRadius = 2;
	var live;
	var brokenBefore = new Array(800);
		for(var i=0 ; i<800 ; i++) 
			brokenBefore[i] = new Array(2);
	var brokenBeforeCount;
////////////////////////////////////initial-architecture/////////////////////////////////////////////
	function getData(data)
	{
		done = true;
		power=data['power'];
		recentScore=data['score'];
	}

	function initial()
	{
		lose = 0;
		score = 0;
		loseTimer=0;
		for(var i=0; i<6; i++)
			scorecount[i] = 0;
		timeCount = 0;
		snakespathnum = 0;
		key = 37;
		snakeDirection = 37;
		for(var i=0 ; i<50 ; i++) 
			for(var j=0; j<2; j++)
				bomb[i][j] = 0;
		bombcount = 0;
		bombscorecount = 0;
		for(var i=0 ; i<20 ; i++) 
			bombEx[i] = 10;
		pointcount = 0;
		live = 1000;
		brokenBeforeCount = 0;

		coordx=coordRandom(coordx);
		coordy=coordRandom(coordy);

		for(var i=0; i<length; i++)
		{
			if(i==0)
				headChange(coordx,coordy);
			else
			{
				snakes[1] = $('<div id="snakebody"><img src="'+burl+'/images/gameSnake/body.png" width="30px" height="25px"></div>');
				snakes[1].appendTo(Box[coordx][coordy+i]);
			}
			snakespath[snakespathnum][0] = coordx;
			snakespath[snakespathnum][1] = coordy+i;
			snakespathnum++;
		}


		if(mode!=3)
			bombEchinacea();
		pointEchinacea();
	}

	function coordRandom(coord)
	{
		coord = Math.random()*10+15;
		coord = coord - coord%1;
		return coord;
	}

	function headChange(x,y)
	{
		if(key==37) // move left
		{
			bombpicture = $('<div id="head"><img src="'+burl+'/images/gameSnake/headLeft.png"  width="35px" height="30px" "></div>');
			bombpicture.appendTo( Box[x][y] );
		}
		else if (key==38) // move up
		{
			bombpicture = $('<div id="head"><img src="'+burl+'/images/gameSnake/headUp.png"  width="30px" height="30px" "></div>');
			bombpicture.appendTo( Box[x][y] );
		}
		else if (key==39) // move right
		{
		 	bombpicture = $('<div id="head"><img src="'+burl+'/images/gameSnake/headRight.png"  width="35px" height="30px" "></div>');
			bombpicture.appendTo( Box[x][y] );

		}
		else if (key==40) // move down
		{	
			bombpicture = $('<div id="head"><img src="'+burl+'/images/gameSnake/headDown.png"  width="30px" height="30px" "></div>');
			bombpicture.appendTo( Box[x][y] );
		}

	} 
////////////////////////////////////snake/////////////////////////////////////////////
	function startGame()
	{
		round = (4-difficult)*2;
		timer.set({ time:30, autostart:true });
	}

	function tick()
	{
		timeCount++;
		if( timeCount%round != 0 )
			return;
		if(Math.abs(key-snakeDirection)!=2)
			snakeDirection = key;
		if(snakeDirection==37) // move left
			coordy--;
		else if (snakeDirection==38) // move up
			coordx--;	
		else if (snakeDirection==39) // move right
			coordy++;
		else if (snakeDirection==40) // move down
			coordx++;

		if(lose==0)
			loseOthers();

		if( timeCount%20==0 && bombcount!=0 && lose==0 )
			bombExplosion();

		if(lose==0)
		{
			loseItself();
			tickMove();
			loseItself();
			refresh();
		}
		else
			loseTimer++;

		if(loseTimer==10)
		{
			totalScore();
			timer.stop();
			editStatus((power-1),(parseInt(score)+parseInt(recentScore)));
			$('#content').hide();
			$('#endScreen').show();
			ajaxPost(getTransferData('renew-value-url'),{score:score} ,'');

			for(var i=0; i<blocknum; i++)
				for(var j=0; j<blocknum; j++)
					Box[i][j].empty();

			$('#again').click(function() {
				done=false;
				get=false;
				waiting=false
				$('#endScreen').hide();
				if(difficult==1)
					$('#difficulty1').children().attr('src',''+burl+'/images/gameSnake/d1Click.png');
				if(difficult==2)
					$('#difficulty2').children().attr('src',''+burl+'/images/gameSnake/d2Click.png');
				if(difficult==3)
					$('#difficulty3').children().attr('src',''+burl+'/images/gameSnake/d3Click.png');
				if(mode==1)
					$('#mode1').children().attr('src',''+burl+'/images/gameSnake/m1Click.png');
				if(mode==2)
					$('#mode2').children().attr('src',''+burl+'/images/gameSnake/m2Click.png');
				if(mode==3)
					$('#mode3').children().attr('src',''+burl+'/images/gameSnake/m3Click.png');
					$('#cover').show();
				ajaxPost(getTransferData('get-power-url'),'', getData);
			});
		}
		levelUp();
	}

	function tickMove()
	{
		// eat a point echinacea 
		if(snakespath[0][0]==point[0] && snakespath[0][1]==point[1])
		{
			Box[point[0]][point[1]].empty();
			headChange(snakespath[0][0],snakespath[0][1]);
			snakespathnum++;

			if(0<=echina && echina<60) // yellow
				scorecount[0]++;
			else if(60<=echina && echina<80) // white
				scorecount[1]++;
			else if(80<=echina && echina<92) // green
				scorecount[2]++;
			else if(92<=echina && echina<97) // blue
				scorecount[3]++;			
			else if(97<=echina && echina<99) // purple
				scorecount[4]++;			
			else // muliticolor
				scorecount[5]++;

			if(mode!=3)
				bombEchinacea();
			else
				for(var i=0; i<5+pointcount; i++)
					bombEchinacea();
			pointEchinacea();
		}

		// store new value of recent position of snack in snakespath[][] 
		for(var i=0; i<snakespathnum; i++)
			for(var j=0; j<2; j++)
				snakespath[snakespathnum-i][j] = snakespath[snakespathnum-i-1][j];
		snakespath[0][0] = coordx;
		snakespath[0][1] = coordy;
	}

	function loseOthers()
	{
		var hitBomb = 0;
		// Hit the wall -> lose
		if( (snakespath[0][1]==0&&snakeDirection==37) || snakespath[0][0]==0 && snakeDirection==38 || 
					snakespath[0][1]==29 && snakeDirection==39 || snakespath[0][0]==29 && snakeDirection==40)
			lose = 1;

		// Hit the bomb
		for(var i=0; i<bombcount; i++)
			if( (snakespath[0][0]==bomb[i][0]) && (snakespath[0][1]==bomb[i][1]) )
			{
				lose = 1;
				hitBomb=1;
			}
		if(hitBomb==1)
		{
			for(var i=0; i<snakespathnum; i++)
			{
				bombpicture = $('<div id="brokenBody"><img src="'+burl+'/images/gameSnake/brokenBody.png"  width="30px" height="25px" "></div>');
				bombpicture.appendTo( Box[ snakespath[i][0] ][ snakespath[i][1] ] );
			}
			Box[ snakespath[0][0] ][ snakespath[0][1] ].empty();
			bombpicture = $('<div id="brokenHead"><img src="'+burl+'/images/gameSnake/brokenHead.png"  width="30px" height="25px" "></div>');
			bombpicture.appendTo( Box[ snakespath[0][0] ][ snakespath[0][1] ] );
		}
			
	}

	function loseItself()
	{
		// Hit itself
		for(var i=1; i<snakespathnum; i++)
			if( (snakespath[0][0]==snakespath[i][0]) && (snakespath[0][1]==snakespath[i][1]) )
				lose = 1;

	}

	function refresh()
	{
		// draw picture on screen
		for(var i=snakespathnum; i>=0; i--)
		{
			for(var j=0; j<2; j++)
			{
				if(i==0)
					headChange(snakespath[i][0],snakespath[i][1]);
				else if(i!=snakespathnum)
				{
					Box[ snakespath[i][0] ][ snakespath[i][1] ].empty();
					snakes[1] = $('<div id="snakebody"><img src="'+burl+'/images/gameSnake/body.png" width="30px" height="25px"></div>');
					snakes[1].appendTo(Box[ snakespath[i][0] ][ snakespath[i][1] ]);
				}
				else
					Box[ snakespath[i][0] ][ snakespath[i][1] ].empty();
			}
		}
	}

	function levelUp()
	{
		if(mode==2&&round!=1)
		{
			if(difficult==1 && timeCount%200==0)
				round -= 1;	
			if(difficult==2 && timeCount%160==0)
				round -= 1; 				
			if(difficult==3 && timeCount%120==0)
				round -= 1; 				
		}
	}
	
	function coordEchinaceaRandom(coord)
	{
		coord = Math.random()*blocknum;
		coord = coord - coord%1;
		return coord;
	}

////////////////////////////////////echinacea/////////////////////////////////////////////

	function bombEchinacea()
	{
		var correct = 1;
		rx = coordEchinaceaRandom(rx);
		ry = coordEchinaceaRandom(ry);
		if(rx==0){rx=1;}
		if(rx==29){rx=28;}
		if(ry==0){ry=1;}
		if(ry==29){ry=28;}

		var bechina = Math.random()*100;

		if(bechina<30) // red
		{
			bombscorecount++;
			// bombechinacea and snake can't at the same place
			for(var i=0; i<snakespathnum; i++)
				if( rx==snakespath[i][0]&&ry==snakespath[i][1] )
				{
					bombEchinacea();
					correct=0;
				}
			// bombechinacea and pointechinacea can't at the same place
			//avoid bomb appear the same column and row
			if( (rx==point[0]&&ry==point[1]) || rx==snakespath[0][0] || ry==snakespath[0][1] )
			{
				bombEchinacea();
				correct=0;
			}
			// mode3 V.S. bombechinacea
			if(mode==3)
				for(var i=0; i<bombcount; i++)
					if(rx==bomb[i][0]&&ry==bomb[i][1])
					{
						bombEchinacea();
						correct=0;
					}
		////////////////////////////////////

			if(correct==1)
			{
				if(mode!=3)
				{
					echinacea = $('<div id="red"><img src="'+burl+'/images/gameSnake/red.png"  width="30px" height="25px" "></div>');
					echinacea.appendTo(Box[rx][ry]);				
				}
				else
				{
					bombpicture = $('<div id="bomb3"><img src="'+burl+'/images/gameSnake/bomb3.png"  width="30px" height="25px" "></div>');
					bombpicture.appendTo(Box[rx][ry]);
					bombEx[bombcount]=3;
				}
				
				bomb[bombcount][0]=rx;
				bomb[bombcount][1]=ry;
				bombcount++;
				
			}
		}
	}

	function pointEchinacea()
	{
		pointcount++;
		var correct = 1;
		x = coordEchinaceaRandom(x);
		y = coordEchinaceaRandom(y);

		// pointechinacea and snake can't at the same place
		for(var i=0; i<snakespathnum; i++)
			if(x==snakespath[i][0]&&y==snakespath[i][1])
			{
				pointEchinacea();
				correct=0;
			}
		// pointechinacea and bombechinacea can't at the same place
		for(var i=0; i<bombcount; i++)
		{
			if(x==bomb[i][0]&&y==bomb[i][1])
			{
				pointEchinacea();
				correct=0;
			}
		}

		echina = Math.random()*100;
		if(correct==1)
		{	// 0.60, 0.20, 0.12, 0.05, 0.02, 0.01
			if(0<=echina && echina<60) // yellow
				echinacea = $('<div id="yellow"><img src="'+burl+'/images/gameSnake/yellow.png" width="30px" height="25px" "></div>');
			else if(60<=echina && echina<80) // green
				echinacea = $('<div id="white"><img src="'+burl+'/images/gameSnake/white.png" width="30px" height="25px" "></div>');
			else if(80<=echina && echina<92) // brown
				echinacea = $('<div id="green"><img src="'+burl+'/images/gameSnake/green.png" width="30px" height="25px" "></div>');
			else if(92<=echina && echina<97) // purple
				echinacea = $('<div id="blue"><img src="'+burl+'/images/gameSnake/blue.png" width="30px" height="25px" "></div>');
			else if(97<=echina && echina<99) // blue
				echinacea = $('<div id="purple"><img src="'+burl+'/images/gameSnake/purple.png" width="30px" height="25px" "></div>');
			else // muliticolor
				echinacea = $('<div id="muliticolor"><img src="'+burl+'/images/gameSnake/muliticolor.png" width="30px" height="25px" "></div>');
			echinacea.appendTo(Box[x][y]);

			point[0] = x;
			point[1] = y;
		}
	}

////////////////////////////////////explosion/////////////////////////////////////////////
	function bombExplosion()
	{
		var count = 0;
		for(var i=0; i<bombcount; i++)
		{
			if(bombEx[i]==3)
			{
				bombEx[i]--;
				bombpicture = $('<div id="bomb2"><img src="'+burl+'/images/gameSnake/bomb2.png"  width="30px" height="25px" "></div>');
				bombpicture.appendTo(Box[bomb[i][0]][bomb[i][1]]);
			}
			else if(bombEx[i]==2)
			{
				bombEx[i]--;
				bombpicture = $('<div id="bomb1"><img src="'+burl+'/images/gameSnake/bomb1.png"  width="30px" height="25px" "></div>');
				bombpicture.appendTo(Box[bomb[i][0]][bomb[i][1]]);
			}
			else if(bombEx[i]==1)
			{
				bombEx[i]--;
				Box[bomb[i][0]][bomb[i][1]].empty();
				nearExplosion(bomb[i][0],bomb[i][1]);
			}
			else if(bombEx[i]==0)
			{
				Box[bomb[i][0]][bomb[i][1]].empty();
				count++;
				nearExplosionClear(bomb[i][0],bomb[i][1]);
			}
		}
		// refresh bomb[][] because of the explosion
		for(var i=0; i<bombcount-count; i++)
		{
			bomb[i][0]=bomb[count+i][0];
			bomb[i][1]=bomb[count+i][1];
			bombEx[i] = bombEx[count+i] ;
		}
		for(var i=bombcount-count; i<bombcount; i++)
			bombEx[i]=10;

		bombcount = bombcount-count;
		
	}

	function nearExplosion(x,y)
	{
		live = 1000;
		for(var i=-1; i<explorRadius; i++)
			for(var j=-1; j<explorRadius; j++)
			{
				// produce a pointEchinacea if a recent pointEchinacea was broken by explosion
				if((x+i)==point[0]&&(y+j)==point[1])
				{
					Box[point[0]][point[1]].empty();
					pointEchinacea();
				}
				
				bombpicture = $('<div id="exbomb"><img src="'+burl+'/images/gameSnake/exbomb.png"  width="30px" height="25px" "></div>');
				bombpicture.appendTo(Box[x+i][y+j]);

				// get the smallest broken dot of the snake
				for(var k=0; k<snakespathnum; k++)
					if( (x+i)==snakespath[k][0] && (y+j)==snakespath[k][1] )
					{
						var buffer = k;
						if(live>buffer)
							live = k;
					}
			}

		brokenSnake();
	}

	function brokenSnake()
	{
		// body of snake is explore
		if(live!=1000)
		{
			for(var i=live; i<snakespathnum; i++)
			{
				bombpicture = $('<div id="brokenBody"><img src="'+burl+'/images/gameSnake/brokenBody.png"  width="30px" height="25px" "></div>');
				bombpicture.appendTo(Box[snakespath[i][0]][snakespath[i][1]]);
				brokenBefore[brokenBeforeCount][0] = snakespath[i][0];
				brokenBefore[brokenBeforeCount][1] = snakespath[i][1];
				brokenBeforeCount++;
			}

			if(live==0)
			{
				lose=1;
				for(var j=0; j<snakespathnum; j++)
				{
					bombpicture = $('<div id="brokenBody"><img src="'+burl+'/images/gameSnake/brokenBody.png"  width="30px" height="25px" "></div>');
					bombpicture.appendTo( Box[snakespath[j][0] ][ snakespath[j][1] ] );
				}
				Box[ snakespath[0][0] ][ snakespath[0][1] ].empty();
				bombpicture = $('<div id="brokenHead"><img src="'+burl+'/images/gameSnake/brokenHead.png"  width="30px" height="25px" "></div>');
				bombpicture.appendTo( Box[ snakespath[0][0] ][ snakespath[0][1] ] );
			}
			snakespathnum = live;
		}	
	}

	function nearExplosionClear(x,y)
	{
		for(var i=-1; i<explorRadius; i++)
			for(var j=-1; j<explorRadius; j++)
			{
				Box[x+i][y+j].empty();
				if( point[0]==(x+i) && point[1]==(y+j) )
					pointEchinacea();
			}
				
		if(brokenBeforeCount!=0)
		{
			for(var i=0; i<brokenBeforeCount; i++)
				Box[ brokenBefore[i][0] ][ brokenBefore[i][1] ].empty();	
			brokenBeforeCount = 0;
		}
	}

////////////////////////////////////score/////////////////////////////////////////////
	function totalScore()
	{
		if(difficult==1)
		{
			score += (scorecount[0]*3);
			score += (scorecount[1]*9);
			score += (scorecount[2]*15);
			score += (scorecount[3]*45);
			score += (scorecount[4]*60);
			score += (scorecount[5]*150);
		}
		if(difficult==2)
		{
			score += (scorecount[0]*5);
			score += (scorecount[1]*15);
			score += (scorecount[2]*25);
			score += (scorecount[3]*75);
			score += (scorecount[4]*100);
			score += (scorecount[5]*250);
		}
		if(difficult==3)
		{
			score += (scorecount[0]*8);
			score += (scorecount[1]*24);
			score += (scorecount[2]*40);
			score += (scorecount[3]*120);
			score += (scorecount[4]*160);
			score += (scorecount[5]*400);
		}
		if(mode==2)
			score = ((50+timeCount*0.03)/50)*score;
			
		if(mode==3)
			for(var i=0; i<3; i++)
				if(difficult==1+i)
					score += bombscorecount*(3+i);

		score = score-(score%1);

		$('#score').text("Total Score :   "+score);
	} 
});