@extends('layouts.layout')

@section('content')

@foreach($links as $link)
	<a href="{{ $link->content }}">{{ $link->title }}</a>
	<br>
@endforeach
@stop