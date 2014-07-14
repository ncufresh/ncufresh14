@extends('layouts.layout')

@section('js_css')
	{{ HTML::script('js/nculife/nculife_imageUpload.js') }}
@stop

@section('content')
	<div>
		{{Form::open(array('route'=>'nculife.addData','method'=>'post'))}}
		<div>類別:
			{{Form::select('item', array('food' => '食', 'live' => '住', 'go' => '行', 'inschool' => '活', 'outschool' => '樂'))}}
		</div>
		<div>地方:
			{{Form::text('place')}}
		</div>
		<div>簡介:
			{{Form::textarea('introduction')}}
		</div>
		{{Form::hidden('local_id', null, array('id' => 'local_id'))}}
		{{Form::submit('新增')}}
		{{Form::close()}}
		{{Form::open(array('route'=>'imageUpload', 'method'=>'post', 'files' => true, 'id' => 'ajax-image-form'))}}
		<div>地圖上傳:
			{{Form::hidden('response_type', 'json')}}
			{{Form::file('upload', array('id'=>'upload'))}}
		</div>
		<input type="submit" id="Upload">
		{{Form::close()}}
		<img id="image" src="">
	</div>
	<script>
		CKEDITOR.replace('introduction', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
	</script>
@stop