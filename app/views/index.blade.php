@extends('layouts.layout')

@section('content')
<?php
 if(Auth::check()){
	 echo "IN";
 }else{
	 echo "OUT";
 }
?>
<br>
HIHI;

@stop