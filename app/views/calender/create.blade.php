@extends('layouts.layout')


@section('content')
	{{ Form::open(array('route' => 'admin.calender.store')) }}
	{{ Form::label('title', '標題') }}
	{{ Form::text('title')}}
	{{ Form::label('content', '內容') }}
	{{ Form::textarea('content') }}
	{{ Form::label('start_at', '開始時間') }}
	{{ Form::input('date', 'start_at', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
	{{ Form::label('end_at', '結束時間') }}
	{{ Form::input('date','end_at', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
	{{ Form::submit('送出') }}
	{{ Form::close() }}

	<script>
		CKEDITOR.replace('content', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
	</script>

@stop