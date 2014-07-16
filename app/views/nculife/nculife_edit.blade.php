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
		{{Form::hidden('local_id', $nculife->local_id, array('id' => 'local_id'))}}
		{{Form::hidden('picture_id', null, array('id' => 'picture_id'))}}
		{{Form::submit('確認修改')}}
		{{Form::close()}}
		{{Form::open(array('route'=>'imageUpload', 'method'=>'post', 'files' => true, 'id' => 'ajax-local-form'))}}
		<div>地圖修改:
			{{Form::hidden('response_type', 'json')}}
			{{Form::file('upload', array('id'=>'upload'))}}
		</div>
		<input type="submit" id="Upload">
		{{Form::close()}}
		@if($local != NULL)
			<img id="local" src="{{ asset('img/uploadImage/' . $local->file_name) }}" style="height:100%; width:100% ;">
		@endif
		{{Form::open(array('route'=>'imageUpload', 'method'=>'post', 'files' => true, 'id' => 'ajax-picture-form'))}}
		<div>照片上傳:
			{{Form::hidden('response_type', 'json')}}
			{{Form::file('upload', array('id'=>'upload'))}}
		</div>
		<input type="submit" id="Upload">
		{{Form::close()}}
		@foreach($pictures as $picture)
		{{Form::open(array('route'=>'nculife.deletePicture','method'=>'post'))}}
		{{Form::hidden('picture_id', $picture->id)}}
		{{Form::hidden('place_id', $picture->place_id)}}
			<img class="picture" src="{{ asset('img/uploadImage/' . $picture->pictureAdmin->file_name) }}" style="height:100%; width:100% ;">
		{{Form::submit('刪除')}}
		{{Form::close()}}
		@endforeach
		<img id="picture" src="">
	</div>
	<script>
		CKEDITOR.replace('introduction', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
	</script>
@stop