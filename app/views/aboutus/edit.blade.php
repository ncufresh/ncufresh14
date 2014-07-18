@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/aboutus.css') }}
	{{ HTML::script('js/aboutus.js') }}
	{{ HTML::script('js/jquery.cycle2.carousel.js') }}
	{{ HTML::script('js/jquery.cycle2.js') }}
@stop

@section('content')

<div id="container" class="container">
	<div id="contentContainer" class="testR">
	<div id="content" style="height:700px; width:98% ;background-color:#FFF000; margin:10px;">

		{{Form::open(array('url'=>'sure','method'=>'post'))}}
		{{Form::hidden('id',$users->id)}}
		{{Form::select('categories', array('1' => '執行組', '2' => '程設組','3'=>'美工組','4'=>'影音組','5'=>'企劃組','6'=>'幕後花絮'),$users->id,array('id'=>$users->id))}}

		{{Form::text('teamphoto',$users->teamphoto,array('id'=>$users->id))}}

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