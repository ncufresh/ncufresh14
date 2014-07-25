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
		{{ HTML::script('js/jquery/pace.min.js') }}
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/jquery.jscrollpane.css') }}
		{{ HTML::style('css/jquery-ui.min.css') }}
		{{ HTML::style('css/pace.css') }}

		{{ HTML::style('css/layout.css') }}
		
		{{-- HTML::script('js/layout/robot.js') --}}

		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!--[if IE 8]>
		{{ HTML::style('css/ie.css') }}
		<![endif]-->
		<!--[if IE 9]>
		{{ HTML::style('css/ie9.css') }}
		<![endif]-->
		@if(BrowserDetect::isIE())
			{{ HTML::style('css/ie9.css') }}
		@endif

		@if(Request::server('SERVER_IP') == '140.115.184.136' && Config::get('app.debug') == false)
			{{ HTML::script('js/ga.js') }}
		@endif

		@yield('js_css')


		@if(Session::has('alert-message'))
			<script>
				$(function(){
					$.alertMessage('{{ Session::get('alert-message') }}');
				});
			</script>
		@endif
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
					</div>
				</div>
			</div>
		</div>
		@if(BrowserDetect::isIE())
			<div id="ie-warning">請使用Chrome.Firefox以獲得更佳的瀏覽體驗</div>
		@endif
		<div id="globalContainer" class="container">
			<div id="topContainer">
				@include('layouts.top')
			</div>
			{{-- Site Map --}}

			<ol id="siteMapContainer" class="breadcrumb">
				@foreach(App::make('SiteMap')->getData() as $item)
				<li class="site_map_item"><a href="{{ $item['url'] }}">{{ $item['name'] }}</a></li>
				@endforeach
			</ol>

			<div id="container" class="container">
				@yield('content')
			</div>
			<div id="bottomContainer" class="container">
				<p>主辦單位：國立中央大學學務處　承辦單位：諮商中心　執行單位：2014大一生活知訊網工作團隊</p>
				<p>地址：32001桃園縣中壢市五權里2鄰中大路300號 | 電話：(03)422-7151#57261 | 版權所有：2014大一生活知訊網工作團隊</p>
			</div>
			@if(Entrust::can('manage_editor'))
				<a style="color:green; font-size: 2em" href="{{ route('dashboard') }}">點我進入後台喔~~~~</a>
			@endif
		</div>
		<a href="{{ route('necessity.necessity_index') }}"><div id="freshButton"></div></a>
		@include('layouts.chatroom')
	</body>
</html>
