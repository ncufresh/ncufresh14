@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/schoolguide.css') }}
	{{HTML::script('js/schoolguide.js')}}
	{{ HTML::script('js/crash.js') }}
@stop

@section('content')
<canvas id="canvas" width="1px" height="1px">
</canvas>
<div class="arrow" id="pointer1">↓ here start</div>
<button id="clear">clear all</button>

<div id="egg">
	<div id="close" title="click to close">X</div>
		<div id="part1">
			<!-- {{Form::open(array('route'=>'About_us.delete','method'=>'post'))}} -->
			<h1 id="title1">最佳夫妻同心協力組合</h1>
			<span id="pineapple"></span>
			<span id="vicky"></span>
			<!-- {{Form::hidden('id','1')}}
			<img class="good" src="{{asset('images/SchoolGuide/good.png')}}">
			<h1>支持{{$users->count}}</h1>
			{{Form::close()}} -->
		</div>
		<div id="part2">

			<div id="vs"></div>
			<h1 id="title2">最佳永久性福組合</h1>
			<span id="wan"></span>
			<span id="hand"></span>
			<!-- {{Form::hidden('id','2')}}
			<img class="good" src="{{asset('images/SchoolGuide/good.png')}}"> -->
			<h1>支持</h1>
		</div>
</div>
<div id="bigcontent">
	<div id = "object">
			

		<div id="option">
			<select style="width:180px; height:30px;" id="select">
				<option value="1" data-id="department">系館</option>
				<option value="2" data-id="administration">行政</option>
				<option value="3" data-id="scence">中大十景</option>
				<option value="4" data-id="exercise">運動</option>
				<option value="5" data-id="food">飲食</option>
				<option value="6" data-id="dorm">住宿</option>
			</select>
		</div>
	</div>
			<ol id="leftlist" style="font-size:20;">
					@foreach($Schoolguides as $Schoolguide)
					<li class="left_item" data-place_id="{{ $Schoolguide->id }}">
						<span class="name">{{ $Schoolguide->name }}</span>
					</li>
					@endforeach
					<div class='item2' backgroundPosition='-1536px -352px'>
			</ol>
			<div id="fixMap">
				<div id = "fixmapLine"></div>
				<div id = "map"></div>
				<div id = "Buttom"></div>
				<div class="pointer">
					<div data-id = "62" id="Zhidao" title="志道樓" class="item school" ></div>
					<div data-id = "28" id="G14" title="女十四" class="item dorm" ></div>
					<div data-id = "28" id="tennis" title="網球場" class="item exercise" ></div>
					<div data-id = "59" id="G5" title="女五" class="item dorm" ></div>
					<div data-id = "11" id="G14-ground" title="女十四廣場" class="item scence" ></div>	
					<div data-id = "55" id="B11" title="男十一" class="item dorm"></div>
					<div data-id = "53" id="B7" title="男七" class="item dorm"></div>
					<div data-id = "41" id="B7-food" title="男七舍餐廳" class="item eat"></div>
					<div data-id = "52" id="B6" title="男六" class="item dorm"></div>
					<div data-id = "57" id="B13" title="男十三" class="item dorm"></div>
					<div data-id = "64" id="art" title="游藝館" class="item school"></div>
					<div data-id = "65" id="building" title="據德樓" class="item school"></div>
					<div data-id = "66" id="schoolh" title="校史館" class="item school"></div>
					<div data-id = "2" id="door" title="中大路上" class="item scence"></div>
					<div data-id = "30" id="monument" title="筆墨紙硯" class="item scence"></div>
					<div data-id = "51" id="B5" title="男五" class="item dorm"></div>
					<div data-id = "48" id="International" title="國際宿舍" class="item dorm"></div>
					<div data-id = "50" id="B3" title="男三" class="item dorm"></div>
					<div data-id = "22" id="science-5" title="科五館" class="item departments"></div>
					<div data-id = "70" id="administration" title="行政大樓" class="item school"></div>
					<div data-id = "69" id="library" title="總圖書館" class="item school"></div>
					<div data-id = "5" id="tree" title="國泰樹" class="item scence"></div>
					<div data-id = "71" id="oldlibrary" title="中正圖書館" class="item school"></div>
					<div data-id = "6" id="tai" title="太極銅雕" class="item scence"></div>
					<div data-id = "63" id="blackbox" title="黑盒子" class="item school"></div>
					<div data-id = "12" id="literary" title="文院" class="item departments"></div>
					<div data-id = "13" id="engineer-1" title="工程一館" class="item departments"></div>
					<div data-id = "14" id="engineer-2" title="工程二館" class="item departments"></div>
					<div data-id = "15" id="engineer-3" title="工程三館" class="item departments"></div>
					<div data-id = "16" id="engineer-4" title="工程四館" class="item departments"></div>
					<div data-id = "17" id="engineer-5" title="工程五館" class="item departments"></div>
					<div data-id = "58" id="G-1-4" title="女一~四" class="item dorm"></div>
					<div data-id = "10" id="park" title="松苑廣場" class="item scence"></div>
					<div data-id = "43" id="park-food" title="松苑餐廳" class="item eat"></div>
					<div data-id = "31" id="gym" title="依仁堂" class="item exercise"></div>
					<div data-id = "38" id="basketball" title="籃球場" class="item exercise"></div>
					<div data-id = "35" id="playground" title="操場" class="item exercise"></div>
					<div data-id = "36" id="rock" title="攀岩場" class="item exercise"></div>
					<div data-id = "39	" id="swimpool" title="游泳池" class="item exercise"></div>
					<div data-id = "32" id="skate" title="溜冰場" class="item exercise"></div>
					<div data-id = "37" id="valley" title="排球場" class="item exercise"></div>
					<div data-id = "33" id="badminton" title="羽球場" class="item exercise"></div>
					<div data-id = "8" id="lake" title="中大湖" class="item scence"></div>
					<div data-id = "44" id="wood" title="小木屋" class="item eat"></div>
					<div data-id = "21" id="science-4" title="科學四館" class="item departments"></div>
					<div data-id = "20" id="science-3" title="科學三館" class="item departments"></div>
					<div data-id = "19" id="science-2" title="科學二館" class="item departments"></div>
					<div data-id = "18" id="science-1" title="科學一館" class="item departments"></div>
					<div data-id = "67" id="mbuilding" title="綜教館" class="item school"></div>
					<div data-id = "27" id="math" title="鴻經管" class="item departments"></div>
					<div data-id = "23" id="management-1" title="志希館" class="item departments"></div>
					<div data-id = "26" id="management-2" title="館二" class="item departments"></div>
					<div data-id = "68" id="clibrary" title="國鼎圖書館" class="item school"></div>
					<div data-id = "49" id="Graduate" title="男研舍" class="item dorm"></div>
					<div data-id = "45" id="Graduate-food" title="校園caf'e" class="item eat"></div>
					<div data-id = "24" id="Hakkas" title="客家系院" class="item departments"></div>
					<div data-id = "25" id="electric" title="國鼎光電大樓" class="item departments"></div>
					<div data-id = "40" id="outerspace" title="太空遙測研究中心" class="item school"></div>
					<div data-id = "9" id="flower" title="百花川" class="item scence"></div>
					<!-- <div data-id = "3" id="ncu" title="中大會館" class="item school"></div> -->
					<div data-id = "54" id="B9" title="男九" class="item dorm"></div>
					<div data-id = "42" id="B9-food" title="男九舍餐廳" class="item eat"></div>
					<div data-id = "56" id="B12" title="男十二" class="item dorm"></div>
					<div data-id = "7" id="pool" title="烏龜池" class="item scence"></div>

				</div>


			</div>
			<div style="height: 85px;"></div>
</div>
			
@stop