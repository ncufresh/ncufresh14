@extends('layouts.layout')

@section('content')
	{{ Form::model($poweredit, array('route' => array('poweredit.update', $poweredit->id ), 'method' => 'PUT')) }}
	{{ Form::label('question', '題目') }}
	{{ Form::text('question')}}
	{{ Form::label('qA', 'A') }}
	{{ Form::text('qA')}}
	{{ Form::label('qB', 'B') }}
	{{ Form::text('qB')}}
	{{ Form::label('qC', 'C') }}
	{{ Form::text('qC')}}
	{{ Form::label('qD', 'D') }}
	{{ Form::text('qD')}}
	{{ Form::label('correctans', '~解~') }}
	{{ Form::select('correctans', array(1=>'A', 2=>'B', 3=>'C', 4=>'D'))}}
	{{ Form::label('answer', '解答') }}
	{{ Form::text('answer')}}
	{{ Form::label('day', '日期') }}
	{{ Form::select('day', array(1,2,3,4,5,6,7))}}
	{{ Form::submit('送出') }}
	{{ Form::close() }}

	<script>
		CKEDITOR.replace('content', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
	</script>

@stop