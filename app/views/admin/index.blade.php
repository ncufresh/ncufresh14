@extends('layouts.layout')

@section('css_js')
	{{ HTML::script('js/admin.js') }}

@stop

@section('content')
	<div id="admin-functions">
		<a href="{{ route('admin.announcement.index') }}"><button id="admin_announcement">公告管理</button></a>
		<a href="{{ route('admin.link.index') }}"><button id="admin_link">友站連結管理</button></a>
	</div>

@stop