$(document).ready(function(){
	
	var coordx, coordy;
	var blocknum=30;
	var Box = new Array(blocknum);
	var snakes = new Array(30);
		snakes[0] = $('#snakehead');
		snakes[1] = $('<div id="snakebody"><img src="..\\images\\body.jpg" width="27px" height="23px"></div>');
		snakes[2] = $('<div id="lightblue"></div>');
	var length = 3;
	
	iniblock();

	function iniblock()
	{
		for(var i=0; i<Box.length; i++)
		{
			Box[i] = new Array(blocknum);
		}
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
		coordx=random(coordx);
		coordy=random(coordy);
		
		snakes[0].appendTo(Box[coordx][coordy]);
		for(var i=1; i<length; i++)
		{
			snakes[1] = $('<div id="snakebody"><img src="..\\images\\body.jpg" width="27px" height="23px"></div>');
			snakes[1].appendTo(Box[coordx][coordy+i]);
		}

		step();
	}

	function random(coord)
	{
		coord = Math.random()*30;
		coord = coord - coord%1;
		return coord;
	}

	function step()
	{
		$(document).keydown(function(event)
		{ 
			if(event.keyCode == 37) //左
			{
				coordy--;
				snakes[0] = $('#snakehead');
				snakes[0].appendTo(Box[coordx][coordy]);
				for(var i=1; i<length; i++)
				{
					if(i==length-1)
					{
						nakes[2].appendTo(Box[coordx][coordy+i]);
					}	
					else
					{
						nakes[1].appendTo(Box[coordx][coordy+i]);
					}
				}
			}
			else if (event.keyCode == 38) //上
			{
				coordx--;
			} 
			else if (event.keyCode == 39) //右
			{
				coordy++;
			} 
			else if (event.keyCode == 40) //下
			{
				coordx++;
			}
			$('#snake').appendTo(Box[coordx][coordy]);
		});
	}

	function left()
	{
		Box[coordx][coordy]
	}
	function up()
	{

	}
	function right()
	{

	}
	function down()
	{

	}

	var timer = $.timer(function(){
		Box[coordx][coordy]
	});
	timer.set({ time : 5000, autostart : true });


	

});