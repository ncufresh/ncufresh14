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
		{{Form::submit('新增')}}
		{{Form::close()}}
		<div>地圖上傳:
			{{Form::file('imageUpload', array('id'=>'imageUpload'))}}
		</div>
		<button id="Upload">上傳</button>
	</div>
	<script>
		CKEDITOR.replace('introduction', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
	</script>
@stop