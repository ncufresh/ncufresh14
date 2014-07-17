@extends('layouts.layout')

@section('content')
<table class="table table-hover">
	<thead>
		<tr>
			<th>序號</th>
			<th>題目</th>
			<th>(A)</th>
			<th>(B)</th>
			<th>(C)</th>
			<th>(D)</th>
			<th>correct</th>
			<th>answer</th>
			<th>day</th>
			<th>修改</th>
		</tr>
	</thead>
	<tbody>
		@foreach($poweredits as $poweredit)
			<tr>
				<td>{{ $poweredit->id }}</td>
				<td>{{ $poweredit->question }}</td>
				<td>{{ $poweredit->qA }}</td>
				<td>{{ $poweredit->qB }}</td>
				<td>{{ $poweredit->qC }}</td>
				<td>{{ $poweredit->qD }}</td>
				<td>{{ $poweredit->correctans }}</td>
				<td>{{ $poweredit->answer }}</td>
				<td>{{ $poweredit->day }}</td>
				<td><a href="{{ route('poweredit.show', array('id' => $poweredit->id)) }}">改個</a></td>
			</tr>
		@endforeach
			<tr><a href="{{ route('poweredit.create', array('id' => $poweredit->id+1)) }}">新增</a></tr>
	</tbody>
</table>
@stop