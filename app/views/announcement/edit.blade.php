@extends('layouts.layout')


@section('content')
	{{ Form::model($announcement, array('route' => array('announcement.update', $announcement->id ), 'method' => 'PUT')) }}
	{{ Form::label('title', '標題') }}
	{{ Form::text('title')}}
	{{ Form::label('content', '內容') }}
	{{ Form::textarea('content') }}
	{{ Form::label('pinned', '置頂否') }}
	{{ Form::radio('pinned', '0', true) }}
	{{ Form::label('pinned', '不') }}
	{{ Form::radio('pinned', '1', false) }}
	{{ Form::label('pinned', '要') }}ß
	{{ Form::submit('送出') }}
	{{ Form::close() }}
@stop