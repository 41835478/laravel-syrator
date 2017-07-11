@extends('mobile._layout._layer_nonav')

@section('head_style')
@parent
<style>
body {
	background:url('{{ _asset('assets/syrator/wap/images/member/login_bg.png') }}');
	background-size:cover;
}
.mui-content {
    width: 92%;
	margin-left: 4%;
	margin-right: 4%;	
	margin-top: 30%;
	background: transparent;
}
#mine-head-img {
    height: 60px; 
    width: 60px;
	position:absolute;
	left:50%;
	margin-left:-30px;
}
.mui-input-row .mui-input-clear ~ .mui-icon-clear {
    right: 15%;
}
.mui-input-group:before {
    background-color: transparent;	
}
.mui-input-group:after {
    background-color: transparent;	
}
.mui-input-group .mui-input-row:after {
    background-color: transparent;
}
.mui-input-row label~input {
	width: 70%;
	height: 30px;
	border-radius: 6px;
	margin-top: 5px;
	padding: 5px;
	-webkit-box-shadow: 0 0 0 1000px rgba(255, 255, 255, 1) inset !important;	
}
.mui-input-row a {
	padding: 10px;
	font-size: 14px;
	color: #ffffff;
}

#login {
	margin-top: 25px;	
	background: #1AAE8C; 
	border: none; 
	padding: 10px; 
	border-radius: 6px;
	width:70%;
	position:absolute;
	left:50%;
	margin-left:-35%;	
}
</style>
@stop

@section('content')
<div class="mui-content">
	<form method="post" action="{{ site_url('member/auth/login', 'mobile') }}">
		{{ csrf_field() }}
    	<div class="mui-input-row" style="height:100px; width:100%;">
    		<img id="mine-head-img" src="{{ _asset('assets/syrator/wap/images/logo_default.png') }}">
    	</div>
    	<div class="mui-input-row">		
    		<label style="width: 15%;">
    			<img style="width: 15px; height: 20px;" src="{{ _asset('assets/syrator/wap/images/member/login_icon_yh.png') }}">
    		</label>
    		<label style="width: 15%; float:right;">
    			<img style="width: 18px; height: 18px;" src="{{ _asset('assets/syrator/wap/images/member/login_cor.png') }}">
    		</label>
    		<input id='phone' name="phone" type="tel" class="mui-input-clear mui-input" placeholder="请输入账号">
    	</div>
    	<div class="mui-input-row">
    		<label style="width: 15%;">
    			<img style="width: 15px; height: 20px;" src="{{ _asset('assets/syrator/wap/images/member/login_icon_sd.png') }}">
    		</label>
    		<label style="width: 15%; float:right;">
    			<img style="width: 18px; height: 18px;" src="{{ _asset('assets/syrator/wap/images/member/login_fau.png') }}">
    		</label>
    		<input id='password' type="password" name="password" class="mui-input-clear mui-input" placeholder="请输入密码">
    	</div>			
    	<div class="mui-input-row">
    		<a id='forgetPassword' style="float:left;margin-left:15%;" href="{{ url('/mobile/member/auth/resetpassword') }}">忘记密码</a>
    		<a id='register' style="float:right;margin-right:15%;" href="{{ url('/mobile/member/auth/register') }}">注册账号</a>
    	</div>
    	<div class="mui-input-row" style="height:80px; width:100%;">
    		<button id='login' type="submit" class="mui-btn mui-btn-block mui-btn-primary">登录</button>
    	</div>
    	<div class="mui-input-row" style="width:100%; height:30px; line-height:30px; text-align:center;">
    		<label style="width: 25%; height: 1px; line-height:1px; background:#ffffff; padding: 0px; margin-top:15px; margin-left:10%;"></label>
    		<label style="width: 25%; float:right; height: 1px; line-height:1px; background:#ffffff; padding: 0px; margin-top:15px; margin-right:10%;"></label>
    		<label style="width: 30%; font-size: 12px; color: #ffffff; letter-spacing:2px;">快速登陆</label>
    	</div>
    	<div class="mui-input-row" style="width:100%; height:100px; text-align:center; margin-top: 15px;">
    		<label style="width: 28%; margin-left:8%;">
    			<img style="width: 30px;" src="{{ _asset('assets/syrator/wap/images/member/login_btn_qq.png') }}">
    		</label>
    		<label style="width: 28%;">
    			<img style="width: 40px;" src="{{ _asset('assets/syrator/wap/images/member/login_btn_wb.png') }}">
    		</label>
    		<label style="width: 28%; margin-right:8%;">
    			<img style="width: 40px;" src="{{ _asset('assets/syrator/wap/images/member/login_btn_wx.png') }}">
    		</label>
    	</div>
	</form>
</div>
@stop

@section('afterBody') 
@parent
<script src="{{ _asset('assets/syrator/wap/js/mui.enterfocus.js') }}"></script>

@if (count($errors) > 0)
<script>
mui.alert('{!! $errors->first('attempt') !!}');
</script>
@endif

@stop