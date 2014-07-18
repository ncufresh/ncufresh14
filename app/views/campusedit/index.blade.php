@extends('layouts.layout')

@section('content')
<table class="table table-hover">
	<thead>
		<tr>
			<th>序號</th>
			<th>題目</th>
			<th>類型</th>
			<th>解答</th>
			<th>修改</th>
		</tr>
	</thead>
	<tbody>
		@foreach($campusedits as $campusedit)
			<tr>
				<td>{{ $campusedit->id }}</td>
				<td>{{ $campusedit->question }}</td>
				<td>{{ $campusedit->type }}</td>
				<td>{{ $campusedit->answer_id }}</td>
				<td><a href="{{ route('campusedit.show', array('id' => $campusedit->id)) }}">修改</a></td>
			</tr>
		@endforeach
			<tr>&nbsp&nbsp<a href="{{ route('campusedit.create') }}">新增</a></tr>
	</tbody>
</table>
@stop