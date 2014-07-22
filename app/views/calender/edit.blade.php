@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/jquery.datetimepicker.css') }}
	{{ HTML::script('js/jquery/jquery.datetimepicker.js') }}
@stop

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
	{{ Form::input('text', 'start_at', $startAt->format('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'Date', 'id' => 'start-at']) }}
	{{ Form::label('end_at', '結束時間') }}
	{{ Form::input('text','end_at', $endAt->format('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'Date', 'id' => 'end-at']) }}
	{{ Form::submit('送出') }}
	{{ Form::close() }}

	<script>
		$(function(){
			CKEDITOR.replace('content', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
			$('#start-at').datetimepicker();
			$('#end-at').datetimepicker();
		});
	</script>
@stop