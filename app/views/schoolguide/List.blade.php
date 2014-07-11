@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/schoolguide.css') }}
	{{HTML::script('js/schoolguide.js')}}
@stop

@section('content')

<div id="container" class="container">
				<div id="contentContainer" class="testR">
	<div id="content" style="height:3000px; width:98% ;background-color:#FFF000; margin:10px;">
	</br>
	

			<a href="{{ route('SchoolGuide.add')}}">增新</a>
			<ol id="leftlist">
			分類　　名稱　　　　　　　　　　　　　　　　　　　　介紹
			@foreach($lists as $list)
			<p>
			<li>

			{{Form::open(array('url'=>'delete','method'=>'post'))}}
			{{Form::hidden('id',$list->id)}}
			<span class="list">{{$list->categories}}</span>
			
			<span class="list">{{$list->name}}</span>
			
			<span class="list">{{$list->introduction}}</span>
			{{Form::submit('刪除')}}
			{{Form::close()}}
			<a href="{{ route('SchoolGuide.edit', array('id' => $list->id)) }}">編輯</a>
			</li>	
			</p>
			@endforeach
			</ol>
			</div>
		</div>
			</div>
			
@stop