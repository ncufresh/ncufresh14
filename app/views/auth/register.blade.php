@extends('layouts.layout')

@section('content')
<?php

	var_dump($errors);
?>
<p>註冊頁面</p>
{{ Form::open(array('route' => 'register.store')) }}
{{ Form::label('name', '姓名') }}
{{ Form::text('name')}}
{{ Form::label('nick_name', '綽號') }}
{{ Form::text('nick_name') }}
{{ Form::label('email', '信箱(作為登入用)') }}
{{ Form::text('email') }}
{{ Form::label('password', '密碼') }}
{{ Form::password('password') }}
{{ Form::label('re_password', '密碼確認') }}
{{ Form::password('re_password') }}
{{ Form::submit('送出') }}
{{ Form::close() }}

@stop