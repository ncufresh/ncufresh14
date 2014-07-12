@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/index.css') }}
@stop

@section('content')
<div id="contentContainer">
	<div id="contentLeft">
		<div id="calender">
			<div id="calenderTop">行事曆
			</div>
			<div id="calenderContent">
			</div>
			<div id="calenderBottom">
			</div>
		</div>
		<div id="links">常用連結
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
			<div id="boardTop">公告
			</div>
			<div id="boardMid1">
			</div>
			<div id="boardMid2">
			</div>
			<div id="boardMid3">
			</div>
			<div id="boardBottom">
			</div>
			<div id="boardContent">我是內容
			</div>
		</div>
		<div id="forum">
			<div id="forumTop">論壇高人氣文章
			</div>
			<div id="forumContent">
			</div>
			<div id="forumBottom">
			</div>
		</div>
		<div id="vedio">
			<div id="vedioTop">影片連結
			</div>
			<div id="vedioContent">
			</div>
			<div id="vedioBottom">
			</div>
		</div>
	</div>
</div>

@stop