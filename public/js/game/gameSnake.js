$(document).ready(function(){

	var difficult=3, mode=3;
	$('#difficulty1').click(function(){		clickDifficult();	difficult=1;
		$('#difficulty1').children().attr('src','..\\images\\gameSnake\\d1Click.jpg');
	});
	$('#difficulty2').click(function(){		clickDifficult();	difficult=2;
		$('#difficulty2').children().attr('src','..\\images\\gameSnake\\d2Click.jpg');
	});
	$('#difficulty3').click(function(){		clickDifficult();	difficult=3;
		$('#difficulty3').children().attr('src','..\\images\\gameSnake\\d3Click.jpg');
	});
	$('#mode1').click(function(){			clickMode();		mode=1;
		$('#mode1').children().attr('src','..\\images\\gameSnake\\m1Click.jpg');
	});
	$('#mode2').click(function(){			clickMode();		mode=2;
		$('#mode2').children().attr('src','..\\images\\gameSnake\\m2Click.jpg');
	});
	$('#mode3').click(function(){			clickMode();		mode=3;
		$('#mode3').children().attr('src','..\\images\\gameSnake\\m3Click.jpg');
	});
	function clickDifficult()
	{
		if(difficult==1)
			$('#difficulty1').children().attr('src','..\\images\\gameSnake\\d1.jpg');
		if(difficult==2)
			$('#difficulty2').children().attr('src','..\\images\\gameSnake\\d2.jpg');
		if(difficult==3)
			$('#difficulty3').children().attr('src','..\\images\\gameSnake\\d3.jpg');
	}
	function clickMode()
	{
		if(mode==1)
			$('#mode1').children().attr('src','..\\images\\gameSnake\\m1.jpg');
		if(mode==2)
			$('#mode2').children().attr('src','..\\images\\gameSnake\\m2.jpg');
		if(mode==3)
			$('#mode3').children().attr('src','..\\images\\gameSnake\\m3.jpg');
	}

	/**/
	$('#start').click(function() {
		//if(difficult==1&&mode==1)
		{
			$('#cover').hide();
			$('#content').show();
			initial();
			startGame();
		}
	});
	/**/
////////////////////////////////init////////////////////////////////////////////
	var lose=0;
	var score=0;
	var scorecount = new Array(6);
		for(var i=0; i<6; i++)
			scorecount[i]=0;
	var timer = $.timer(tick);
	var round;
	var timeCount=0;
	$(document).keydown(function(event)
	{
		event.preventDefault();
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
	var snakes = new Array(2);
		snakes[0] = $('#snakehead');
	var snakespath = new Array(900);
		for(var i=0 ; i<900 ; i++) 
			snakespath[i] = new Array(2);
	var snakespathnum = 0;
	var length = 5;
	var key = 37;
	var snakeDirection = 37;
////////////////////////////////echinacea////////////////////////////////////////////
	var echinacea = new Array(7);
	var bomb = new Array(50);
		for(var i=0 ; i<50 ; i++) 
			bomb[i] = new Array(2);
		for(var i=0 ; i<50 ; i++) 
			for(var j=0; j<2; j++)
				bomb[i][j]=0;
	var bombcount=0;
	var bombpicture;
	var bombEx = new Array(20);
		for(var i=0 ; i<20 ; i++) 
			bombEx[i] = 10;
	var point = new Array(2);
	var echina;
	var rx,ry;
	var x,y;
////////////////////////////////explosion////////////////////////////////////////////
	var explorRadius = 2;
	var live = 1000;
	var brokenBefore = new Array(800);
		for(var i=0 ; i<800 ; i++) 
			brokenBefore[i] = new Array(2);
	var brokenBeforeCount=0;
////////////////////////////////////initial-architecture/////////////////////////////////////////////
	function initial()
	{
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

		coordx=coordRandom(coordx);
		coordy=coordRandom(coordy);

		for(var i=0; i<length; i++)
		{
			if(i==0)
				snakes[0].appendTo(Box[coordx][coordy]);
			else
			{
				snakes[1] = $('<div id="snakebody"><img src="..\\images\\gameSnake\\body.jpg" width="27px" height="23px"></div>');
				snakes[1].appendTo(Box[coordx][coordy+i]);
			}
			snakespath[snakespathnum][0] = coordx;
			snakespath[snakespathnum][1] = coordy+i;
			snakespathnum++;
		}

		if(mode==3)
			for(var i=0; i<4; i++)
				bombEchinacea();
		bombEchinacea();
		pointEchinacea();
	}

	function coordRandom(coord)
	{
		coord = Math.random()*10+15;
		coord = coord - coord%1;
		return coord;
	}
////////////////////////////////////snake/////////////////////////////////////////////
	function startGame()
	{
		round= (4-difficult)*2;
		timer.set({ time:50, autostart:true });
	}

	var loseTimer=0;
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
			$('#content').hide();
			$('#endScreen').show();
			$('#collect').click(function() {

			});
			$('#again').click(function() {location.reload();});
		}
		levelUp();
	}

	function tickMove()
	{
		// eat a point echinacea 
		if(snakespath[0][0]==point[0] && snakespath[0][1]==point[1])
		{
			snakes[0].appendTo(Box[ snakespath[0][0] ][ snakespath[0][1] ]);
			snakespathnum++;
			if(mode!=3)
				bombEchinacea();
			else
				for(var i=0; i<5; i++)
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
		// Hit the wall -> lose
		if( (snakespath[0][1]==0&&snakeDirection==37) || snakespath[0][0]==0 && snakeDirection==38 || 
					snakespath[0][1]==29 && snakeDirection==39 || snakespath[0][0]==29 && snakeDirection==40)
			lose = 1;

		// Hit the bomb
		for(var i=0; i<bombcount; i++)
			if( (snakespath[0][0]==bomb[i][0]) && (snakespath[0][1]==bomb[i][1]) )
			{
				lose = 1;
				bombpicture = $('<div id="bomb"><img src="..\\images\\gameSnake\\bomb.jpg"  width="30px" height="23px" "></div>');
				bombpicture.appendTo( Box[ bomb[i][0] ][ bomb[i][1] ] );
			}
		for(var i=0; i<snakespathnum; i++)
		{
			bombpicture = $('<div id="brokenBody"><img src="..\\images\\gameSnake\\brokenBody.jpg"  width="30px" height="23px" "></div>');
			bombpicture.appendTo( Box[ snakespath[i][0] ][ snakespath[i][1] ] );
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
					snakes[0].appendTo(Box[ snakespath[i][0] ][ snakespath[i][1] ]);
				else if(i!=snakespathnum)
				{
					Box[ snakespath[i][0] ][ snakespath[i][1] ].empty();
					snakes[1] = $('<div id="snakebody"><img src="..\\images\\gameSnake\\body.jpg" width="30px" height="23px"></div>');
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

		echina = Math.random()*100;

		if(echina<30) // red
		{
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
					echinacea[0] = $('<div id="red"><img src="..\\images\\gameSnake\\red.jpg"  width="30px" height="23px" "></div>');
					echinacea[0].appendTo(Box[rx][ry]);				
				}
				else
				{
					bombpicture = $('<div id="bomb3"><img src="..\\images\\gameSnake\\bomb3.jpg"  width="30px" height="23px" "></div>');
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
			{
				echinacea[1] = $('<div id="yellow"><img src="..\\images\\gameSnake\\yellow.jpg" width="30px" height="23px" "></div>');
				echinacea[1].appendTo(Box[x][y]);
				scorecount[0]++;
			}
			else if(60<=echina && echina<80) // green
			{
				echinacea[2] = $('<div id="green"><img src="..\\images\\gameSnake\\green.jpg" width="30px" height="23px" "></div>');
				echinacea[2].appendTo(Box[x][y]);
				scorecount[1]++;
			}
			else if(80<=echina && echina<92) // brown
			{
				echinacea[3] = $('<div id="brown"><img src="..\\images\\gameSnake\\brown.jpg" width="30px" height="23px" "></div>');
				echinacea[3].appendTo(Box[x][y]);
				scorecount[2]++;
			}
			else if(92<=echina && echina<97) // purple
			{
				echinacea[4] = $('<div id="purple"><img src="..\\images\\gameSnake\\purple.jpg" width="30px" height="23px" "></div>');
				echinacea[4].appendTo(Box[x][y]);
				scorecount[3]++;
			}
			else if(97<=echina && echina<99) // blue
			{
				echinacea[5] = $('<div id="blue"><img src="..\\images\\gameSnake\\blue.jpg" width="30px" height="23px" "></div>');
				echinacea[5].appendTo(Box[x][y]);
				scorecount[4]++;
			}
			else // muliticolor
			{
				echinacea[6] = $('<div id="muliticolor"><img src="..\\images\\gameSnake\\muliticolor.jpg" width="30px" height="23px" "></div>');
				echinacea[6].appendTo(Box[x][y]);
				scorecount[5]++;
			}
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
				bombpicture = $('<div id="bomb2"><img src="..\\images\\gameSnake\\bomb2.jpg"  width="30px" height="23px" "></div>');
				bombpicture.appendTo(Box[bomb[i][0]][bomb[i][1]]);
			}
			else if(bombEx[i]==2)
			{
				bombEx[i]--;
				bombpicture = $('<div id="bomb1"><img src="..\\images\\gameSnake\\bomb1.jpg"  width="30px" height="23px" "></div>');
				bombpicture.appendTo(Box[bomb[i][0]][bomb[i][1]]);
			}
			else if(bombEx[i]==1)
			{
				bombEx[i]--;
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
					pointEchinacea();

				bombpicture = $('<div id="exbomb"><img src="..\\images\\gameSnake\\exbomb.jpg"  width="30px" height="23px" "></div>');
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
				bombpicture = $('<div id="brokenBody"><img src="..\\images\\gameSnake\\brokenBody.jpg"  width="30px" height="23px" "></div>');
				bombpicture.appendTo(Box[snakespath[i][0]][snakespath[i][1]]);
				brokenBefore[brokenBeforeCount][0] = snakespath[i][0];
				brokenBefore[brokenBeforeCount][1] = snakespath[i][1];
				brokenBeforeCount++;
			}		

			if(live==0)
			{
				lose=1;
				alert(snakespathnum);
				for(var j=0; j<snakespathnum; j++)
				{
					bombpicture = $('<div id="brokenBody"><img src="..\\images\\gameSnake\\brokenBody.jpg"  width="30px" height="23px" "></div>');
					bombpicture.appendTo( Box[snakespath[j][0] ][ snakespath[j][1] ] );
				}	
			}
			snakespathnum = live;
		}	
	}

	function nearExplosionClear(x,y)
	{
		for(var i=-1; i<explorRadius; i++)
			for(var j=-1; j<explorRadius; j++)
				Box[x+i][y+j].empty();
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
		if(mode!=1)
			score = ((100+timeCount*0.05)/100)*score;
		score = score-(score%1);
		//alert(score);
	} 
});