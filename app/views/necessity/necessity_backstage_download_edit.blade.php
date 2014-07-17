@extends('layouts.layout')

{{ HTML::style('css/necessity.css') }}
{{ HTML::script('js/necessity.js')  }}

@section('content')
		
		<script>
		CKEDITOR.replace('filename', {filebrowserImageUploadUrl : '{{ route("imageUpload") }}'});
		</script>
	
@stop