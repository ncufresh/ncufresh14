@extends('layouts.layout')

@section('content')
@if(Auth::check())
	Hello! {{ Auth::user()->name}}
@else
	No login!QQ
@endif
<br>
HIHI;

@stop