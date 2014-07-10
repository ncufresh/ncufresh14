@extends('layouts.layout')

@section('content')
<table class="table table-hover">
	<thead>
		<tr>
			<th>序號</th>
			<th>主題</th>
			<th>發佈日期</th>
			<th>人氣</th>
			<th>暫時link</th>
		</tr>
	</thead>
	<tbody>
		@foreach($announcements as $announcement)
			@if($announcement->pinned == true)
				<tr class="info" data-url="{{ route('announcement.show', array('id' => $announcement->id)) }}">
			@else
				<tr data-url="{{ route('announcement.show', array('id' => $announcement->id)) }}">
			@endif
				<td>{{ $announcement->id }}</td>
				<td>{{ $announcement->title }}</td>
				<td>{{ $announcement->created_at }}</td>
				<td>{{ $announcement->viewer }}</td>
				<td><a href="{{ route('announcement.show', array('id' => $announcement->id)) }}">戳我</a></td>
			</tr>
		@endforeach
	</tbody>
</table>

@if(Auth::check())
	{{-- @if(Auth::user->can('announcement_admin')) --}}
		<button id="announcement_create">發公告</button>
	{{-- @endif --}}
@endif
@stop