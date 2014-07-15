@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/nculife_item.css') }}
	{{ HTML::script('js/nculife/nculife.js') }}
@stop

@section('content')
	<div id="all">
		<div id="left">
		@foreach ($nculifes as $nculife)
			<p class="place" data-num="{{$nculife->id}}">{{$nculife->place}}</p>
		@endforeach
		</div>
		<div id="right">
			<div id="introduction">
				{{$nculifes[0]->introduction}}
			</div>
			<div id="picture">
				<?php $i=1; ?>
				@foreach($pictures as $picture)
					<img id="{{$i++}}" src="{{ asset( 'img/uploadImage/' .  $picture->pictureAdmin->file_name) }}" style="height:50%; width:50%">
				@endforeach
				<script>
					var i = {{ json_encode($i) }};
				</script>
				<div id="containment">
				</div>
			</div>
			<div id="select">
				<div id="buttom" data-num="{{$nculifes[0]->id}}">
				</div>
			</div>
		</div>
	</div>
@stop