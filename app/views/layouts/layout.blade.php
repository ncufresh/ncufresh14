<html>
	<head>
		{{ HTML::script('js/jquery.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		{{ HTML::style('css/bootstrap.min.css') }}

		{{ HTML::style('css/layout.css') }}
	</head>
	<body>
		<div id="globalContainer" class="container">
			<div id="topContainer" class="testY">
				@include('layouts.top')
			</div>
			<div id="container" class="container">
				@yield('content')
			</div>
			<div id="bottomContainer" class="container testG">
				Bottom!
			</div>
		</div>
	</body>
</html>