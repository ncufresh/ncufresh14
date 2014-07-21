@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/nculife_item.css') }}
	{{ HTML::script('js/nculife/nculife.js') }}
@stop

@section('content')
	<div id="all">
		<div id="left">
			<div id="left_top">
			</div>
			<div id="place">
			@foreach ($nculifes as $nculife)
				<div class="place" data-num="{{$nculife->id}}">{{$nculife->place}}</div>
			@endforeach
			</div>
			<div id="left_bottom">
			</div>
		</div>
		<div id="right">
			<div id="introduction">
				{{$nculifes[0]->introduction}}
			</div>
			<div id="picture">
				<?php $i=1; ?>
				<div id="picture_select">
				@foreach($pictures as $picture)
					<div id="{{$picture->pictureAdmin->id}}" class="select" data-num="{{$picture->pictureAdmin->id}}">
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
					<img id="change" src="{{ asset('images/nculife/buttom_left.png') }}">
				</div>
			</div>
		</div>
	</div>
@stop