$.konami({
	code:                   [73, 78, 69, 69, 68, 70, 79, 79, 68],
	interval:		1000,
    complete:		function(){
        $('body').append('<div id="konami" style="width:100%; height:200%; position:absolute; z-index:999; top:0px;"></div>')
    	$('#konami').append('<span id="game"></span>')
		$('#konami').css("cursor", "url(images/nculife/cursor.cur),auto");
		var totalstars = 50, snaketext = "";
        var snakelength = 2;
        var msx = 300, msy = 300;
        var IE = document.all?true:false;
        var gametarget, current = 0;
        var timer = null;
        var gamebuf = new Array(1000);
        function getMouseXY(e) {
            if (IE) {
                msx = event.clientX;
                msy = event.clientY;
            } else {
                msx = e.clientX;
                msy = e.clientY;
            }
            // catch possible negative values
            if (msx < 0) msx = 0;
            if (msy < 0) msy = 0;
            return true;
        }
        function moveOne(current, target, destx, desty){
            var v = Math.sqrt((current.x-destx)*(current.x-destx)+(current.y-desty)*(current.y-desty));
            if(v < 5){
                target.x = destx;
                target.y = desty;
            }else{
                target.x = current.x + 5*(destx-current.x)/v;
                target.y = current.y + 5*(desty-current.y)/v;
            }
            target.ref.style.left = Math.round(target.x)+"px";
            target.ref.style.top = Math.round(target.y)+"px";
        }
        function moveAll(){
            if(current <= 0)
                moveOne(gametarget[0], gametarget[current = totalstars - 1], msx, msy);
            else{
                moveOne(gametarget[current], gametarget[current-1], msx, msy);
                current--;
            }
        }
        function createObj(parent){
            var span=document.createElement("span");
            var text=document.createTextNode(snaketext);
            span.style.width="25px";
            span.style.height="25px";
            span.style.position="fixed";
            span.style.left="100px";
            span.style.top="100px";
            span.style.zIndex="16";
            span.style.background="url(images/nculife/snake.png)";
            span.appendChild(text);
            parent.appendChild(span);
            return {x:100, y:100, ref:span};
        }
        function createSnake(length){
            if(isNaN(length) || length <= 1 || length > 10000)
                return;
            var parent = document.getElementById("game");
            parent.innerHTML = "";
            for( var i = 0; i < length; i++)
                gamebuf[i] = createObj(parent);
            current = 0;
            totalstars = length;
            gametarget = gamebuf;
        }
        function restartAnimate(delay){
            if(isNaN(delay) || delay < 0 || delay > 10000)
                return;
            if(timer!=null)
                clearInterval(timer);
            timer = setInterval(moveAll, delay);
        }
        function addlength(snakelength){
            $.konami({
                code:                   [70, 79, 79, 68],
                interval:       1000,
                complete:       function(){
                    function createObj(parent){
                        var span=document.createElement("span");
                        var text=document.createTextNode(snaketext);
                        span.style.width="25px";
                        span.style.height="25px";
                        span.style.position="fixed";
                        span.style.left="100px";
                        span.style.top="100px";
                        span.style.zIndex="16";
                        span.style.background="url(images/nculife/snake.png)";
                        span.appendChild(text);
                        parent.appendChild(span);
                        return {x:100, y:100, ref:span};
                    }
                    function createSnake(length){
                        if(isNaN(length) || length <= 1 || length > 10000)
                            return;
                        var parent = document.getElementById("game");
                        parent.innerHTML = "";
                        for( var i = 0; i < length; i++)
                            gamebuf[i] = createObj(parent);
                        current = 0;
                        totalstars = length;
                        gametarget = gamebuf;
                    }
                    snakelength++;
                    createSnake(snakelength);
                }
            });
        }
        function removejs(){
            $.konami({
                code:                   [78, 79, 70, 79, 79, 68],
                interval:       1000,
                complete:       function(){
                    $('#konami').remove();
                }
            });
        }
        if(document.addEventListener)
            document.addEventListener("mousemove", getMouseXY);
        else
            document.attachEvent("onmousemove", getMouseXY);
        createSnake(snakelength);
        restartAnimate(20);
        addlength(snakelength);
        removejs();
	}
});