@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/schoolguide.css') }}
	{{HTML::script('js/schoolguide.js')}}
@stop

@section('content')

<div id="container" class="container">
				<div id="contentContainer" class="testR">
	<div id="contentLeft" class="testB">
		<div id="option" class="testG">

			<select style="width:180px; height:30px;" id="select" data-url="{{ route('Guide') }}">
				<option value="1">系館</option>
				<option value="2">行政</option>
				<option value="3">中大十景</option>
				<option value="4">運動</option>
				<option value="5">飲食</option>
				<option value="6">住宿</option>
			</select>

			<script>
			
			$("#select").change(function(){
				
				var url = $(this).data('url');
				var value = 'value='+$(this).val();
				
				$.ajax(
					{
						url: url,
						type: "POST",
						data: value,
						success:function(data){
							var count = data.length;
							//for(var key in data)
							$("#leftlist").remove();
							
							for(var i=0; i<count; i++){
						
							$("data[i]['name']").appendTo($("#select"));
							
							}
							

							

						}
					});
				
			});

			</script>

			<ol id="leftlist">
			@foreach($Schoolguides as $Schoolguide)
			<li>
			{{$Schoolguide->name}}
			</li>
			@endforeach
			</ol>
		</div>
	</div>
	<div id="contentRight" class="testB">
		<div id="map" class="testG">map
		</div>
	</div>
</div>

			</div>
	
			

	

@stop