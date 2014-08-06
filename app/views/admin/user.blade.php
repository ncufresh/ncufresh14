@extends('layouts.layout')

@section('js_css')
{{ HTML::script('js/admin.js') }}

@stop

@section('content')
	<div id="users">
		@foreach($users as $user)
			<div class="user-row row" data-sid="{{ $user->id }}">
				<div class="user-id col-sm-1">{{ $user->id }}</div>
				<div class="user-id col-sm-2">{{{ $user->name }}}</div>
				<div class="user-id col-sm-4">{{{ $user->email }}}</div>
				<div class="user-id col-sm-3">
					{{ Form::open(array('route' => 'admin.changeRole')) }}
					{{ Form::hidden('id', $user->id) }}
					{{ Form::select('role_id', $roles, array('class' => 'form-control', 'id' => 'selector1', 'value' => $user->roles[0]->id)) }}
					{{ Form::submit() }}
					{{ Form::close() }}
				</div>
				<div class="user-id col-sm-2"><a href="{{ route('admin.oplogin', array('id' => $user->id)) }}">戳我</a></div>
			</div>
		@endforeach

	</div>

@stop