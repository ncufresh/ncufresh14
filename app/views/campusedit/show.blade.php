@extends('layouts.layout')

@section('content')
	<p>題目 : {{ $campusedit->question }}</p>
	<p>類型：{{ $campusedit->type }}</p>
	<p>解答：{{ $campusedit->answer_id }}</p>
	@if($campusedit->created_at != $campusedit->updated_at)
		<p>最後修改：{{ $campusedit->updated_at }}</p>
	@endif

	<div align="center">
		<button type="submit" ><a href="{{ route('campusedit.edit', array('id' => $campusedit->id)) }}">修改</a></button>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<button type="submit" ><a href="{{ route('campusedit.index') }}">返回</a></button>
		{{ Form::open(array('route' => array('campusedit.destroy', $campusedit->id), 'method' => 'delete')) }}
			<button type="submit" >刪除</button>
		{{ Form::close() }}
	</div>
@stop