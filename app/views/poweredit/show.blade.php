@extends('layouts.layout')

@section('content')
	<p>題目 : {{ $poweredit->question }}</p>
	<p>(A)：{{ $poweredit->qA }}</p>
	<p>(B)：{{ $poweredit->qB }}</p>
	<p>(C)：{{ $poweredit->qC }}</p>
	<p>(D)：{{ $poweredit->qD }}</p>
	<p>~解~：{{ $poweredit->correctans }}</p>
	<p>解答：{{ $poweredit->answer }}</p>
	<p>日期：{{ $poweredit->day }}</p>
	@if($poweredit->created_at != $poweredit->updated_at)
		<p>最後修改：{{ $poweredit->updated_at }}</p>
	@endif

	<div align="center">
		<button type="submit" ><a href="{{ route('admin.poweredit.edit', array('id' => $poweredit->id)) }}">修改</a></button>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<button type="submit" ><a href="{{ route('admin.poweredit.index') }}">返回</a></button>
		{{ Form::open(array('route' => array('admin.poweredit.destroy', $poweredit->id), 'method' => 'delete')) }}
			<button type="submit" >刪除</button>
		{{ Form::close() }}
	</div>
@stop