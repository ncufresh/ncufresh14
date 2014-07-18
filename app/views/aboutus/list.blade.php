@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/aboutus.css') }}
	{{ HTML::script('js/aboutus.js') }}
	{{ HTML::script('js/jquery.cycle2.carousel.js') }}
	{{ HTML::script('js/jquery.cycle2.js') }}
@stop

@section('content')

<div id="container" class="container">
				<div id="contentContainer" class="testR">
	<div id="content" style="height:3000px; width:98% ;background-color:#FFF000; margin:10px;">
	</br>
	

			<a href="{{ route('About_us.add')}}">增新</a>
			<ol id="leftlist">
			分類　　名稱　　　　　　　　　　　　　　　　　　　　介紹
			@foreach($lists as $list)
			<p>
			<li>

			{{Form::open(array('url'=>'delete','method'=>'post'))}}
			{{Form::hidden('id',$list->id)}}
			<span class="list">{{$list->categoryName}}</span>
			
			<span class="list">{{$list->teamphoto}}</span>
			
			<span class="list">{{$list->introduction}}</span>
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