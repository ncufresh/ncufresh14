<html>
	<head>

	</head>
	<body>
		{{-- Login form --}}
		{{ Form::open(array('route' => 'login')) }}
		{{ Form::label('email', 'email') }}
		{{ Form::text('email') }}
		{{ Form::label('password') }}
		{{ Form::password('password') }}
		{{ Form::submit('Login') }}
		{{ Form::close() }}
		@yield('content')
	</body>
</html>