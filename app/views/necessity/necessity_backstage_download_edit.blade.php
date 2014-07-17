@extends('layouts.layout')

{{ HTML::style('css/necessity.css') }}
{{ HTML::script('js/necessity.js')  }}

@section('content')
		</br>
		</br>
		<table WIDTH="1050" HEIGHT="300">
		<tr>
		<td align="Center">
			
			{{ Form::open(array('route' => 'freshman_edit' , 'method'=>'post')) }}
			{{Form::hidden('id',$necessityEdition->id)}}
    		下載專區修改頁面
    		</br>
    		名稱：
			{{ Form::text('filename', $necessityEdition -> item, array( 'class' => 'backstage_item_add' ))}}
						
			{{ Form::submit('修改完畢') }}
			{{ Form::close() }}
			
		</td>
		</tr>
		</table>

		<script>
		CKEDITOR.replace('filename', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
		</script>
	
@stop