@extends('mobile._layout._layer_nonav')

@section('head_style')
@parent
<style>
.mui-input-group {
	margin-top: 10px;
}
.mui-input-group:first-child {
	margin-top: 20px;
}
.mui-input-group label {
	width: 30%;
}
.mui-input-row label~input,
.mui-input-row label~select,
.mui-input-row label~textarea {
	width: 70%;
	margin-top: 1px;
	-webkit-box-shadow: 0 0 0 1000px rgba(255, 255, 255, 1) inset !important;	
}
.mui-checkbox input[type=checkbox],
.mui-radio input[type=radio] {
	top: 6px;
}
.mui-content-padded {
	margin-top: 25px;
}
.mui-btn {
	padding: 10px;
}
.link-area {
	display: block;
	margin-top: 25px;
	text-align: center;
}
.spliter {
	color: #bbb;
	padding: 0px 8px;
}
.oauth-area {
	position: absolute;
	bottom: 20px;
	left: 0px;
	text-align: center;
	width: 100%;
	padding: 0px;
	margin: 0px;
}
.oauth-area .oauth-btn {
	display: inline-block;
	width: 50px;
	height: 50px;
	background-size: 30px 30px;
	background-position: center center;
	background-repeat: no-repeat;
	margin: 0px 20px;
	/*-webkit-filter: grayscale(100%); */
	border: solid 1px #ddd;
	border-radius: 25px;
}
.oauth-area .oauth-btn:active {
	border: solid 1px #aaa;
}
.oauth-area .oauth-btn.disabled {
	background-color: #ddd;
}
</style>
@stop

@section('content')
<header class="mui-bar mui-bar-nav" style="background: #60D4AB;">
	<h1 class="mui-title" style="color:#ffffff;">登录</h1>
</header>
<div class="mui-content">
	<form id='login-form' class="mui-input-group">
		<div class="mui-input-row">
			<label>手&nbsp;&nbsp;机</label>
			<input id='phone' type="tel" class="mui-input-clear mui-input" placeholder="请输入账号">
		</div>
		<div class="mui-input-row">
			<label>密&nbsp;&nbsp;码</label>
			<input id='password' type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
		</div>
	</form>
	<div class="mui-content-padded">
		<button id='login' class="mui-btn mui-btn-block mui-btn-primary" style="background: #60D4AB; border: none;" onClick="doLogin();">登录</button>
		<div class="link-area">
			<a id='reg' href="{{ url('/mobile/member/register') }}">注册账号</a> <span class="spliter">|</span>
			<a id='forgetPassword' href="{{ url('/mobile/member/resetpassword') }}">忘记密码</a>
		</div>
	</div>
	<div class="mui-content-padded oauth-area">

	</div>
</div>
@stop

@section('afterBody') 
@parent
<script src="{{ _asset('wapstyle/js/mui.enterfocus.js') }}"></script>
<script>
function doLogin() {
	var phoneBox = document.getElementById('phone');
	var passwordBox = document.getElementById('password');

	$.ajax({
		type:'post',
		url:'/api/member/login',
		data: {
			_token:$('meta[name="_token"]').attr('content'),
			account:phoneBox.value,
			password:passwordBox.value
    	}, 
		dataType:'json',
		async:true,
		success:function(data) {
			var code = data['code'];
			if(code === "200") {
	    		mui.openWindow({
	    			url: "{{ site_url('index', 'mobile') }}",
	    			id: "index",
	    		});
				return;
			} 

			if(code === "500") {
				mui.alert("系统错误");
				mui.back();
			} else {
				mui.alert(data['description']);
			}
		}
	});
}
</script>
@stop