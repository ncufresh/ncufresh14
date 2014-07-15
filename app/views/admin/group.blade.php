@extends('layouts.layout')

@section('js_css')
	{{ HTML::script('js/admin.js') }}
	<style>
		.permissions{
			padding-left: 30px;
		}
		.permission-content{
			/*padding-left: 15px;*/
		}
		.section{
			padding-top: 15px;
		}

	</style>
@stop

@section('content')
	@foreach($roles as $role)
		<div class="section">
			<div class="role-content">{{ $role->name }} ( {{ $role->id }} ) </div>
			<div class="permissions">
			@foreach($role->perms as $permission)
				<div class="permission-content">{{ $permission->display_name }} ( {{ $permission->id }} ) </div>
			@endforeach
			</div>
		</div>
	@endforeach
@stop