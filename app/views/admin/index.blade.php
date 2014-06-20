@extends('layouts.layout')

@section('css_js')
	{{ HTML::script('js/admin.js') }}
	<script>
		var usage = {{ json_encode($function) }}
	</script>
@stop

@section('content')
	<button id="admin_announcement">公告管理</button>
	<div id="admin_magic"></div>

@stop