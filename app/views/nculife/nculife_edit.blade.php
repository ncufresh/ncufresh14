@extends('layouts.layout')

@section('js_css')
	{{ HTML::script('js/nculife/nculife_imageUpload.js') }}
@stop

@section('content')
	<div>
		{{Form::open(array('route'=>'nculife.editData','method'=>'post'))}}
		{{Form::hidden('id',$nculife->id)}}
		<div>類別:
			{{Form::select('item', array('food' => '食', 'live' => '住', 'go' => '行', 'inschool' => '活', 'outschool' => '樂'), $nculife->item, array('id'=>$nculife->id))}}
		</div>
		<div>地方:
			{{Form::text('place', $nculife->place, array('id'=>$nculife->id))}}
		</div>
		<div>簡介:
			{{Form::textarea('introduction', $nculife->introduction, array('id'=>$nculife->id))}}
		</div>
		{{Form::submit('確認修改')}}
		{{Form::close()}}
		<div>地圖上傳:
			{{Form::hidden('response_type', 'json')}}
			{{Form::file('upload', array('id'=>'upload'))}}
		</div>
		<input type="submit" id="Upload">
		{{Form::close()}}
		@foreach($pictures as $picture)
		<img class="image" src="{{ asset('img/uploadImage/' . $picture->pictureAdmin->file_name) }}" style="height:100%; width:100% ;">
		@endforeach
	</div>
	<script>
		CKEDITOR.replace('introduction', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
	</script>
@stop