@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/index.min.css') }}
	{{ HTML::script('js/index.min.js') }}
@stop

@section('content')
<div id="contentContainer">
	<div id="contentLeft">
		<div id="calender">
			<div id="calenderTop" class="textStyle">
				<div id="calenderTopWord">行事曆</div>
				<div id="calender-top-content">
					<div id="calender-week-day" class="calender-num"><img src="{{ asset('images/index/calender_week/' . $now->dayOfWeek . '.png') }}"></div>
					<div id="calender-month" class="calender-num"><img src="{{ asset('images/index/calender_month/' . $now->month . '.png') }}"></div>
					<div id="calender-month-day" class="calender-num">
						@if($now->day >= 10)
							<img src="{{ asset('images/index/calender_num/' . $now->day/10%10 . '.png') }}">
						@endif
						<img src="{{ asset('images/index/calender_num/' . $now->day%10 . '.png') }}">
					</div>
				</div>
			</div>
			<div id="calenderContent">
				<div id="calender-action">

						@if($calenders->count() == 0)
							<span id="calender-no">今日沒事</span>
						@else
					<ol>
							@foreach($calenders as $calender)
							<li class="calender-row" data-id="{{ $calender->id }}">{{{ $calender->title }}}</li>
							@endforeach
					</ol>
						@endif

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
						<a href="{{ $link->url }}" target="_blank">{{{ $link->display_name }}}</a>
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
					<div class="col-sm-6 announcement-title">{{{ $announcement->title }}}</div>
					<div class="col-sm-2">{{ $announcement->viewer }}</div>
					<div class="col-sm-3 announcement-time">{{ $announcement->created_at->format('Y/m/d h:i'); }}</div>
				</div>
				@endforeach
				<a href="{{ route('announcement.index') }}">閱讀更多</a>
			</div>
		</div>
		<div id="forum">
			<div id="forumTop" class="textStyle">論壇高人氣文章
			</div>
			<div id="forumContent">
				<div class="forum-head row">
					<div class="col-sm-6">標題</div>
					<div class="col-sm-2">人氣</div>
					<div class="col-sm-4">發佈日期</div>
				</div>
				@foreach($articles as $article)
				<a href="{{ route('perArticle', array('id' => $article->id)) }}">
					<div class="forum-row row">
						<div class="col-sm-6 forum-title">{{{ $article->title }}}</div>
						<div class="col-sm-2">{{ $article->comment_number }}</div>
						<div class="col-sm-4">{{ $article->created_at->format('Y/m/d h:i') }}</div>
					</div>
				</a>
				@endforeach
			</div>
			<div id="forumBottom">
			</div>
		</div>
		<div id="vedio">
			<div id="vedioTop" class="textStyle">影片連結
			</div>
			<div id="vedioContent">
				<div id="video-pic"><a href="{{route('video')}}"><img src="http://img.youtube.com/vi/{{ $video->video_address }}/0.jpg"></a></div>
				<div id="video-name"><span class="video-word">影片名稱：</span>{{ $video->video_name }}</div>
				<div id="video-viewer"><span class="video-word">瀏覽人次：</span>{{ $video->video_population }}</div>
				<div id="video-intro"><span class="video-word">內容簡介：</span>{{ $video->video_introduction }}</div>
			</div>
			<div id="vedioBottom">
			</div>
		</div>
	</div>
</div>


@stop