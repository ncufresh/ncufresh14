@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/ie-page.css') }}
@stop

@section('content')
	<div id="contentContainer">
		<div id="buttons">
			<div class="button"><a href="http://www.google.com/intl/zh-TW/chrome/"><div id="button-chrome"></div></a></div>
			<div class="button"><a href="http://mozilla.com.tw/firefox/new/"><div id="button-firefox"></div></a></div>
			<div class="button"><a href="http://www.opera.com/zh-tw"><div id="button-opera"></div></a></div>
		</div>
		幾歲了還在用IE，換瀏覽器很困難嗎？
	</div>
@stop