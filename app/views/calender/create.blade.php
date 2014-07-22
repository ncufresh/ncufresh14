@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/jquery.datetimepicker.css') }}
	{{ HTML::script('js/jquery/jquery.datetimepicker.js') }}
@stop


@section('content')
	{{ Form::open(array('route' => 'admin.calender.store')) }}
	{{ Form::label('title', '標題') }}
	{{ Form::text('title')}}
	{{ Form::label('content', '內容') }}
	{{ Form::textarea('content') }}
	{{ Form::label('start_at', '開始時間') }}
	{{ Form::input('text', 'start_at', null, ['class' => 'form-control', 'placeholder' => 'Date', 'id' => 'start-at']) }}
	{{ Form::label('end_at', '結束時間') }}
	{{ Form::input('text','end_at', null, ['class' => 'form-control', 'placeholder' => 'Date', 'id' => 'end-at']) }}
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