@extends('layouts.layout')

@section('js_css')
	{{ HTML::style('css/register.css') }}
	{{ HTML::script('js/register.js') }}
@stop

@section('content')

	<div id="register-content">

	<div id="choose">
		<div id="register-mid"><!--<img src="{{ asset('images/register/choose_mid.png') }}"/>--></div>
		<div id="register-left"><a href="{{ route('login.FB') }}"></a></div>
		<div id="register-right"></div>
	</div>

	<div id="normal">
		<div id="normal-data">
			{{ Form::open(array('route' => 'register.store', 'class' => 'form-horizontal')) }}
				{{ $errors }}
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">姓名</label>
					<div class="col-sm-5">
						{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => '請輸入姓名')) }}
					</div>
				</div>

				<div class="form-group">
					<label for="gender" class="col-sm-3 control-label">性別</label>
					<div class="col-sm-5">
						{{ Form::radio('gender', '1') }} 男
						{{ Form::radio('gender', '0') }} 女
					</div>
				</div>
				<div class="form-group">
					<label for="high_school" class="col-sm-3 control-label">畢業高中</label>
					<div class="col-sm-5">
						{{ Form::text('high_school', null, array('class' => 'form-control', 'placeholder' => '請輸入畢業高中')) }}
					</div>
				</div>

				<div class="form-group">
					<label for="depaetment_id" class="col-sm-3 control-label">系所</label>
					<div class="col-sm-5">
						{{ Form::select('department_id', $departments, array('class' => 'form-control', 'placeholder' => '請輸入系所')) }}
					</div>
				</div>

				<div class="form-group">
					<label for="grade" class="col-sm-3 control-label">年級</label>
					<div class="col-sm-5">
						{{ Form::selectRange('grade', 1, 4, array('class' => 'form-control', 'placeholder' => '請選擇年級')) }}
					</div>
				</div>


				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">帳號</label>
					<div class="col-sm-5">
						{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => '請輸入帳號(電子信箱)')) }}
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">密碼</label>
					<div class="col-sm-5">
						{{ Form::password('password', array('class' => 'form-control', 'placeholder' => '請輸入密碼')) }}
					</div>
				</div>

				<div class="form-group">
					<label for="re_password" class="col-sm-3 control-label">再輸入一次密碼</label>
					<div class="col-sm-5">
						{{ Form::password('re_password', array('class' => 'form-control', 'placeholder' => '請輸入密碼')) }}
					</div>
				</div>

				<input type="reset" id="normal-reset" value="">
				<input type="submit" id="normal-submit" value="">

			{{ Form::close() }}
		</div>
	</div>

	@if($type == 'FB')

	<div id="fb">
		<div id="fb-data">
			{{ Form::open(array('route' => 'register.store', 'class' => 'form-horizontal')) }}
				{{ Form::hidden('facebook-uid', Auth::user()->getFacebookData->uid) }}
				{{ Form::hidden('email', Auth::user()->email) }}
				{{ Form::hidden('department_id', Auth::user()->department_id) }}
				<div class="form-group">
					<label for="high_school" class="col-sm-3 control-label">畢業高中</label>
					<div class="col-sm-5">
						{{ Form::text('high_school', null, array('class' => 'form-control', 'placeholder' => '請輸入畢業高中')) }}
					</div>
				</div>

				<div class="form-group">
					<label for="department_id" class="col-sm-3 control-label">系所</label>
					<div class="col-sm-5">
						{{ Form::select('department_id', $departments, array('class' => 'form-control', 'placeholder' => '請輸入系所')) }}
					</div>
				</div>

				<div class="form-group">
					<label for="grade" class="col-sm-3 control-label">年級</label>
					<div class="col-sm-5">
						{{ Form::selectRange('grade', 1, 4, array('class' => 'form-control', 'placeholder' => '請選擇年級')) }}
					</div>
				</div>

				<input type="reset" id="fb-reset" value="">
				<input type="submit" id="fb-submit" value="">

			{{ Form::close() }}
		</div>
	</div>

	@endif
	</div>

@stop
