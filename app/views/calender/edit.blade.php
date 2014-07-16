@extends('layouts.layout')


@section('content')
<?php
	$startAt = new \Carbon\Carbon($calender->start_at);
	$endAt = new \Carbon\Carbon($calender->end_at);
?>


	{{ Form::model($calender, array('route' => array('admin.calender.update', $calender->id ), 'method' => 'PUT')) }}
	{{ Form::label('title', '標題') }}
	{{ Form::text('title')}}
	{{ Form::label('content', '內容') }}
	{{ Form::textarea('content') }}
	{{ Form::label('start_at', '開始時間') }}
	{{ Form::input('date', 'start_at', $startAt->format('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'Date', 'style' => 'width: 200px;']) }}
	{{ Form::label('end_at', '結束時間') }}
	{{ Form::input('date','end_at', $endAt->format('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'Date', 'style' => 'width: 200px;']) }}
	{{ Form::submit('送出') }}
	{{ Form::close() }}

	<script>
		CKEDITOR.replace('content', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
	</script>

@stop