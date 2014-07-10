@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/video.css') }}
@stop

@section('content')
<script>
$(document).ready(function(){
	
  $(".ath1").click(function(){
  $("#main").hide();
  $("#attached1").animate({left:"0px"},"slow","linear");
  });
});
</script>


	<div id="frame">
	<iframe id="main"	width="560" height="315" src="//www.youtube.com/embed/mzX0rhF8buo" frameborder="0" allowfullscreen></iframe>
	<img src="images\youtube縮圖\紀念.jpg" id="attached1" class="ath1">
	<img src="images\youtube縮圖\夜空中最亮的星.jpg" id="attached2">
	<img src="images\youtube縮圖\山丘.jpg" id="attached3">
	<img src="images\youtube縮圖\李白.jpg" id="attached4">
	</div>
<!--
	<iframe id="attached1" width="560" height="315" src="//www.youtube.com/embed/ePFWiPo0FzE" frameborder="0" allowfullscreen></iframe>
	<iframe id="attached2" width="560" height="315" src="//www.youtube.com/embed/fzuy63eCUKc" frameborder="0" allowfullscreen></iframe>
	<iframe id="attached3" width="560" height="315" src="//www.youtube.com/embed/rVEMTxg_LrU" frameborder="0" allowfullscreen></iframe>
	<iframe id="attached4" width="560" height="315" src="//www.youtube.com/embed/2xKc-rAyAdQ" frameborder="0" allowfullscreen></iframe>
-->
<!---->

<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#div1").fadeToggle("slow");
  });
});
</script>

<div id="video_name" style ="width:900px;height:100px;font-size:80px;">影片名稱</div>	 
<button id="like" type="button" style="width:100px;height:30px;"><img src="圖片網址"></button>
<button id="love" type="button" style="width:100px;height:30px;"><img src="圖片網址"></button>

<button id="message" style="width:100px;height:30px;">留言</button>

<div id="div1" type="submit"  style="width:900px; height:150px; background-color:green; display:none;">
	{{ Form::open(array('route' => 'video.message')) }}
	{{ Form::textarea('video_text', '', array('id' => 'textarea')) }}
	{{ Form::submit('送出') }}
	{{ Form::close() }}
</div>
<!-- 彈出視窗 -->

@foreach( $messages as $message)
	<div id= "div_message" style="width:900px; height:150px;">{{$message["video_text"]}}</div>
@endforeach
  <!--影片名稱，應為變數-->

@stop
