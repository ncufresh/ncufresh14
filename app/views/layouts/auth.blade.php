<div id="auth_box">
@if(Auth::check())
	
	<div id="auth_logined">
	{{-- User has logined. show logout(?) --}}
		<img id="auth_person" src="{{ route('personface',array('id' => Auth::user()->id )) }}"/>
		<div id="auth_logined_cover">
		<a id="topUserButton" href="{{ route('user.self') }}"></a>
		<a id="logoutButton" href="{{ route('logout') }}"></a>
		<div id="auth_name">{{Auth::user()->name}}</div>
		
		</div>
	</div>
@else
	
	{{-- User not logined. show login form --}}
	<div id="auth_nolgin">
		{{-- Login form --}}
		{{ Form::open(array('route' => 'login', 'id' => 'login-form')) }}
		{{-- Form::label('email', '帳號') --}}
		{{ Form::text('email', null, array('id' => 'account', 'placeholder' => '帳號')) }}
		<br>
		{{-- Form::label('密碼') --}}
		{{ Form::password('password', array('id' => 'password', 'placeholder' => '密碼')) }}
		<br>
		<a href="{{ route('register') }}" id="register"><div id="register1"></div></a>
		{{ Form::submit('', array('id' => 'submit')) }}
		<a href="{{ route('login.FB') }}" id="fblogin-a"><div id="fblogin"></div></a>
		{{ Form::close() }}
	</div>
@endif
</div>