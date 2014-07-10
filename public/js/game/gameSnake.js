$(document).ready(function(){
	
	var coordx, coordy;
	var blocknum = 30;
	var Box = new Array(blocknum);
	var snakes = new Array(2);
		snakes[0] = $('#snakehead');
	var snakespath = new Array(blocknum);
		for (i=0 ; i<blocknum ; i++) 
			snakespath[i] = new Array(2);
	var echinacea = new Array(7);
	var echinaceapath = new Array(2);
	var snakespathnum = 0;
	var length = 5;
	var key = 37;
	var time;
	
	iniblock();

////////////////////////////////////basic-architecture/////////////////////////////////////////////
	function iniblock()
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

		timeMove();
	}

////////////////////////////////////snake/////////////////////////////////////////////
	function timeMove()
	{
		var correct = 0;
		var timer = $.timer(function(){

			if(key==37) // move left
				coordy--;
			else if (key==38) // move up
				coordx--;	
			else if (key==39) // move right
				coordy++;
			else if (key==40) // move down
				coordx++;
	
			// Hit in edge -> lose
			if( (snakespath[0][1]==0&&key==37) || snakespath[0][0]==0 && key==38 || 
							snakespath[0][1]==29 && key==39 || snakespath[0][0]==29 && key==40)
			{
				alert("Oh,Oh, You lose!");
				corrcet = 1;
				timer.stop();
				
			}

			if(correct==0)
			{
				setRecent(); // set correct position
				presskey(); // keypressed and change direction
			}

		});
		timer.set({ time:100, autostart:true });
	}

	function coordRandom(coord)
	{
		coord = Math.random()*20+5;
		coord = coord - coord%1;
		return coord;
	}

	function setRecent()
	{
		// store new value of recent position of snack in snakespath[][] 
		for(var i=0; i<snakespathnum; i++)
			for(var j=0; j<2; j++)
				snakespath[snakespathnum-i][j] = snakespath[snakespathnum-i-1][j];
		snakespath[0][0] = coordx;
		snakespath[0][1] = coordy;

		// draw picture on screen
		for(var i=0; i<=snakespathnum; i++)
		{
			for(var j=0; j<2; j++)
			{
				if(i==0)
					snakes[0].appendTo(Box[ snakespath[i][0] ][ snakespath[i][1] ]);
				else if(i!=snakespathnum)
				{
					Box[ snakespath[i][0] ][ snakespath[i][1] ].empty();
					snakes[1] = $('<div id="snakebody"><img src="..\\images\\gameSnake\\body.jpg" width="27px" height="23px"></div>');
					snakes[1].appendTo(Box[ snakespath[i][0] ][ snakespath[i][1] ]);
				}
				else
					Box[ snakespath[i][0] ][ snakespath[i][1] ].empty();
			}
		}

		//if(snakespath[0][0]==echinaceapath[0] && snakespath[0][1]==echinaceapath[1])
		//	putechinacea();

	}

	function presskey()
	{
		$(document).keydown(function(event)
		{
			if(event.keyCode==37 && key!=37 && key!=39) // press left
				key=37;
			else if (event.keyCode==38 && key!=38 && key!=40) // press up
				key=38;
			else if (event.keyCode==39 && key!=39 && key!=37) // press right
				key=39;	
			else if (event.keyCode==40 && key!=40 && key!=38) // press down
				key=40;
		});
	}



////////////////////////////////////echinacea/////////////////////////////////////////////
	function putechinacea()
	{
		var rx,ry;
		var x,y;
		rx = coordRandom(x);
		ry = coordRandom(y);
		x = coordRandom(x);
		y = coordRandom(y);

		var put=1; 
		for(var i=0; i<snakespathnum; i++)
		{
			if( rx==snakespath[i][0] && ry==snakespath[i][1] )
			{
				putechinacea();
				put=0;
			}
		}

		for(var i=0; i<snakespathnum; i++)
		{
			if( (x==snakespath[i][0]&&y==snakespath[i][1]) || (x==rx&&y==ry) )
			{
				putechinacea();
				put=0;
			}
		}

		if(put==1)
		{
			if(echina<3000) // red
			{
				echinacea[0] = $('<div id="red"><img src="..\\images\\gameSnake\\red.jpg" "></div>');
				echinacea[0].appendTo(Box[x][y]);
			}
			if(echina<7000) // yellow
			{
				echinacea[1] = $('<div id="yellow"><img src="..\\images\\gameSnake\\yellow.jpg" "></div>');
				echinacea[1].appendTo(Box[x][y]);
			}
			else if(echina<2100) // green
			{
				echinacea[2] = $('<div id="green"><img src="..\\images\\gameSnake\\green.jpg" "></div>');
				echinacea[2].appendTo(Box[x][y]);
			}
			else if(echina<1680) // brown
			{
				echinacea[3] = $('<div id="brown"><img src="..\\images\\gameSnake\\brown.jpg" "></div>');
				echinacea[3].appendTo(Box[x][y]);
			}
			else if(echina<560) // purple
			{
				echinacea[4] = $('<div id="purple"><img src="..\\images\\gameSnake\\purple.jpg" "></div>');
				echinacea[4].appendTo(Box[x][y]);
			}
			else if(echina<420) // blue
			{
				echinacea[5] = $('<div id="blue"><img src="..\\images\\gameSnake\\blue.jpg" "></div>');
				echinacea[5].appendTo(Box[x][y]);
			}
			else if(echina<168) // muliticolor
			{
				echinacea[6] = $('<div id="muliticolor"><img src="..\\images\\gameSnake\\muliticolor.jpg" "></div>');
				echinacea[6].appendTo(Box[x][y]);
			}
		}
	}


});