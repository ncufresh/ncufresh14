@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/schoolguide.css') }}
	{{HTML::script('js/schoolguide.js')}}
@stop

@section('content')

<div id="container" class="container">
				<div id="contentContainer" class="testR">
	<div id="contentLeft" class="testB">
		<div id="option" class="testG">
			</br>

			<select style="width:180px; height:30px;" id="select">
				<option value="1">系館</option>
				<option value="2">行政</option>
				<option value="3">中大十景</option>
				<option value="4">運動</option>
				<option value="5">飲食</option>
				<option value="6">住宿</option>
			</select>

			
			<ol id="leftlist" style="font-size:20;">
				</br>
			@foreach($Schoolguides as $Schoolguide)
			<li class="left_item" data-place_id="{{ $Schoolguide->id }}">
				{{ $Schoolguide->name }}
			</li>
			@endforeach
			</ol>
			</div>
		</div>
			<div id="contentRight" class="testB">
				<div id="map" class="testG">map
					<a href="{{route('SchoolGuide.photo',array('id'=>'1'))}}">123</a>
					<span class="Img" data-id="1">123</span>
			</div>
			</div>
	

			</div>
		
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