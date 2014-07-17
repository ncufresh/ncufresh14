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
				<div id="picture_select">
				@foreach($pictures as $picture)
					<div id="{{$picture->pictureAdmin->id}}" class="select">
						{{$i++}}
					</div>
				@endforeach
				<script>
					var i = {{ json_encode($i) }};
				</script>
				</div>
				<?php $i=1; ?>
				<div id="img">
					<img id="{{$i}}" class="img" src="{{ asset( 'img/uploadImage/' .  $pictures[0]->pictureAdmin->file_name) }}">
				</div>
			</div>
			<div id="select">
				<div id="buttom" data-num="{{$nculifes[0]->id}}">
				</div>
			</div>
		</div>
	</div>
@stop