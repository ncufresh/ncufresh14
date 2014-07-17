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

	<a href="{{ route('poweredit.edit', array('id' => $poweredit->id)) }}">修改</a>

@stop