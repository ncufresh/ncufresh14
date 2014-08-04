@extends('layouts.layout')

{{ HTML::style('css/necessity/necessity.min.css') }}
{{ HTML::script('js/necessity.min.js')  }}

@section('content')
		
		    {{ Form::open(array('route' => 'download_edit' , 'method'=>'post')) }}
			{{ Form::hidden('id',$necessityEdition->id) }}
    		下載專區修改頁面
    		</br>
    		網頁上想要讓他們點選的名稱：
    		</br>
			{{ Form::text('name',$necessityEdition -> name, array( 'class' => 'backstage_item_add' ))}}
			{{ Form::submit('修改完畢') }}
			{{ Form::close() }}
		
	
@stop