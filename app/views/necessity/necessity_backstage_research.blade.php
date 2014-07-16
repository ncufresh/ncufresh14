@extends('layouts.layout')

{{ HTML::style('css/necessity.css') }}
{{ HTML::script('js/necessity.js')  }}

@section('content')
		</br>
		</br>
		<table WIDTH="1050" HEIGHT="300">
		<tr>
		<td align="Center">
			
			{{ Form::open(array('route' => 'research_add' , 'method'=>'post')) }}
    		研究新生全體注意!!
    		</br>
    		項目：
			{{ Form::text('item','  偷拍女生洗澡沙龍照注意事項!!', array('class' => 'backstage_item_add' ))}}
			</br>			
			說明：
			{{ Form::textarea('explanation', ' 切記相機鏡頭要HD高畫質!!', array('class' => 'backstage_explanation_add' )) }}
			</br>			
			單位：
			{{ Form::text('organizer','  綠綠總指揮部', array('class' => 'backstage_organizer_add ' ))}}
			
			{{ Form::submit('上傳') }}
			{{ Form::close() }}
			
		</td>
		</tr>
		</table>
		
		<script>
		CKEDITOR.replace('explanation', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
		</script>

	@foreach($ResearchData as $researchdata)

		
			{{ Form::open(array('route' => 'research_delete')) }}
    		<br>
    		{{ Form::hidden('ID', $researchdata->id) }}
    		項目
    		<div class="backstage">{{$researchdata->item }}</div>
			<br>			
			說明
			<div class="backstage">{{$researchdata->explanation}}</div>
			<br>			
			單位
			<div class="backstage">{{$researchdata->organizer}}</div>
			<br>
			{{ Form::submit('刪除')}}
			<input type="button" value="修改" onclick="location.href='http://localhost/ncufresh14/public/necessity/backstage/research/{{$researchdata->id}}'">
			{{ Form::close() }}

	@endforeach

@stop