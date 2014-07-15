@extends('layouts.layout')

@section('content')
<table class="table table-hover">
	<thead>
		<tr>
			<th>序號</th>
			<th>主題</th>
			<th>發佈日期</th>
			<th>人氣</th>
			<th>修改</th>
			<th>刪除</th>
		</tr>
	</thead>
	<tbody>
		@foreach($announcements as $announcement)
			@if($announcement->pinned == true)
				<tr class="info" data-url="{{ route('admin.announcement.show', array('id' => $announcement->id)) }}">
			@else
				<tr data-url="{{ route('admin.announcement.show', array('id' => $announcement->id)) }}">
			@endif
				<td>{{ $announcement->id }}</td>
				<td>{{ $announcement->title }}</td>
				<td>{{ $announcement->created_at }}</td>
				<td>{{ $announcement->viewer }}</td>
				<td><a href="{{ route('admin.announcement.edit', array('id' => $announcement->id)) }}">戳我</a></td>
				<td>
					{{ Form::open(array('route' => array('admin.announcement.destroy', $announcement->id), 'method' => 'delete')) }}
						<button type="submit" >刪除</button>
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@if($admin == true)
	{{-- @if(Auth::user->can('announcement_admin')) --}}
		<a href="{{ route('admin.announcement.create') }}"><button id="announcement_create">發公告</button></a>
	{{-- @endif --}}
@endif
@stop