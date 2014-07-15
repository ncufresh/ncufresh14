@extends('layouts.layout')

@section('content')
	<p>標題：{{ $announcement->title }}</p>
	<p>內容：{{ $announcement->content }}</p>
	<p>人數：{{ $announcement->viewer }}</p>
	<p>發佈日期：{{ $announcement->created_at }}</p>
	@if($announcement->created_at != $announcement->updated_at)
		<p>最後修改：{{ $announcement->updated_at }}</p>
	@endif


	@if($admin == true)
		<a href="{{ route('admin.announcement.edit', array('id' => $announcement->id)) }}">修改公告</a>
	@endif

@stop