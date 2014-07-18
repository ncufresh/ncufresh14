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
				<div id="calender-week-day">{{ $now->dayOfWeek }}</div>
				<div id="calender-month-day">{{ $now->day }}</div>
				<div id="calender-action">
					<ol>
						@foreach($calenders as $calender)
						<li class="calender-row" data-id="{{ $calender->id }}">{{ $calender->title }}</li>
						@endforeach
					</ol>
				</div>
			</div>
			<div id="calenderBottom">
			</div>
		</div>
		<div id="links" class="textStyle">
			<div id="linkTop">常用連結</div>
			<div id="linkContent">
				<ul id="link-ul">
				@foreach($links as $link)
					<li>
						<a href="{{ $link->url }}">{{ $link->display_name }}</a>
					</li>
				@endforeach
				</ul>
			</div>
			<div id="linkBottom">
			</div>
		</div>
	</div>
	<div id="contentRight">
		<div id="board">
			<div id="boardTop" class="textStyle">公告
			</div>
			<div id="boardMid">
			</div>
			<div id="boardBottom">
			</div>
			<div id="boardContent">
				<div class="announcement-head row">
					<div class="col-sm-1"></div>
					<div class="col-sm-6">標題</div>
					<div class="col-sm-2">人氣</div>
					<div class="col-sm-3">發佈日期</div>
				</div>
				@foreach($announcements as $announcement)
				<div class="announcement-row row" data-announcement-id="{{ $announcement->id }}">
					@if($announcement->pinned == true)
					<div class="col-sm-1"><img src="{{ asset('images/index/top.png') }}" style="width: 100%"></div>
					@else
					<div class="col-sm-1"></div>
					@endif
					<div class="col-sm-6">{{ $announcement->title }}</div>
					<div class="col-sm-2">{{ $announcement->viewer }}</div>
					<div class="col-sm-3">{{ $announcement->created_at->format('Y/m/d h:i'); }}</div>
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
				<a href='http://localhost/ncufresh14/public/video'><img src="images\youtube縮圖\deargod.jpg " id="videoHref"></a>
			</div>
			<div id="vedioBottom">
			</div>
		</div>
	</div>
</div>

@stop