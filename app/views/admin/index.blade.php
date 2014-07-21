@extends('layouts.layout')

@section('js_css')
	{{ HTML::script('js/admin.js') }}

@stop

@section('content')
	<div id="admin-functions">
		@if(Auth::user()->can('manage_editor'))
			<div class="functions-block">
				<h3>編輯文案</h3>
				<a href="{{ route('nculife.data') }}"><button id="admin-link">中大生活文章管理</button></a>
				<a href="{{ route('necessity.necessity_backstage_freshman') }}"><button id="admin-link">新生必讀(大學部)文章管理</button></a>
				<a href="{{ route('necessity.necessity_backstage_research') }}"><button id="admin-link">新生必讀(研究生)文章管理</button></a>
				<a href="{{ route('necessity.necessity_backstage_download') }}"><button id="admin-link">新生必讀(檔案區)文章管理</button></a>
				<a href="{{ route('SchoolGuide.list') }}"><button id="admin-link">校園導覽文章管理</button></a>
				<a href="{{ route('admin.poweredit.index') }}"><button id="admin-link">小遊戲能量補給站管理</button></a>
				<a href="{{ route('admin.campusedit.index') }}"><button id="admin-link">小遊戲命運之輪管理</button></a>
			</div>
		@endif
{{-- manage_link manage_announcement manage_calender --}}

		<div class="functions-block">
			<h3>編輯東西</h3>
			@if(Auth::user()->can('manage_announcement'))
				<a href="{{ route('admin.announcement.index') }}"><button id="admin-announcement">公告管理</button></a>
			@endif
			@if(Auth::user()->can('manage_link'))
				<a href="{{ route('admin.link.index') }}"><button id="admin-link">友站連結管理</button></a>
			@endif
			@if(Auth::user()->can('manage_calender'))
				<a href="{{ route('admin.calender.index') }}"><button id="admin-link">行事曆管理</button></a>
			@endif

		</div>

		@if(Auth::user()->can('manage_users'))
		<div class="functions-block">
			<h3>危險管理區</h3>
			<a href="{{ route('admin.group') }}"><button id="admin-user">群組管理</button></a>
			<a href="{{ route('admin.users') }}"><button id="admin-user">會員管理</button></a>
			<a href="{{ route('admin.runGitPull') }}" id="admin-git"><button id="admin-user">執行git pull(超級危險)</button></a>

		</div>
		@endif


	</div>

@stop