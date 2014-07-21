@extends('layouts.layout')

@section('content')
	{{ Form::model($campusedit, array('route' => array('campusedit.update', $campusedit->id ), 'method' => 'PUT')) }}
	{{ Form::label('question', '題目') }}
	{{ Form::text('question')}}
	{{ Form::label('type', '類型') }}
	{{ Form::select('type', array(1=>'系館',2=>'行政',3=>'中大十景',4=>'運動',5=>'飲食',6=>'住宿'))}}
	{{ Form::label('answer_id', '解答') }}
	{{ Form::text('answer_id')}}
	{{ Form::submit('送出') }}
	{{ Form::close() }}

	<script>
		CKEDITOR.replace('content', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
	</script>

@stop