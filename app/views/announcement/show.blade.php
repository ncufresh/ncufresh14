@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/announcement.css') }}
@stop

@section('content')
	<div id="announcement-show">
		<div class="row">
			<div class="col-sm-1">標題：</div>
			<div class="col-sm-11">{{ $announcement->title }}</div>
		</div>
		<div class="row">
			<div class="col-sm-1">人氣：</div>
			<div class="col-sm-11">{{ $announcement->viewer }}</div>
		</div>
		<div class="row">
			<div class="col-sm-1">內容：</div>
			<div class="col-sm-11">{{ $announcement->content }}</div>
			</div>
		<div class="row">
			<div class="col-sm-1">發佈日期</div>
			<div class="col-sm-11">{{ $announcement->created_at }}</div>
		</div>
		@if($announcement->created_at != $announcement->updated_at)
		<div class="row">
			<div class="col-sm-1">最後修改</div>
			<div class="col-sm-11">{{ $announcement->updated_at }}</div>
		</div>
		@endif
	</div>

	@if($admin == true)
		<a href="{{ route('admin.announcement.edit', array('id' => $announcement->id)) }}">修改公告</a>
	@endif

@stop