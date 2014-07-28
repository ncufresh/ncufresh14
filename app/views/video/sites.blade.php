@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/video.css') }}
	{{ HTML::script('js/video.js') }}
@stop

@section('content')

<div id="frame">
<img src="images/videoImages/videoFrame.png" id="videoFrame">
<img src="images/videoImages/introMid.png" id="introMid">
<img src="images/videoImages/introLine.png" id="introTop">
<img src="images/videoImages/introLine.png" id="introTop2">

<div id="main">
	<iframe width="750" height="500" src="//www.youtube.com/embed/{{ $video->video_address }}" frameborder="0" allowfullscreen></iframe>
</div>

<div id="video_name" style ="width:900px;height:100px;font-size:50px;"><font color="gray">{{$video ->video_name}}</font></div>
<button id="like" type="button"  style = "background-color: transparent; border: 0;"><img src="images/videoImages/likeButton.png"><font color='gray'>        喜歡</font></button>
<button id="love" type="button"  style = "background-color: transparent; border: 0;"><img src="images/videoImages/loveButton.png"><font color='gray'>        超喜歡</font></button>
<button id="message" style="width:100px;height:30px;background-color: transparent; border: 0;"><img src="images/videoImages/messageButton.png"></button>

<!-- 彈出視窗 -->

<img src="images/videoImages/likePicture.png" id="rating">
<img src="images/videoImages/lovePicture.png" id="rating2">
<div id="rating_number1" style="text-align:center ; font-size:27px">{{$getLike}}</div>  <!--rating nuber，先暫訂-->
<div id="rating_number2" style="text-align:center ; font-size:27px">{{$getLove}}</div>

<div id="div1" type="submit"  style=" display:none;">

	{{ Form::open(array('route' => 'video.message','id'=>'videoPost')) }}
	{{ Form::textarea('video_text','',array('maxlength'=>400,'id'=>'textarea' )) }}
	{{ Form::submit('送出',array('id'=>'submit')) }}
	{{ Form::close() }}
</div>

<div id = "intro">{{nl2br($video->video_introduction)}}</div> <!--video introduction-->


@foreach( $messages as $message)
	<div id="user_message">
		<img src="images/videoImages/introMid.png" id="messageBGwhite">
		<img src="images/videoImages/messageBG.png" id="messageBG">
		<img src="images/videoImages/messageCamera.png" id="messageBG2">
		<a href="{{ route('user.id', array('id' => $message ->user->id)) }}"><img src="{{ route('personface',array('id' => $message->user_id )) }}" id="portrait"></a>
		<div id= "div_message" style="width:720px; height:170px;">{{nl2br($message["video_text"])}}</div>
		<div id ="div_name"><font color = "#7DB7A1">{{ $message->user->name }}</font></div>
	</div>
@endforeach
<button id="pinewave" type="button"  style = "background-color: transparent; border: 0;"></button>
</div> <!--frame div-->

{{$messages->links();}} 
@if($errors -> any())
	<script>{{"alert('".$errors -> first()."');"}}</script>
@endif

@stop
