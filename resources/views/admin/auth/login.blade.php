@extends('_layout._common')

@section('head_css')
@parent
<link href="{{ _asset('assets/metronic/css/login.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('body_attr') class="login" @stop

@section('content-footer')
@parent
@include('admin._widgets._main-footer')
@stop

@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> 警告!</h4>
    <p>{!! $errors->first('attempt') !!}</p>
</div>
@endif
<div class="logo">
	<img src="{{ _asset('assets/metronic/image/logo-big.png') }}" alt="" /> 
</div>
<div class="content">
	<form class="form-vertical login-form" method="post" action="{{ site_url('auth/login', 'admin') }}">
		{{ csrf_field() }}
		<h3 class="form-title">Login to your account</h3>
		<div class="alert alert-error hide">
			<button class="close" data-dismiss="alert"></button>
			<span>Enter any username and password.</span>
		</div>
		<div class="control-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="controls">
				<div class="input-icon left">
					<i class="icon-user"></i>
					<input class="m-wrap placeholder-no-fix" type="text" placeholder="username" name="username"/>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="controls">
				<div class="input-icon left">
					<i class="icon-lock"></i>
					<input class="m-wrap placeholder-no-fix" type="password" placeholder="password" name="password"/>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Remember me
			</label>
			<button type="submit" class="btn green pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>            
		</div>
		<div class="forget-password">
			<h4>Forgot your password ?</h4>
			<p>
				no worries, click <a href="javascript:;" class="" id="forget-password">here</a>
				to reset your password.
			</p>
		</div>
		<div class="create-account">
			<p>
				Don't have an account yet ?&nbsp; 
				<a href="javascript:;" id="register-btn" class="">Create an account</a>
			</p>
		</div>
	</form>
</div>
@stop

@section('extraPlugin')
@parent
<script src="{{ _asset('assets/metronic/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/js/login.js') }}" type="text/javascript"></script>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {     
  App.init();
  Login.init();
});
</script>
@stop