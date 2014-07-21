@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/aboutus.css') }}
	{{ HTML::script('js/aboutus.js') }}
	
@stop

@section('content')

<div id="container" class="container">
				<div id="contentContainer">
	<div id="content" style="width:98% ; margin:10px;">
	</br>
	

			<a href="{{ route('About_us.toadd')}}">增新</a>
			<ol id="leftlist">
			分類　　名稱　　　　　　　　　　　　　　　　　　　　介紹
			@foreach($lists as $list)
			<p>
			<li>

			{{Form::open(array('url'=>'About_us/delete','method'=>'post'))}}
			{{Form::hidden('id',$list->id)}}
			<span class="list">{{$list->categoryName}}</span>
			
			<span class="list">{{$list->teamphoto}}</span>
			
			<!-- <span class="list">{{$list->introduction}}</span> -->
			<span>{{Form::submit('刪除')}}</span>
			{{Form::close()}}
			<span><a href="{{ route('About_us.edit', array('id' => $list->id)) }}">編輯</a></span>
			</li>	
			</p>
			@endforeach
			</ol>
			</div>
		</div>
			</div>
			
@stop