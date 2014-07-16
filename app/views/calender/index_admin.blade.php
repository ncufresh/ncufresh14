@extends('layouts.layout')

@section('content')
<table class="table table-hover">
	<thead>
	<tr>
		<th>序號</th>
		<th>主題</th>
		<th>開始日期</th>
		<th>結束日期</th>
		<th>看詳細</th>
		<th>Say Goodbye!</th>
	</tr>
	</thead>
	<tbody>
	@foreach($calenders as $calender)
		<tr data-url="{{ route('admin.calender.show', array('id' => $calender->id)) }}">
		<td>{{ $calender->id }}</td>
		<td>{{ $calender->title }}</td>
		<td>{{ $calender->start_at }}</td>
		<td>{{ $calender->end_at }}</td>
		<td><a href="{{ route('admin.calender.show', array('id' => $calender->id)) }}">戳我</a></td>
		<td>
			{{ Form::open(array('route' => array('admin.calender.destroy', $calender->id), 'method' => 'delete')) }}
			<button type="submit" >刪除</button>
			{{ Form::close() }}
		</td>
	</tr>
	@endforeach
	</tbody>
</table>

@if($admin == true)
{{-- @if(Auth::user->can('ma')) --}}
	<a href="{{ route('admin.calender.create') }}"><button id="calender-create">發行事曆</button></a>
{{-- @endif --}}
@endif
@stop