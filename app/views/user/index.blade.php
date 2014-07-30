@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/user.css') }}
	{{-- HTML::script('js/index.js') --}}
@stop

@section('content')
<div id="user-container">
	<div id="user-top">
		<div id="user-left">
			<div id="user-img"><img src="{{ route('personface', array('id' => $user->id)) }}"> </div>
			@if(Auth::check() && Auth::user()->id == $user->id && $user->getFacebookData == NULL)
				<a href="{{ route('login.FB') }}"><div id="link-fb" class="user-data-link"></div></a>
			@elseif($user->getFacebookData != NULL)
				<a href="http://www.facebook.com/{{ $user->getFacebookData->uid }}"><div id="to-fb" class="user-data-link"></div></a>
			@endif
		</div>
		<div id="user-right">
			<div id="user-data">
				<div class="user-data" id="user-data-name"><img src="{{ asset('images/user/user-data-name.png') }}">{{ $user->name }}</div>
				<div class="user-data" id="user-data-department"><img src="{{ asset('images/user/user-data-department.png') }}">{{ $user->department->department_name }}{{ $user->grade }}</div>
				<div class="user-data" id="user-data-high-school"><img src="{{ asset('images/user/user-data-highschool.png') }}">{{ $user->highSchool->high_school_name }}</div>
				<div class="user-data" id="user-data-email"><img src="{{ asset('images/user/user-data-email.png') }}">{{ $user->email }}</div>
			</div>
		</div>
		<a href="{{ route('game') }}"><div id="bottom-game"></div></a>
	</div>
	
</div>
@stop