@extends('layouts.layout')

{{ HTML::style('css/necessity.css') }}
{{ HTML::script('js/necessity.js')  }}

@section('content')
		</br>
		</br>
		
		<div align="Center">
			
			{{ Form::open(array('route' => 'download_add' , 'method'=>'post')) }}
    		
    		<font size="5" face="標楷體">下載專區後台~</font>
    		</br>
    		</br>
    		</br>
    		項目：
			{{ Form::text('filename',' 想要下載什麼呢? ', array('class' => 'backstage_item_add' ))}}
			{{ Form::file('image') }}
			
			{{ Form::submit('上傳') }}
			{{ Form::close() }}
		</div>

		
		
	

@stop