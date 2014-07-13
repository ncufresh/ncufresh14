@extends('layouts.layout')

@section('js_css')

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
		<div>照片檔名:
			{{Form::text('picture')}}
		</div>
		<div>地圖檔名:
			{{Form::text('local')}}
		</div>
		{{Form::submit('新增')}}
		{{Form::close()}}
	</div>
	<script>
		CKEDITOR.replace('introduction', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
	</script>
@stop