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
    		{{ Form::label('name', '大一新生全體注意!!') }}
    		</br>
    		{{ Form::label('item', '項目') }}
			{{ Form::text('item','  偷拍女生洗澡注意事項!!', array('class' => 'backstage_item_add' ))}}
			</br>			
			{{ Form::label('explanation', '說明') }}
			{{ Form::textarea ('explanation', '  切記相機要關閃光燈!!', array('class' => 'backstage_explanation_add' )) }}
			</br>			
			{{ Form::label('organizer', '單位') }}
			{{ Form::text('organizer','  陳硬硬總指揮部', array('class' => 'backstage_organizer_add ' ))}}
			
			{{ Form::submit('上傳') }}
			{{ Form::close() }}
			
		</td>
		</tr>
		</table>

	@foreach($FreshmanData as $freshmandata)

		<table WIDTH="1050">
		
		<tr>
		<td align="Center">
			{{ Form::open(array('route' => 'freshman_delete')) }}
    		</br>
			{{ Form::hidden('ID', $freshmandata->id) }}

    		{{ Form::label('item', '項目') }}
			{{ Form::label('item', $freshmandata->item , array('class' => 'backstage_item' ))}}
			</br>			
			{{ Form::label('explanation', '說明') }}
			{{ Form::label('explanation', $freshmandata->explanation, array('class' => 'backstage_explanation' )) }}
			</br>			
			{{ Form::label('organizer', '單位') }}
			{{ Form::label('organizer',$freshmandata->organizer, array('class' => 'backstage_organizer' ))}}
			</br>
			{{ Form::submit('刪除')}}
			{{ Form::close() }}
			
		</td>
		</tr>

		</table>

	@endforeach

@stop