$(document).ready(function(){

	var difficult, mode;
	$('#difficulty1').click(function(){$('#cover').hide();
			$('#content').show();});
	$('#difficulty2').click(function(){difficult=2;});
	$('#difficulty3').click(function(){difficult=3;});
	$('#mode1').click(function(){mode=1;});
	$('#mode2').click(function(){mode=2;});
	$('#mode3').click(function(){mode=3;});

	/*$('#start').click(function() {
		if(difficult==1&&mode==1)
		{
			$('#cover').hide();
			$('#content').show();
		}
		
	});*/
	



///////////////////////////////////////////////////////
	var coordx, coordy;
	var blocknum = 30;
	var Box = new Array(blocknum);
	var snakes = new Array(2);
		snakes[0] = $('#snakehead');
	var snakespath = new Array(blocknum);
		for(var i=0 ; i<blocknum ; i++) 
			snakespath[i] = new Array(2);
	var snakespathnum = 0;
	var length = 5;
	var key = 37;
	var speed=100;;
	
////////////////////////////////////////////////////////////////////////////
	var echinacea = new Array(7);
	var bomb = new Array(5);
		for(var i=0 ; i<5 ; i++) 
			bombEchinacea[i] = new Array(2);
	var point = new Array(2);
	var bombcount=0, pointcount=0;
	var echina;
	var rx,ry;
	var x,y;

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
		bombEchinacea();
		pointEchinacea();
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
				//alert("Oh,Oh, You lose!");
				correct = 1;
				timer.stop();
			}

			if(correct==0)
			{
				setRecent(); // set correct position
				presskey(); // keypressed and change direction
			}
		});
		timer.set({ time:speed, autostart:true });
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

		if(snakespath[0][0]==point[0] && snakespath[0][1]==point[1])
		{
			Box[ snakespath[0][0] ][ snakespath[0][1] ].empty();
			bombEchinacea();
			pointEchinacea();
		}
			
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

	function bombEchinacea()
	{
		var correct = 1;
		rx = coordRandom(rx);
		ry = coordRandom(ry);
		
		echina = Math.random()*100;

		if(echina<30) // red
		{
			for(var i=0; i<snakespathnum; i++)
			{
				if( rx==snakespath[i][0] && ry==snakespath[i][1] )
				{
					bombEchinacea();
					correct=0;
				}
			}
			if(correct==1)
			{
				echinacea[0] = $('<div id="red"><img src="..\\images\\gameSnake\\red.jpg" "></div>');
				echinacea[0].appendTo(Box[rx][ry]);
				bombcount++;
			}
		}
	}

	function pointEchinacea()
	{
		var correct = 1;
		x = coordRandom(x);
		y = coordRandom(y);

		for(var i=0; i<snakespathnum; i++)
		{
			if( (x==snakespath[i][0]&&y==snakespath[i][1]) || (x==rx&&y==ry) )
			{
				pointEchinacea();
				correct=0;
			}
		}

		echina = Math.random()*100;
		if(correct==1)
		{	// 0.60, 0.20, 0.12, 0.05, 0.02, 0.01
			if(0<=echina<60) // yellow
			{
				echinacea[1] = $('<div id="yellow"><img src="..\\images\\gameSnake\\yellow.jpg" "></div>');
				echinacea[1].appendTo(Box[x][y]);
			}
			else if(60<=echina<80) // green
			{
				echinacea[2] = $('<div id="green"><img src="..\\images\\gameSnake\\green.jpg" "></div>');
				echinacea[2].appendTo(Box[x][y]);
			}
			else if(80<=echina<92) // brown
			{
				echinacea[3] = $('<div id="brown"><img src="..\\images\\gameSnake\\brown.jpg" "></div>');
				echinacea[3].appendTo(Box[x][y]);
			}
			else if(92<=echina<97) // purple
			{
				echinacea[4] = $('<div id="purple"><img src="..\\images\\gameSnake\\purple.jpg" "></div>');
				echinacea[4].appendTo(Box[x][y]);
			}
			else if(97<=echina<99) // blue
			{
				echinacea[5] = $('<div id="blue"><img src="..\\images\\gameSnake\\blue.jpg" "></div>');
				echinacea[5].appendTo(Box[x][y]);
			}
			else // muliticolor
			{
				echinacea[6] = $('<div id="muliticolor"><img src="..\\images\\gameSnake\\muliticolor.jpg" "></div>');
				echinacea[6].appendTo(Box[x][y]);
			}
			point[0] = x;
			point[1] = y;
		}
	}


});