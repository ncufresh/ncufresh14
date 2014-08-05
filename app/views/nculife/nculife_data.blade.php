@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/nculife/nculife_data.min.css') }}
@stop

@section('content')
	<div id="content">
		<div id="new">
			<a href="{{route('nculife.add')}}">新增</a>
		</div>
		<div id="allbox">
			@foreach($nculifes as $nculife)
			{{Form::open(array('route'=>'nculife.deleteData','method'=>'post'))}}
			{{Form::hidden('id',$nculife->id)}}
			<div id="databox">
				<div class="data">類別:　{{$nculife->item}}</div>	
				<div class="data">地方:　{{$nculife->place}}</div>
				<div class="data">簡介:　{{$nculife->introduction}}</div>
			</div>
			<span><a href="{{route('nculife.edit', array('id' => $nculife->id))}}">編輯</a></span>
			{{Form::submit('刪除')}}
			{{Form::close()}}
			@endforeach
		</div>
	</div>
@stop