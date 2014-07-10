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
	
	{{Form::open(array('url'=>'add','method'=>'post'))}}
			<button id="add" style="position:relative; left:930px; top:-40px;">增新</button>
	{{Form::close()}}
			<ol id="leftlist">
			分類　　名稱　　　　　　　　　　　　　　　　　　　　介紹
			@foreach($lists as $list)
			<p>
			<li>

			
			<span class="list">{{$list->categories}}</span>
			
			<span class="list">{{$list->name}}</span>
			
			<span class="list">{{$list->introduction}}</span>

			<a href="{{ route('SchoolGuide.edit', array('id' => $list->id)) }}">編輯</a>

			</li>	
			</p>
			@endforeach
			</ol>
			</div>
		</div>
			</div>
			
@stop