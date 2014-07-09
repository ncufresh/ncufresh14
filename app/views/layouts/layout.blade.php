<html>
	<head>
		{{ HTML::script('js/jquery/jquery.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		{{ HTML::script('js/jquery.rest.min.js') }}
		{{ HTML::script('js/jquery/jquery-ui-1.10.4.min.js') }}
		{{ HTML::style('css/bootstrap.min.css') }}

		{{ HTML::style('css/layout.css') }}

		@yield('js_css')
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
		<script>
		// var children = document.createElement("li");
		// var element = document.getElementById("leftlist");
		// element.appendChild(children);
		</script>
	</body>
</html>