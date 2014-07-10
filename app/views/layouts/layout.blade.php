<html>
	<head>
		{{ HTML::script('js/jquery/jquery.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		{{ HTML::script('js/jquery.rest.min.js') }}
		{{ HTML::script('js/jquery/jquery-ui-1.10.4.min.js') }}
		{{ HTML::script('ckeditor/ckeditor.js') }}
		{{ HTML::style('css/bootstrap.min.css') }}

		{{ HTML::style('css/layout.css') }}

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-10121863-1', 'auto');
			ga('send', 'pageview');

		</script>
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
	</body>
</html>