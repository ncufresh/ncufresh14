<div id="auth_box">
@if(Auth::check())
{{-- User has logined. show logout(?) --}}
	<a href="{{ route('logout') }}">Logout</a>
@else
{{-- User not logined. show login form --}}
	{{-- Login form --}}
	{{ Form::open(array('route' => 'login', 'id' => 'login-form')) }}
	{{ Form::label('email', '帳號') }}
	{{ Form::text('email') }}
	<br>
	{{ Form::label('密碼') }}
	{{ Form::password('password') }}
	<br>
	{{ Form::submit('Login') }}
	<a href="{{ route('login.FB') }}"><button type="button" class="btn btn-default btn-sm">Login with FB</button></a>
	<a href="{{ route('register') }}"><button type="button" class="btn btn-default btn-sm">Register</button></a>
	{{ Form::close() }}
	
@endif
</div>