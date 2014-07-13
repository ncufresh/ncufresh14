@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/nculife_data.css') }}
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
		<div>照片檔名:
			{{Form::text('picture', $nculife->picture, array('id'=>$nculife->id))}}
		</div>
		<div>地圖檔名:
			{{Form::text('local', $nculife->local, array('id'=>$nculife->id))}}
		</div>
		<div id="picture">
			<img id="image" src="{{asset("images/nculife/" .  $nculife->local)}}">
			<div id="containment">
			</div>
		</div>
		{{Form::submit('確認修改')}}
		{{Form::close()}}
	</div>
	<script>
		CKEDITOR.replace('introduction', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
	</script>
@stop