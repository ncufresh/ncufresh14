@extends('layouts.layout')

@section('content')
	<p>標題：{{ $calender->title }}</p>
	<p>內容：{{ $calender->content }}</p>
	<p>開始時間：{{ $calender->start_at }}</p>
	<p>結束時間：{{ $calender->start_at }}</p>


	@if($admin == true)
		<a href="{{ route('admin.calender.edit', array('id' => $calender->id)) }}">修改行事曆</a>
	@endif

@stop