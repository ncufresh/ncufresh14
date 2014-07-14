@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/index.css') }}
	{{ HTML::script('js/index.js') }}
@stop

@section('content')
<div id="contentContainer">
	<div id="contentLeft">
		<div id="calender">
			<div id="calenderTop" class="textStyle">行事曆
			</div>
			<div id="calenderContent">
			</div>
			<div id="calenderBottom">
			</div>
		</div>
		<div id="links" class="textStyle">常用連結
			<div id="linkContent">
				@foreach($links as $link)
					<div>
						<a href="{{ $link->url }}">{{ $link->display_name }}</a>
					</div>
				@endforeach
			</div>
			<div id="linkBottom">
			</div>
		</div>
	</div>
	<div id="contentRight">
		<div id="board">
			<div id="boardTop" class="textStyle">公告
			</div>
			<div id="boardMid1">
			</div>
			<div id="boardMid2">
			</div>
			<div id="boardMid3">
			</div>
			<div id="boardBottom">
			</div>
			<div id="boardContent">
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
		</div>
		<div id="forum">
			<div id="forumTop" class="textStyle">論壇高人氣文章
			</div>
			<div id="forumContent">
			</div>
			<div id="forumBottom">
			</div>
		</div>
		<div id="vedio">
			<div id="vedioTop" class="textStyle">影片連結
			</div>
			<div id="vedioContent">
			</div>
			<div id="vedioBottom">
			</div>
		</div>
	</div>
</div>

@stop