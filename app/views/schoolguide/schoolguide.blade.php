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
				<option value="1">系館</option>
				<option value="2">行政</option>
				<option value="3">中大十景</option>
				<option value="4">運動</option>
				<option value="5">飲食</option>
				<option value="6">住宿</option>
			</select>
		</div>
			
			<ol id="leftlist" style="font-size:20;">
					@foreach($Schoolguides as $Schoolguide)
					<img class = "line" src="{{ asset('images/SchoolGuide/line.png') }}">
					<img class = "board" src="{{ asset('images/SchoolGuide/board.png') }}">
					<li class="left_item" data-place_id="{{ $Schoolguide->id }}">
						{{ $Schoolguide->name }}
					</li>
					@endforeach
			</ol>
					<img id = "map" src="{{ asset('images/SchoolGuide/map.png') }}">
					<img id = "Buttom" src="{{ asset('images/SchoolGuide/Buttom.png') }}">
					<div class="pointer">
						<img data-id = "13" id="Zhidao" class="school" src="{{ asset('images/SchoolGuide/Zhidao.png') }}">
						<img data-id = "12" id="G14" class="dorm" src="{{ asset('images/SchoolGuide/G14.png') }}">
						<img data-id = "11" id="G14-ground" class="scence" src="{{ asset('images/SchoolGuide/G14-ground.png') }}">
						<img data-id = "3" id="B11" class="dorm" src="{{ asset('images/SchoolGuide/B11.png') }}">
						<img data-id = "3" id="B7" class="dorm" src="{{ asset('images/SchoolGuide/B7.png') }}">
						<img data-id = "3" id="B6" class="dorm" src="{{ asset('images/SchoolGuide/B6.png') }}">
						<img data-id = "3" id="B13" class="dorm" src="{{ asset('images/SchoolGuide/B13.png') }}">
						<img data-id = "3" id="art" class="school" src="{{ asset('images/SchoolGuide/art.png') }}">
						<img data-id = "3" id="building" class="school" src="{{ asset('images/SchoolGuide/building.png') }}">
						<img data-id = "3" id="schoolh" class="school" src="{{ asset('images/SchoolGuide/schoolh.png') }}">
						<img data-id = "3" id="door" class="scence" src="{{ asset('images/SchoolGuide/door.png') }}">
						<img data-id = "3" id="monument" class="scence" src="{{ asset('images/SchoolGuide/monument.png') }}">
						<img data-id = "3" id="B5" class="dorm" src="{{ asset('images/SchoolGuide/B5.png') }}">
						<img data-id = "3" id="International" class="dorm" src="{{ asset('images/SchoolGuide/International.png') }}">
						<img data-id = "3" id="B3" class="dorm" src="{{ asset('images/SchoolGuide/B3.png') }}">
						<img data-id = "3" id="science-5" class="departments" src="{{ asset('images/SchoolGuide/science-5.png') }}">
						<img data-id = "3" id="administration" class="school" src="{{ asset('images/SchoolGuide/administration.png') }}">
						<img data-id = "3" id="library" class="school" src="{{ asset('images/SchoolGuide/library.png') }}">
						<img data-id = "3" id="tree" class="scence" src="{{ asset('images/SchoolGuide/tree.png') }}">
						<img data-id = "3" id="oldlibrary" class="school" src="{{ asset('images/SchoolGuide/oldlibrary.png') }}">
						<img data-id = "3" id="tai" class="scence" src="{{ asset('images/SchoolGuide/tai.png') }}">
						<img data-id = "3" id="blackbox" class="school" src="{{ asset('images/SchoolGuide/blackbox.png') }}">
						<img data-id = "3" id="literary" class="departments" src="{{ asset('images/SchoolGuide/literary.png') }}">
						<img data-id = "3" id="engineer-1" class="departments" src="{{ asset('images/SchoolGuide/engineer-1.png') }}">
						<img data-id = "3" id="engineer-2" class="departments" src="{{ asset('images/SchoolGuide/engineer-2.png') }}">
						<img data-id = "3" id="engineer-3" class="departments" src="{{ asset('images/SchoolGuide/engineer-3.png') }}">
						<img data-id = "3" id="engineer-4" class="departments" src="{{ asset('images/SchoolGuide/engineer-4.png') }}">
						<img data-id = "3" id="engineer-5" class="departments" src="{{ asset('images/SchoolGuide/engineer-5.png') }}">
						<img data-id = "3" id="G-1-4" class="dorm" src="{{ asset('images/SchoolGuide/G-1-4.png') }}">
						<img data-id = "3" id="park" class="scence" src="{{ asset('images/SchoolGuide/park.png') }}">
						<img data-id = "3" id="gym" class="exercise" src="{{ asset('images/SchoolGuide/gym.png') }}">
						<img data-id = "3" id="basketball" class="exercise" src="{{ asset('images/SchoolGuide/basketball.png') }}">
						<img data-id = "3" id="playground" class="exercise" src="{{ asset('images/SchoolGuide/playground.png') }}">
						<img data-id = "3" id="rock" class="exercise" src="{{ asset('images/SchoolGuide/rock.png') }}">
						<img data-id = "3" id="swimpool" class="exercise" src="{{ asset('images/SchoolGuide/swimpool.png') }}">
						<img data-id = "3" id="skate" class="exercise" src="{{ asset('images/SchoolGuide/skate.png') }}">
						<img data-id = "3" id="valley" class="exercise" src="{{ asset('images/SchoolGuide/valley.png') }}">
						<img data-id = "3" id="badminton" class="exercise" src="{{ asset('images/SchoolGuide/badminton.png') }}">
						<img data-id = "3" id="lake" class="scence" src="{{ asset('images/SchoolGuide/lake.png') }}">
						<img data-id = "3" id="wood" class="eat" src="{{ asset('images/SchoolGuide/wood.png') }}">
						<img data-id = "3" id="science-4" class="departments" src="{{ asset('images/SchoolGuide/science-4.png') }}">
						<img data-id = "3" id="science-3" class="departments" src="{{ asset('images/SchoolGuide/science-3.png') }}">
						<img data-id = "3" id="science-2" class="departments" src="{{ asset('images/SchoolGuide/science-2.png') }}">
						<img data-id = "3" id="science-1" class="departments" src="{{ asset('images/SchoolGuide/science-1.png') }}">
						<img data-id = "3" id="mbuilding" class="school" src="{{ asset('images/SchoolGuide/mbuilding.png') }}">
						<img data-id = "3" id="math" class="departments" src="{{ asset('images/SchoolGuide/math.png') }}">
						<img data-id = "3" id="management-1" class="departments" src="{{ asset('images/SchoolGuide/management-1.png') }}">
						<img data-id = "3" id="management-2" class="departments" src="{{ asset('images/SchoolGuide/management-2.png') }}">
						<img data-id = "3" id="clibrary" class="school" src="{{ asset('images/SchoolGuide/clibrary.png') }}">
						<img data-id = "3" id="Graduate" class="dorm" src="{{ asset('images/SchoolGuide/Graduate.png') }}">
						<img data-id = "3" id="Hakkas" class="departments" src="{{ asset('images/SchoolGuide/Hakkas.png') }}">
						<img data-id = "3" id="electric" class="departments" src="{{ asset('images/SchoolGuide/electric.png') }}">
						<img data-id = "3" id="outerspace" class="school" src="{{ asset('images/SchoolGuide/outerspace.png') }}">
						<img data-id = "3" id="flower" class="scence" src="{{ asset('images/SchoolGuide/flower.png') }}">
						<img data-id = "3" id="ncu" class="school" src="{{ asset('images/SchoolGuide/ncu.png') }}">
						<img data-id = "3" id="B9" class="dorm" src="{{ asset('images/SchoolGuide/B9.png') }}">
						<img data-id = "3" id="B12" class="dorm" src="{{ asset('images/SchoolGuide/B12.png') }}">
				</div>
			</div>
			
			
					
	
	 <!-- 
		@if(isset($old) && $old == true)
			<div class="photo">
				<div class="photocontainer">
					
					<div class="modal2">
					<div class="close2" aria-label="離開"></div>
					
				  		<div class="content">
							{{ $users->introduction }}
				  		</div>
				  	</div>
				  </div>
			 </div>
		 @else
			 <div class="photo">
				<div class="photocontainer">
					
					<div class="modal2">
					<div class="close2" aria-label="離開"></div>
					
				  		<div class="content">
					
				  		</div>
				  	</div>
				  </div>
			 </div>
		 @endif

			 -->




	

@stop