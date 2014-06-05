<html>
	<head>
		{{ HTML::script('js/jquery.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		{{ HTML::style('css/bootstrap.css') }}
	</head>
	<body>
		<div id="top">
			@include('layouts.top')
		</div>
		<div id="container">
			@yield('content')
		</div>
		<div id="bottom">

		</div>
	</body>
</html>