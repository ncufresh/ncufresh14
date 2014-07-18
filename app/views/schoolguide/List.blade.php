@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/schoolguide.css') }}
	{{HTML::script('js/schoolguide.js')}}
@stop

@section('content')

<div id="container" class="container">
				<div id="contentContainer">
	<div id="content" style="width:98% ; margin:10px;">
	</br>
	

			<a href="{{ route('SchoolGuide.add')}}">增新</a>
			<ol id="leftlist">
			分類　　名稱　　　　　　　　　　　　　　　　　　　　介紹
				@foreach($lists as $list)
				<div class="one">
					<p>
						<li>
						{{Form::open(array('route'=>'delete','method'=>'post'))}}
						{{Form::hidden('id',$list->id)}}
						<span class="list">{{$list->categories}}</span>
						
						<span class="list">{{$list->name}}</span>
						
						<span class="list">{{$list->introduction}}</span>
						<span>{{Form::submit('刪除')}}</span>
						{{Form::close()}}
						<span><a href="{{ route('SchoolGuide.edit', array('id' => $list->id)) }}">編輯</a></span>
						</li>	
					</p>
					</div>
				@endforeach
			</ol>
			</div>
		</div>
			</div>
			
@stop