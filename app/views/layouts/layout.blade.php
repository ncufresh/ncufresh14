<html>
	<head>
		{{ HTML::script('js/jquery/jquery.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		{{-- HTML::script('js/jquery.rest.min.js') --}}
		{{ HTML::script('js/jquery/jquery-ui-1.10.4.min.js') }}
		{{ HTML::script('js/jquery/jquery.jscrollpane.min.js') }}
		{{ HTML::script('js/jquery/jquery.mousewheel.min.js') }}
		{{ HTML::script('js/jquery/mwheelIntent.js') }}
		{{ HTML::script('js/jquery/brain-socket.min.js') }}
		{{ HTML::script('js/jquery/jquery.timer.js') }}
		{{ HTML::script('ckeditor/ckeditor.js') }}
		{{ HTML::script('js/main.js') }}
		{{ HTML::script('js/layout/chatroom.js') }}
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/jquery.jscrollpane.css') }}

		{{ HTML::style('css/layout.css') }}

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			@if(Request::server('SERVER_IP') == '140.115.184.136')

			ga('create', 'UA-10121863-1', 'auto');
			ga('send', 'pageview');
			@endif
		</script>

		@yield('js_css')
	</head>
	<body data-user_id="@if(Auth::check()){{Auth::user()->id}}@else0@endif">
		{{-- Transfer Data Section --}}
		<div class="hidden" id="data_section"
			@foreach(App::make('TransferData')->getData() as $key=>$item)
				data-{{ $key }}="{{ $item }}"
			@endforeach
		></div>
		{{-- Jump Window's Modal--}}
		<div id="alert-messages"></div>
			<div class="modal fade" id="jump-window" tabindex="-1" role="dialog" aria-labelledby="jump-window-modal" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="jump-window-head">Head</h4>
						</div>
						<div class="modal-body" id="jump-window-body">

						</div>
						<div class="modal-footer">
							<div id="jump-window-footer"></div>
							<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
<!--							<button type="button" class="btn btn-primary">Save changes</button>-->
						</div>
					</div>
				</div>
			</div>
		<div id="globalContainer" class="container">
			<div id="topContainer" class="testY">
				@include('layouts.top')
			</div>
			{{-- Site Map --}}

			<ol class="breadcrumb">
				@foreach(App::make('SiteMap')->getData() as $item)
				<li class="site_map_item"><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
				@endforeach
			</ol>

			<div id="container" class="container">
				@yield('content')
			</div>
			<div id="bottomContainer" class="container testG">
				<p>Bottom!</p>
			</div>
		</div>

		@include('layouts.chatroom')
	</body>
</html>