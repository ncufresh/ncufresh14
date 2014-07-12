@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/index.css') }}
	{{ HTML::script('js/index.js') }}
@stop

@section('content')
<div id="contentContainer" class="testR">
	<div id="contentLeft" class="testB">
		<div id="calender" class="testG">calender
		</div>
		<div id="links" class="testY">links
			@foreach($links as $link)
				<div>
					<a href="{{ $link->url }}">{{ $link->display_name }}</a>
				</div>
			@endforeach
		</div>
	</div>
	<div id="contentRight" class="testB">
		<div id="announcements" class="testG">
			<div class="announcement-head">
				<div class="col-sm-1"></div>
				<div class="col-sm-6">標題</div>
				<div class="col-sm-2">人氣</div>
				<div class="col-sm-3">發佈日期</div>
			</div>
			@foreach($announcements as $announcement)
				<div class="announcement-row" data-announcement-id="{{ $announcement->id }}">
					@if($announcement->pinned == true)
						<div class="col-sm-1">智鼎XD</div>
					@else
						<div class="col-sm-1"></div>
					@endif
					<div class="col-sm-6">{{ $announcement->title }}</div>
					<div class="col-sm-2">{{ $announcement->viewer }}</div>
					<div class="col-sm-3">{{ $announcement->created_at->format('Y/m/d - h:ia'); }}</div>
				</div>
			@endforeach
			<a href="{{ route('announcement.index') }}">閱讀更多</a>
		</div>
		<div id="forum" class="testY">forum
		</div>
		<div id="vedio" class="testR">vedio
		</div>
	</div>
</div>

@stop