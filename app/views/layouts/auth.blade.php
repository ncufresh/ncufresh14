<div id="auth_box">
@if(Auth::check())
{{-- User has logined. show logout(?) --}}
	<a href="{{ route('logout') }}">Logout</a>
@else
{{-- User not logined. show login form --}}
	{{-- Login form --}}
	{{ Form::open(array('route' => 'login')) }}
	{{ Form::label('email', 'email') }}
	{{ Form::text('email') }}
	{{ Form::label('password') }}
	{{ Form::password('password') }}
	{{ Form::submit('Login') }}
	{{ Form::close() }}
	<a href="{{ route('loginFB') }}"><button type="button" class="btn btn-default btn-sm">Login with FB</button></a>
@endif
</div>