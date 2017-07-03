@extends('_layout._login')

@section('head_css')
@parent
@stop

@section('body_attr') class="login" @stop

@section('content-footer')
@parent
@include('admin._widgets._login-footer')
@stop

@section('content')
<div class="logo">
	<img src="" alt="" /> 
</div>
<div class="logo">
    <a href="{{ site_url('', '') }}">
        <img src="{{ _asset('assets/metronic/pages/img/logo-big.png') }}" alt="" /> 
    </a>
</div>
<div class="content">
	<form class="form-vertical login-form" method="post" action="{{ site_url('auth/login', 'admin') }}">
		{{ csrf_field() }}
		<h3 class="form-title" style="text-align: center">登录后台管理系统</h3>
		@if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h4><i class="icon fa fa-ban"></i> 警告!</h4>
            <p>{!! $errors->first('attempt') !!}</p>
        </div>
        @endif
		<div class="alert alert-error hide">
			<button class="close" data-dismiss="alert"></button>
			<span>请输入用户名和密码</span>
		</div>
		<div class="control-group">
			<label class="control-label visible-ie8 visible-ie9">用户名</label>
			<div class="controls">
				<div class="input-icon left">
					<i class="icon-user"></i>
					<input class="m-wrap placeholder-no-fix" type="text" placeholder="用户名" name="username"/>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label visible-ie8 visible-ie9">密码</label>
			<div class="controls">
				<div class="input-icon left">
					<i class="icon-lock"></i>
					<input class="m-wrap placeholder-no-fix" type="password" placeholder="密码" name="password"/>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> 记住我
			</label>
			<button type="submit" class="btn green pull-right">
			登录 <i class="m-icon-swapright m-icon-white"></i>
			</button>            
		</div>
		<div class="forget-password">
			<h4>忘记密码 ?</h4>
			<p>
				不必担心, 点击 <a href="javascript:;" class="" id="forget-password">这里</a>
				重置您的密码.
			</p>
		</div>
		<div class="create-account">
			<p>
				尚未账号 ?&nbsp; 
				<a href="javascript:;" id="register-btn" class="">现在就去注册</a>
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