<div id="auth_box">
@if(Auth::check())
	<div id="auth_logined">
	{{-- User has logined. show logout(?) --}}
		<a id="logoutButton"href="{{ route('logout') }}"></a>
	</div>
@else
	
	{{-- User not logined. show login form --}}
	<div id="auth_nolgin">
		{{-- Login form --}}
		{{ Form::open(array('route' => 'login', 'id' => 'login-form')) }}
		{{-- Form::label('email', '帳號') --}}
		{{ Form::text('email', '帳號', array('id' => 'account')) }}
		<br>
		{{-- Form::label('密碼') --}}
		{{ Form::password('password', array('id' => 'password')) }}
		<br>
		<a href="{{ route('register') }}"><div id="register"></div></a>
		{{ Form::submit('', array('id' => 'submit')) }}
		<a href="{{ route('login.FB') }}"><div id="fblogin"></div></a>
		{{ Form::close() }}
	</div>
@endif
</div>