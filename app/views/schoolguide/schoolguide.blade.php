@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/schoolguide.css') }}
	{{HTML::script('js/schoolguide.js')}}
@stop

@section('content')

<div id="bigcontent">
	<img id = "object" src="http://localhost/ncufresh14/public/images/SchoolGuide/object.png">
	
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
					<img class = "line" src="http://localhost/ncufresh14/public/images/SchoolGuide/line.png">
					<img class = "board" src="http://localhost/ncufresh14/public/images/SchoolGuide/board.png">
					<li class="left_item" data-place_id="{{ $Schoolguide->id }}">
						{{ $Schoolguide->name }}
					</li>
					@endforeach
			</ol>

					<img id = "map" src="http://localhost/ncufresh14/public/images/SchoolGuide/map.png">
					<img id = "Buttom" src="http://localhost/ncufresh14/public/images/SchoolGuide/Buttom.png">
					<img data-id = "1" id="Zhidao" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/Zhidao.png">
					<img data-id = "2" id="G14" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/G14.png">
					<img data-id = "3" id="G14-ground" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/G14-ground.png">
					<img data-id = "3" id="B11" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/B11.png">
					<img data-id = "3" id="B7" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/B7.png">
					<img data-id = "3" id="B6" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/B6.png">
					<img data-id = "3" id="B13" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/B13.png">
					<img data-id = "3" id="art" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/art.png">
					<img data-id = "3" id="building" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/building.png">
					<img data-id = "3" id="schoolh" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/schoolh.png">
					<img data-id = "3" id="door" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/door.png">
					<img data-id = "3" id="monument" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/monument.png">
					<img data-id = "3" id="B5" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/B5.png">
					<img data-id = "3" id="International" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/International.png">
					<img data-id = "3" id="B3" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/B3.png">
					<img data-id = "3" id="science" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/science.png">
					<img data-id = "3" id="administration" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/administration.png">
					<img data-id = "3" id="library" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/library.png">
					<img data-id = "3" id="tree" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/tree.png">
					<img data-id = "3" id="oldlibrary" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/oldlibrary.png">
					<img data-id = "3" id="tai" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/tai.png">
					<img data-id = "3" id="blackbox" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/blackbox.png">
					<img data-id = "3" id="literary" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/literary.png">
					<img data-id = "3" id="engineer-1" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/engineer-1.png">
					<img data-id = "3" id="engineer-2" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/engineer-2.png">
					<img data-id = "3" id="engineer-3" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/engineer-3.png">
					<img data-id = "3" id="engineer-4" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/engineer-4.png">
					<img data-id = "3" id="engineer-5" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/engineer-5.png">
					<img data-id = "3" id="G-1-4" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/G-1-4.png">
					<img data-id = "3" id="park" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/park.png">
					<img data-id = "3" id="gym" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/gym.png">
					<img data-id = "3" id="G-1-4" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/G-1-4.png">
					<img data-id = "3" id="G-1-4" class="Img" src="http://localhost/ncufresh14/public/images/SchoolGuide/G-1-4.png">

		
			</div>
			
			
					
	
	 
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

			




	

@stop