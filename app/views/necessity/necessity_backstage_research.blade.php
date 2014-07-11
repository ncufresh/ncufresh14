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
    		{{ Form::label('name', '研究新生全體注意!!') }}
    		</br>
    		{{ Form::label('item', '項目') }}
			{{ Form::text('item','  偷拍女生洗澡沙龍照注意事項!!', array('class' => 'backstage_item_add' ))}}
			</br>			
			{{ Form::label('explanation', '說明') }}
			{{ Form::textarea('explanation', '  切記相機鏡頭要HD高畫質!!', array('class' => 'backstage_explanation_add' )) }}
			</br>			
			{{ Form::label('organizer', '單位') }}
			{{ Form::text('organizer','  綠綠總指揮部', array('class' => 'backstage_organizer_add ' ))}}
			
			{{ Form::submit('上傳') }}
			{{ Form::close() }}
			
		</td>
		</tr>
		</table>

	@foreach($ResearchData as $researchdata)

		<table WIDTH="1050">
		
		<tr>
		<td align="Center">
			{{ Form::open(array('route' => 'research_delete')) }}
    		</br>
			{{ Form::hidden('ID', $researchdata->id) }}

    		{{ Form::label('item', '項目') }}
			{{ Form::label('item', $researchdata->item , array('class' => 'backstage_item' ))}}
			</br>			
			{{ Form::label('explanation', '說明') }}
			{{ Form::label('explanation', $researchdata->explanation, array('class' => 'backstage_explanation' )) }}
			</br>			
			{{ Form::label('organizer', '單位') }}
			{{ Form::label('organizer',$researchdata->organizer, array('class' => 'backstage_organizer' ))}}
			</br>
			{{ Form::submit('刪除')}}
			{{ Form::close() }}
			
		</td>
		</tr>

		</table>

	@endforeach

@stop