@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/schoolguide.css') }}
	{{HTML::script('js/schoolguide.js')}}

@stop

@section('content')

<div id="bigcontent">
	<img id = "object" src="{{ asset('images/SchoolGuide/object.png') }}">
			

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
			
			<ol id="leftlist" style="font-size:20;">
					@foreach($Schoolguides as $Schoolguide)
					<li class="left_item" data-place_id="{{ $Schoolguide->id }}">
						<span class="name">{{ $Schoolguide->name }}</span>
					</li>
					@endforeach
			</ol>

			<div id="fixMap">
				<img id = "fixmapLine" src="{{ asset('images/SchoolGuide/line.png') }}">
				<img id = "map" src="{{ asset('images/SchoolGuide/map.png') }}">
				<img id = "Buttom" src="{{ asset('images/SchoolGuide/Buttom.png') }}">
				<div class="pointer">
					<img data-id = "13" id="Zhidao" class="item school" src="{{ asset('images/SchoolGuide/Zhidao.png') }}">
					<img data-id = "28" id="G14" class="item dorm" src="{{ asset('images/SchoolGuide/G14.png') }}">
					<img data-id = "11" id="G14-ground" class="item scence" src="{{ asset('images/SchoolGuide/G14-ground.png') }}">
					<img data-id = "3" id="B11" class="item dorm" src="{{ asset('images/SchoolGuide/B11.png') }}">
					<img data-id = "3" id="B7" class="item dorm" src="{{ asset('images/SchoolGuide/B7.png') }}">
					<img data-id = "3" id="B6" class="item dorm" src="{{ asset('images/SchoolGuide/B6.png') }}">
					<img data-id = "3" id="B13" class="item dorm" src="{{ asset('images/SchoolGuide/B13.png') }}">
					<img data-id = "3" id="art" class="item school" src="{{ asset('images/SchoolGuide/art.png') }}">
					<img data-id = "3" id="building" class="item school" src="{{ asset('images/SchoolGuide/building.png') }}">
					<img data-id = "3" id="schoolh" class="item school" src="{{ asset('images/SchoolGuide/schoolh.png') }}">
					<img data-id = "2" id="door" class="item scence" src="{{ asset('images/SchoolGuide/door.png') }}">
					<img data-id = "30" id="monument" class="item scence" src="{{ asset('images/SchoolGuide/monument.png') }}">
					<img data-id = "3" id="B5" class="item dorm" src="{{ asset('images/SchoolGuide/B5.png') }}">
					<img data-id = "3" id="International" class="item dorm" src="{{ asset('images/SchoolGuide/International.png') }}">
					<img data-id = "3" id="B3" class="item dorm" src="{{ asset('images/SchoolGuide/B3.png') }}">
					<img data-id = "22" id="science-5" class="item departments" src="{{ asset('images/SchoolGuide/science-5.png') }}">
					<img data-id = "3" id="administration" class="item school" src="{{ asset('images/SchoolGuide/administration.png') }}">
					<img data-id = "3" id="library" class="item school" src="{{ asset('images/SchoolGuide/library.png') }}">
					<img data-id = "3" id="tree" class="item scence" src="{{ asset('images/SchoolGuide/tree.png') }}">
					<img data-id = "3" id="oldlibrary" class="item school" src="{{ asset('images/SchoolGuide/oldlibrary.png') }}">
					<img data-id = "3" id="tai" class="item scence" src="{{ asset('images/SchoolGuide/tai.png') }}">
					<img data-id = "3" id="blackbox" class="item school" src="{{ asset('images/SchoolGuide/blackbox.png') }}">
					<img data-id = "12" id="literary" class="item departments" src="{{ asset('images/SchoolGuide/literary.png') }}">
					<img data-id = "13" id="engineer-1" class="item departments" src="{{ asset('images/SchoolGuide/engineer-1.png') }}">
					<img data-id = "14" id="engineer-2" class="item departments" src="{{ asset('images/SchoolGuide/engineer-2.png') }}">
					<img data-id = "15" id="engineer-3" class="item departments" src="{{ asset('images/SchoolGuide/engineer-3.png') }}">
					<img data-id = "16" id="engineer-4" class="item departments" src="{{ asset('images/SchoolGuide/engineer-4.png') }}">
					<img data-id = "17" id="engineer-5" class="item departments" src="{{ asset('images/SchoolGuide/engineer-5.png') }}">
					<img data-id = "3" id="G-1-4" class="item dorm" src="{{ asset('images/SchoolGuide/G-1-4.png') }}">
					<img data-id = "10" id="park" class="item scence" src="{{ asset('images/SchoolGuide/park.png') }}">
					<img data-id = "31" id="gym" class="item exercise" src="{{ asset('images/SchoolGuide/gym.png') }}">
					<img data-id = "38" id="basketball" class="item exercise" src="{{ asset('images/SchoolGuide/basketball.png') }}">
					<img data-id = "35" id="playground" class="item exercise" src="{{ asset('images/SchoolGuide/playground.png') }}">
					<img data-id = "36" id="rock" class="item exercise" src="{{ asset('images/SchoolGuide/rock.png') }}">
					<img data-id = "39	" id="swimpool" class="item exercise" src="{{ asset('images/SchoolGuide/swimpool.png') }}">
					<img data-id = "32" id="skate" class="item exercise" src="{{ asset('images/SchoolGuide/skate.png') }}">
					<img data-id = "37" id="valley" class="item exercise" src="{{ asset('images/SchoolGuide/valley.png') }}">
					<img data-id = "33" id="badminton" class="item exercise" src="{{ asset('images/SchoolGuide/badminton.png') }}">
					<img data-id = "8" id="lake" class="item scence" src="{{ asset('images/SchoolGuide/lake.png') }}">
					<img data-id = "3" id="wood" class="item eat" src="{{ asset('images/SchoolGuide/wood.png') }}">
					<img data-id = "21" id="science-4" class="item departments" src="{{ asset('images/SchoolGuide/science-4.png') }}">
					<img data-id = "20" id="science-3" class="item departments" src="{{ asset('images/SchoolGuide/science-3.png') }}">
					<img data-id = "19" id="science-2" class="item departments" src="{{ asset('images/SchoolGuide/science-2.png') }}">
					<img data-id = "18" id="science-1" class="item departments" src="{{ asset('images/SchoolGuide/science-1.png') }}">
					<img data-id = "3" id="mbuilding" class="item school" src="{{ asset('images/SchoolGuide/mbuilding.png') }}">
					<img data-id = "27" id="math" class="item departments" src="{{ asset('images/SchoolGuide/math.png') }}">
					<img data-id = "23" id="management-1" class="item departments" src="{{ asset('images/SchoolGuide/management-1.png') }}">
					<img data-id = "26" id="management-2" class="item departments" src="{{ asset('images/SchoolGuide/management-2.png') }}">
					<img data-id = "3" id="clibrary" class="item school" src="{{ asset('images/SchoolGuide/clibrary.png') }}">
					<img data-id = "3" id="Graduate" class="item dorm" src="{{ asset('images/SchoolGuide/Graduate.png') }}">
					<img data-id = "24" id="Hakkas" class="item departments" src="{{ asset('images/SchoolGuide/Hakkas.png') }}">
					<img data-id = "25" id="electric" class="item departments" src="{{ asset('images/SchoolGuide/electric.png') }}">
					<img data-id = "3" id="outerspace" class="item school" src="{{ asset('images/SchoolGuide/outerspace.png') }}">
					<img data-id = "9" id="flower" class="item scence" src="{{ asset('images/SchoolGuide/flower.png') }}">
					<img data-id = "3" id="ncu" class="item school" src="{{ asset('images/SchoolGuide/ncu.png') }}">
					<img data-id = "3" id="B9" class="item dorm" src="{{ asset('images/SchoolGuide/B9.png') }}">
					<img data-id = "3" id="B12" class="item dorm" src="{{ asset('images/SchoolGuide/B12.png') }}">

				</div>

			</div>
</div>
			
@stop
