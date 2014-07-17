@extends('layouts.layout')

@section('js_css')
	<style>
		#announcement-content{
			padding: 10px;
		}
		#announcement-content>table>tbody>tr>td>img{
			width: 30px;
		}
		#announcement-content>table>tbody>tr{
			cursor: pointer;
		}
	</style>
	<script>
		$(function(){
			$('.announcement-row').click(function(){
				window.document.location = $(this).data("url");
			});
		});
	</script>
@stop

@section('content')
<div id="announcement-content">
	<table class="table table-hover">
		<thead>
			<tr>
				<th class="col-sm-1">重要</th>
				<th class="col-sm-6">主題</th>
				<th class="col-sm-2">發佈日期</th>
				<th class="col-sm-3">人氣</th>
<!--				<th>暫時link</th>-->
			</tr>
		</thead>
		<tbody>
			@foreach($announcements as $announcement)
				@if($announcement->pinned == true)
					<tr class="announcement-row info" data-url="{{ route('announcement.show', array('id' => $announcement->id)) }}">
						<td><img src="{{ asset('images/index/top.png') }}"> </td>
				@else
					<tr class="announcement-row" data-url="{{ route('announcement.show', array('id' => $announcement->id)) }}">
						<td></td>
				@endif

					<td>{{ $announcement->title }}</td>
					<td>{{ $announcement->created_at }}</td>
					<td>{{ $announcement->viewer }}</td>
<!--					<td class=""><a href="{{ route('announcement.show', array('id' => $announcement->id)) }}">戳我</a></td>-->
				</tr>
			@endforeach
		</tbody>
	</table>

	@if($admin == true)
		{{-- @if(Auth::user->can('announcement_admin')) --}}
			<a href="{{ route('admin.announcement.create') }}"><button id="announcement_create">發公告</button></a>
		{{-- @endif --}}
	@endif
</div>
@stop