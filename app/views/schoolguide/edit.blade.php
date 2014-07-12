@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/schoolguide.css') }}
	{{HTML::script('js/schoolguide.js')}}
@stop

@section('content')

<div id="container" class="container">
	<div id="contentContainer" class="testR">
	<div id="content" style="height:700px; width:98% ;background-color:#FFF000; margin:10px;">

		{{Form::open(array('url'=>'sure','method'=>'post'))}}
		{{Form::hidden('id',$users->id)}}
		{{Form::select('categories', array('1' => '系館', '2' => '行政','3'=>'中大十景','4'=>'運動','5'=>'飲食','6'=>'住宿'),$users->id,array('id'=>$users->id))}}

		{{Form::text('name',$users->name,array('id'=>$users->id))}}

		{{Form::textarea('introduction',$users->introduction,array('id'=>$users->id))}}
		
		<button class="sure">確認</button>
		{{Form::close()}}
	</div>
	</div>

	</div>
	<script>
		CKEDITOR.replace('introduction', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
	</script>
@stop