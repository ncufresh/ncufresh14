<html>
	<head>
		{{ HTML::script('js/jquery.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		{{ HTML::script('js/jquery.rest.min.js') }}
		{{ HTML::style('css/bootstrap.min.css') }}

		{{ HTML::style('css/layout.css') }}

		@yield('css_js')
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
				<p>Bottom!</p>
			</div>
		</div>
	</body>
</html>