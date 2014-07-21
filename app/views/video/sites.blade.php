@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/video.css') }}
	{{ HTML::script('js/video.js') }}
@stop

@section('content')

<div id="frame">
<img src="images\youtube縮圖\影片放置框_改.png" id="videoFrame">
<img src="images\youtube縮圖\2_內容說明_中.png" id="introMid">
<img src="images\youtube縮圖\3_內容說明_尾.png" id="introTop">
<img src="images\youtube縮圖\3_內容說明_尾.png" id="introTop2">


<div id="main">
	<iframe width="896" height="504" src="//www.youtube.com/embed/8UVNT4wvIGY" frameborder="0" allowfullscreen></iframe>
</div>



<div id="video_name" style ="width:900px;height:100px;font-size:50px;"><font color="gray">【影片】- 友和帥帥/佑昇帥帥</font></div>
<button id="like" type="button"  style = "background-color: transparent; border: 0;" ><img src="images\youtube縮圖\喜歡.png"><font size=>      喜歡</font></button>
<button id="love" type="button"  style = "background-color: transparent; border: 0;"><img src="images\youtube縮圖\超喜歡.png">      超喜歡</button>
<button id="message" style="width:100px;height:30px;background-color: transparent; border: 0;"><img src="images\youtube縮圖\留言按鈕.png"></button>

<!-- 彈出視窗 -->

<img src="images\youtube縮圖\喜歡_圖示.png" id="rating">
<img src="images\youtube縮圖\超喜歡_圖示.png" id="rating2">
<div id="rating_number1" style="text-align:center ; font-size:27px">{{$getLike}}</div>  <!--rating nuber，先暫訂-->
<div id="rating_number2" style="text-align:center ; font-size:27px">{{$getLove}}</div>

<div id="div1" type="submit"  style=" display:none;">

	{{ Form::open(array('route' => 'video.message','id'=>'videoPost')) }}
	{{ Form::textarea('video_text','',array('maxlength'=>400,'id'=>'textarea' )) }}
	{{ Form::submit('送出',array('id'=>'submit')) }}
	{{ Form::close() }}
</div>



@if(isset($introduction) )
	<div id = "intro">{{nl2br($introduction)}}</div> <!--video introduction-->
@endif

@foreach( $messages as $message)
	<div id="user_message">
		<img src="images\youtube縮圖\5_回覆區內容框_中.png" id="messageBG">
		<img src="images\youtube縮圖\6_回覆區內容框_尾.png" id="messageBG2">
		<a href="https://www.youtube.com/watch?v=ibWYROwadYs"><img src="images\youtube縮圖\10453181_648726201876120_965403227_n.jpg" id="portrait"></a>		
		<div id= "div_message" style="width:720px; height:170px;">{{nl2br($message["video_text"])}}</div>
		<div id ="div_name"><font color = "#7DB7A1">{{ $message->user->name }}</font></div>
	</div>
@endforeach

	


</div> <!--frame div-->

{{$messages->links();}} 
@if($errors -> any())
	<script>{{"alert('".$errors -> first()."');"}}</script>
@endif

@stop
