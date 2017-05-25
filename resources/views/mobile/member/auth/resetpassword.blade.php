@extends('mobile._layout._layer_nonav')

@section('head_style')
@parent
<style>
body {
	background:url('{{ _asset('wapstyle/images/member/login_bg.png') }}');
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
.mui-bar-nav {
    background-color:transparent;
    -webkit-box-shadow: 0 0px 0px transparent;
    box-shadow: 0 0px 0px transparent;
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
.mui-input-row input {
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

#register {
	margin-top: 15px;	
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
<header class="mui-bar mui-bar-nav" style="">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
</header>
<div class="mui-content" style="padding-top: 0px;">
	<div class="mui-input-row" style="height:100px; width:100%;">
		<img id="mine-head-img" src="{{ _asset('wapstyle/images/logo_default.png') }}">
	</div>
	<div class="mui-input-row">
		<label style="width: 15%;">
			<img style="width: 15px; height: 20px;" src="{{ _asset('wapstyle/images/member/login_icon_sd.png') }}">
		</label>
		<label style="width: 15%; float:right;">
			<img style="width: 18px; height: 18px;" src="{{ _asset('wapstyle/images/member/login_fau.png') }}">
		</label>
		<input id='password' type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
	</div>
	<div class="mui-input-row">
		<label style="width: 15%;">
			<img style="width: 15px; height: 20px;" src="{{ _asset('wapstyle/images/member/login_icon_sd.png') }}">
		</label>
		<label style="width: 15%; float:right;">
			<img style="width: 18px; height: 18px;" src="{{ _asset('wapstyle/images/member/login_fau.png') }}">
		</label>
		<input id='password_confirm' type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
	</div>
	<div class="mui-input-row">		
		<label style="width: 15%;">
			<img style="width: 15px; height: 20px;" src="{{ _asset('wapstyle/images/member/login_icon_yh.png') }}">
		</label>
		<label style="width: 15%; float:right;">
			<img style="width: 18px; height: 18px;" src="{{ _asset('wapstyle/images/member/login_cor.png') }}">
		</label>
		<input id='phone' type="tel" class="mui-input-clear mui-input" placeholder="请输入手机号">
	</div>
	<div class="mui-input-row" style="height:40px; width:100%;margin-top:20px;">
		<input id='vcode' type="text" class="mui-input-clear mui-input" placeholder="请输入验证码" style="float:left; width: 40%; margin-left:8%;">
		<button type="button" class="mui-btn-danger" style="margin-top:5px; height: 30px;width: 40%; float:right; margin-right:8%; background: #1AAE8C; border: none;" onClick="doVerifyCode();">获取验证码</button>
		<span class="mui-icon mui-icon-clear mui-hidden" style="right: 50%"></span>
	</div>
	<div class="mui-input-row" style="height:80px; width:100%;">
		<button id='register' class="mui-btn mui-btn-block mui-btn-primary" style="background: #1AAE8C; border: none;" onClick="doResetPassword();">确认修改</button>
	</div>
</div>
@stop

@section('afterBody') 
@parent
<script>
var vCode = "";
function doVerifyCode() {
	var phoneBox = document.getElementById('phone');
	if (!validateMobile(phoneBox.value)) {
		mui.alert("请输入正确的手机号");
		return;
	}

	$.ajax({
		type:'post',
		url:'/api/member/sendverifycode',
		data: {
			_token:$('meta[name="_token"]').attr('content'),
			phone:phoneBox.value,
			type:'resetpassword'
    	}, 
		dataType:'json',
		async:true,
		success:function(data) {
			var code = data['code'];
			var resData = data['data'];
			if(code === "200") {
				mui.alert("验证码短信发送成功");
				vCode = resData['vcode'];
				return;
			} 

			if(code === "500") {
				mui.alert("系统错误");
				return;
			} else {
				mui.alert(data['description']);
				return;
			}
		}
	});
}

function doValidateVerifyCode() {
	var phoneBox = document.getElementById('phone');
	var vcodeBox = document.getElementById('vcode');
	if (!validateMobile(phoneBox.value)) {
		mui.alert("请输入正确的手机号");
		return;
	}

	if (isEmpty(vcodeBox.value)) {
		mui.alert("验证码不能为空");
		return;
	}

	$.ajax({
		type:'post',
		url:'/api/member/validateverifycode',
		data: {
			_token:$('meta[name="_token"]').attr('content'),
			phone:phoneBox.value,
			vcode:vcodeBox.value,
			type:'resetpassword'
    	}, 
		dataType:'json',
		async:true,
		success:function(data) {
			var code = data['code'];
			if(code === "200") {
				return;
			} 

			if(code === "500") {
				var btnArray = ['确定'];
				mui.confirm('系统错误', '蚂蚁帮帮', btnArray, function(e) {
					if (e.index == 0) {
						mui.back();
					} 
				});
				return;
			} else {
				var btnArray = ['确定'];
				mui.confirm(data['description'], '蚂蚁帮帮', btnArray, function(e) {
					if (e.index == 0) {
						mui.back();
					} 
				});
				return;
			}
		}
	});
}

function doResetPassword() {
	var phoneBox = document.getElementById('phone');
	var passwordBox = document.getElementById('password');
	var passwordConfirmBox = document.getElementById('password_confirm');
	var vcodeBox = document.getElementById('vcode');
	if (!validateMobile(phoneBox.value)) {
		mui.alert("请输入正确的手机号");
		return;
	}

	if (isEmpty(passwordBox.value)) {
		mui.alert("密码不能为空");
		return;
	}
	
	if (passwordBox.value!==passwordConfirmBox.value) {
		mui.alert("两次输入的密码不相同");
		return;
	}

	if (isEmpty(vcodeBox.value)) {
		mui.alert("验证码不能为空");
		return;
	}

	$.ajax({
		type:'post',
		url:'/api/member/resetpassword',
		data: {
			_token:$('meta[name="_token"]').attr('content'),
			phone:phoneBox.value,
			password:passwordBox.value,
			vcode:vcodeBox.value
    	}, 
		dataType:'json',
		async:true,
		success:function(data) {
			var code = data['code'];
			if(code === "200") {
				var btnArray = ['确定'];
				mui.confirm('恭喜您重置秘密成功', '蚂蚁帮帮', btnArray, function(e) {
					if (e.index == 0) {
						mui.openWindow({
			    			url: "{{ site_url('index', 'mobile') }}",
			    			id: "index",
			    		});
					} 
				});
	    		
				return;
			} 

			if(code === "500") {
				mui.alert("系统错误");
				return;
			} else {
				mui.alert(data['description']);
				return;
			}
		}
	});
}
</script>
@stop