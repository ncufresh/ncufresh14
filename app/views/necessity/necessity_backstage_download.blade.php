@extends('layouts.layout')

{{ HTML::style('css/necessity/necessity.min.css') }}
{{ HTML::script('js/necessity.min.js')  }}

@section('content')
		</br>
		</br>
		
			{{ Form::open(array('route' => 'download_add', 'files' => true)) }}
    		
    		<font size="5" face="標楷體">下載專區後台~</font>
    		
		<div align="Center">
			
    		</br>
    		
    		</br>
    		</br>
    		項目：
			
			{{ Form::text('downloadname',' 想要讓他們下載什麼呢? ', array('class' => 'backstage_item_add' )) }}
			{{ Form::file('File') }}

  			{{ Form::submit('上傳') }}
			{{ Form::close() }}

		</div>

		@foreach($DownloadData as $downloadData)

			{{ Form::open(array('route' => 'download_delete')) }}
    		{{ Form::hidden('ID', $downloadData->id) }}

    		<br>
			<div class="backstage">{{$downloadData->name }}</div>
			<br>
			
			{{ Form::submit('刪除')}}
		
			<a href="{{ route('necessity.necessity_backstage_download_edit', array('id' => $downloadData->id)) }}">修改</a>	

			{{ Form::close() }}
			
	@endforeach
@stop