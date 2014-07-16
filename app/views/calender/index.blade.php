@extends('layouts.layout')

@section('content')
<table class="table table-hover">
	<thead>
	<tr>
		<th>序號</th>
		<th>主題</th>
		<th>開始日期</th>
		<th>結束日期</th>
		<th>暫時link</th>
	</tr>
	</thead>
	<tbody>
	@foreach($calenders as $calender)
		<tr data-url="{{ route('calender.show', array('id' => $calender->id)) }}">
		<td>{{ $calender->id }}</td>
		<td>{{ $calender->title }}</td>
		<td>{{ $calender->start_at }}</td>
		<td>{{ $calender->end_at }}</td>
		<td><a href="{{ route('calender.show', array('id' => $calender->id)) }}">戳我</a></td>
	</tr>
	@endforeach
	</tbody>
</table>

@if(Auth::check())
{{-- @if(Auth::user->can('announcement_admin')) //TODO --}}
<button id="announcement_create">發公告</button>
{{-- @endif --}}
@endif
@stop