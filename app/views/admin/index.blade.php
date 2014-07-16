@extends('layouts.layout')

@section('css_js')
	{{ HTML::script('js/admin.js') }}

@stop

@section('content')
	<div id="admin-functions">
		<a href="{{ route('admin.announcement.index') }}"><button id="admin-announcement">公告管理</button></a>
		<a href="{{ route('admin.link.index') }}"><button id="admin-link">友站連結管理</button></a>
		<a href="{{ route('admin.calender.index') }}"><button id="admin-link">行事曆管理</button></a>

		<p>以下危險</p>
		<p>以下危險</p>
		<a href="{{ route('admin.group') }}"><button id="admin-user">群組管理</button></a>
		<a href="{{ route('admin.users') }}"><button id="admin-user">會員管理</button></a>
	</div>

@stop