@extends('layouts.layout')

@section('content')
	<br>題目 : {{ $poweredit->question }}</br>
	<br>(A)：{{ $poweredit->qA }}</br>
	<br>(B)：{{ $poweredit->qB }}</br>
	<br>(C)：{{ $poweredit->qC }}</br>
	<br>(D)：{{ $poweredit->qD }}</br>
	<br>~解~：{{ $poweredit->correctans }}</br>
	<br>解答：{{ $poweredit->answer }}</br>
	<br>日期：{{ $poweredit->day }}</br>
	@if($poweredit->created_at != $poweredit->updated_at)
		<br>最後修改：{{ $poweredit->updated_at }}</br>
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