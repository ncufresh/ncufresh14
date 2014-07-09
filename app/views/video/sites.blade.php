@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/video.css') }}
@stop

@section('content')
	<iframe id="main"	width="1120" height="630" src="//www.youtube.com/embed/mzX0rhF8buo" frameborder="0" allowfullscreen></iframe>
	<iframe id="attached1" width="560" height="315" src="//www.youtube.com/embed/ePFWiPo0FzE" frameborder="0" allowfullscreen></iframe>
	<iframe id="attached2" width="560" height="315" src="//www.youtube.com/embed/fzuy63eCUKc" frameborder="0" allowfullscreen></iframe>
	<iframe id="attached3" width="560" height="315" src="//www.youtube.com/embed/rVEMTxg_LrU" frameborder="0" allowfullscreen></iframe>
	<iframe id="attached4" width="560" height="315" src="//www.youtube.com/embed/2xKc-rAyAdQ" frameborder="0" allowfullscreen></iframe>

<!---->

<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#div1").fadeToggle("slow");
  });
});
</script>

<button id="like" type="button"><img src="圖片網址"></button>
<button id="love" type="button"><img src="圖片網址"></button>


<button id="message">留言</button>
<div id="div1" type="submit"  style="width:900px; height:150px; background-color:green; display:none;">
<input name="text" type="submit" value="留言" style="width:120px;height:40px;font-size:20px;">
</div>
<!-- 彈出視窗 -->
@stop