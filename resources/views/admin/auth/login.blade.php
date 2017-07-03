@extends('_layout._login')

@section('head_style')
@parent
<style>
.login {
    background-color: #3d3d3d!important;
}
</style>
@stop

@section('content-footer')
@parent
@include('admin._widgets._login-footer')
@stop

@section('content')
<div class="logo">
    <a href="{{ site_url('', '') }}">
        <img src="{{ _asset('assets/metronic/pages/img/logo-big.png') }}" alt="" /> 
    </a>
</div>
<div class="content">
	<form class="login-form" method="post" action="{{ site_url('auth/login', 'admin') }}">
		{{ csrf_field() }}
		<h3 class="form-title" style="text-align: center">登录后台管理系统</h3>
		@if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h4><i class="icon fa fa-ban"></i> 警告!</h4>
            <p>{!! $errors->first('attempt') !!}</p>
        </div>
        @endif
		<div class="alert alert-danger display-hide">
			<button class="close" data-dismiss="alert"></button>
			<span>请输入用户名和密码</span>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">用户名</label>
    		<div class="input-icon">
    			<i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="用户名" name="username" />
    		</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">密码</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" placeholder="密码" name="password"/>
			</div>
		</div>		
        <div class="form-actions">
            <label class="rememberme mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" /> 记住我
                <span></span>
            </label>
            <button type="submit" class="btn green pull-right"> 登录 </button>
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