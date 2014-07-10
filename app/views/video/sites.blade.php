@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/video.css') }}
@stop

@section('content')
<script>
$(document).ready(function(){
	
  $(".ath1").click(function(){
  $("#main").empty();
  $('<iframe id="i_attached1" width="560" height="315" src="//www.youtube.com/embed/ePFWiPo0FzE" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  });

  $(".ath2").click(function(){
  $("#main").empty();
  $('<iframe id="i_attached2" width="560" height="315" src="//www.youtube.com/embed/fzuy63eCUKc" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  });

  $(".ath3").click(function(){
  $("#main").empty();
  $('<iframe id="i_attached3" width="560" height="315" src="//www.youtube.com/embed/rVEMTxg_LrU" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  });

  $(".ath4").click(function(){
  $("#main").empty();
  $('<iframe id="i_attached4" width="560" height="315" src="//www.youtube.com/embed/2xKc-rAyAdQ" frameborder="0" allowfullscreen></iframe>').appendTo($('#main'));
  });

});
</script>


	<div id="frame">
	<div id="main">
		<iframe width="560" height="315" src="//www.youtube.com/embed/mzX0rhF8buo" frameborder="0" allowfullscreen></iframe>
	</div>
	<img src="images\youtube縮圖\紀念.jpg" id="attached1" class="ath1">
	<img src="images\youtube縮圖\夜空中最亮的星.jpg" id="attached2" class="ath2">
	<img src="images\youtube縮圖\山丘.jpg" id="attached3" class="ath3">
	<img src="images\youtube縮圖\李白.jpg" id="attached4" class="ath4">
	</div>

<script>
$(document).ready(function(){
  $("button").click(function(){
  	ajaxPost(url, data , iAmBack);
    $("#div1").fadeToggle("slow");
  });
});
</script>

<div id="frame2">
<div id="video_name" style ="width:900px;height:100px;font-size:80px;">影片名稱</div>

<!--$rating_checked = video_like::has('user_id','==','user_id');-->

<button id="like" type="button" style="width:100px;height:30px;"><img src="圖片網址"></button>
<script>
	var url = getTransferData('like_video_url');
	var ji = 0;
	var data = {video_id: 5566, video_rate: ji};


	function iAmBack(data){
		console.log(data);
	}



</script>
<button id="love" type="button" style="width:100px;height:30px;"><img src="圖片網址"></button>

<button id="message" style="width:100px;height:30px;">留言</button>

<div id="div1" type="submit"  style="width:900px; height:150px; background-color:green; display:none;">
	{{ Form::open(array('route' => 'video.message')) }}
	{{ Form::textarea('video_text') }}
	{{ Form::submit('送出') }}
	{{ Form::close() }}
</div>
<!-- 彈出視窗 -->

@foreach( $messages as $message)
	<div id= "div_message" style="width:900px; height:150px;">{{$message["video_text"]}}</div>
@endforeach
</div>

@stop
