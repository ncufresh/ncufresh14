@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/error.css') }}
@stop

@section('content')
	<div id="errorContainer">
		<a id="erroGoHome" href="{{ route('home') }}"></a>

		錯誤訊息: {{{ $message }}}
	</div>
	
@stop