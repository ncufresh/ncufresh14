@extends('layouts.layout')

{{ HTML::style('css/necessity/necessity.min.css') }}
{{ HTML::script('js/necessity.min.js')  }}

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
			{{ Form::text('item','', array('class' => 'backstage_item_add' ))}}
			</br>
			說明：
			{{ Form::textarea ('explanation', '', array('class' => 'backstage_explanation_add' )) }}
			</br>			
			單位：
			{{ Form::text('organizer','', array('class' => 'backstage_organizer_add ' ))}}
			
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
    		{{ Form::hidden('ID', $freshmandata->id) }}
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
						
			<a href="{{ route('necessity.necessity_backstage_freshman_edit', array('id' => $freshmandata->id)) }}">修改</a>
			
			{{ Form::close() }}
			
	@endforeach


@stop