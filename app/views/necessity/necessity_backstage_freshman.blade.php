@extends('layouts.layout')

{{ HTML::style('css/necessity.css') }}
{{ HTML::script('js/necessity.js')  }}

@section('content')
		</br>
		</br>
		<table WIDTH="1050" HEIGHT="300">
		<tr>
		<td align="Center">
			
			{{ Form::open(array('route' => 'freshman_add' , 'method'=>'post')) }}
    		大一新生全體注意!!
    		</br>
    		項目：
			{{ Form::text('item','  偷拍女生洗澡注意事項!!', array('class' => 'backstage_item_add' ))}}
			</br>
			說明：
			{{ Form::textarea ('explanation', '  切記相機要關閃光燈!!', array('class' => 'backstage_explanation_add' )) }}
			</br>			
			單位：
			{{ Form::text('organizer','  陳硬硬總指揮部', array('class' => 'backstage_organizer_add ' ))}}
			
			{{ Form::submit('上傳') }}
			{{ Form::close() }}
			
		</td>
		</tr>
		</table>

		<script>
		CKEDITOR.replace('explanation', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
		</script>


	@foreach($FreshmanData as $freshmandata)

			{{ Form::open(array('route' => 'freshman_delete')) }}
    		</br>
			項目
    		<div class="backstage">{{$freshmandata->item}}</div>
			<br>			
			說明
			<div class="backstage">{{$freshmandata->explanation}}</div>
			<br>			
			單位
			<div class="backstage">{{$freshmandata->organizer}}</div>
			<br>
			
			{{ Form::submit('刪除')}}
			<input type="button" value="修改" onclick="location.href='http://localhost/ncufresh14/public/necessity/backstage/freshman/{{$freshmandata->id}}'">
			{{ Form::close() }}

	@endforeach

@stop