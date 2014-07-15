@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/video.css') }}
	{{ HTML::script('js/video.js') }}
@stop

@section('content')

<div id="frame">
<div id="main">
	<iframe width="560" height="315" src="//www.youtube.com/embed/mzX0rhF8buo" frameborder="0" allowfullscreen></iframe>
</div>

@if(isset($introduction) )
	<div id = "intro">{{$introduction}}</div> <!--video introduction-->
@endif

<div id="video_name" style ="width:500px;height:100px;font-size:80px;">影片名稱</div>
<button id="like" type="button" style="width:100px;height:30px;"><img src="圖片網址"></button>
<button id="love" type="button" style="width:100px;height:30px;"><img src="圖片網址"></button>
<button id="message" style="width:100px;height:30px;">留言</button>

<!-- 彈出視窗 -->

<img src="images\youtube縮圖\下載.jpg" id="rating">
<img src="images\youtube縮圖\下載.jpg" id="rating2">
<div id="rating_number1" style="text-align:center ; font-size:27px">{{$getLike}}</div>  <!--rating nuber，先暫訂-->
<div id="rating_number2" style="text-align:center ; font-size:27px">{{$getLove}}</div>

<div id="div1" type="submit"  style=" display:none;">
	{{ Form::open(array('route' => 'video.message')) }}
	{{ Form::textarea('video_text','',array('maxlength'=>400,'id'=>'textarea' )) }}
	{{ Form::submit('送出',array('id'=>'submit')) }}
	{{ Form::close() }}
</div>
@foreach( $messages as $message)
	<div id="user_message">
		<a href="https://www.youtube.com/watch?v=ibWYROwadYs"><img src="images\youtube縮圖\頭貼.jpg" id="portrait"></a>
		<div id= "div_message" style="width:820px; height:150px;">{{nl2br($message["video_text"])}}</div>
	</div>
@endforeach
</div> <!--frame div-->

{{$messages->links();}} 
@if($errors -> any())
	<script>{{"alert('".$errors -> first()."');"}}</script>
@endif

@stop
