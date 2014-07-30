@extends('layouts.layout')

{{ HTML::style('css/necessity/necessity.css') }}
{{ HTML::script('js/necessity.js')  }}

@section('content')
		</br>
		</br>
		<table WIDTH="1050" HEIGHT="300">
		<tr>
		<td align="Center">
			
			{{ Form::open(array('route' => 'research_edit' , 'method'=>'post')) }}
			{{Form::hidden('id',$necessityEdition->id)}}
    		研究新生修改頁面
    		</br>
    		項目
			{{ Form::text('item',$necessityEdition -> item, array( 'class' => 'backstage_item_add' ))}}
			</br>			
			說明
			{{ Form::textarea('explanation',$necessityEdition -> explanation, array('class' => 'backstage_explanation_add' )) }}
			</br>			
			單位
			{{ Form::text('organizer',$necessityEdition -> organizer, array('class' => 'backstage_organizer_add ' ))}}
			
			{{ Form::submit('修改完畢') }}
			{{ Form::close() }}
			
		</td>
		</tr>
		</table>

		<script>
		CKEDITOR.replace('explanation', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
		</script>
	
@stop