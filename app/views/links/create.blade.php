@extends('layouts.layout')


@section('content')
	{{ Form::open(array('route' => 'links.store')) }}
	{{ Form::label('title', '標題') }}
	{{ Form::text('title')}}
	{{ Form::label('content', '內容') }}
	{{ Form::textarea('content') }}
	{{ Form::submit('送出') }}
	{{ Form::close() }}
@stop