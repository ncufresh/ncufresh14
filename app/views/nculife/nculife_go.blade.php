@extends('layouts.layout')

@section('content')
	@foreach ($nculife as $nculife)
		<p>{{$nculife->place}}</p>
		<p>{{$nculife->introduction}}</p>
	@endforeach
@stop