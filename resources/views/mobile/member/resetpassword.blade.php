@extends('mobile._layout._layer_nonav')

@section('head_style')
@parent
<style>
.area {
	margin: 20px auto 0px auto;
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
.mui-input-row label~input, .mui-input-row label~select, .mui-input-row label~textarea{
	margin-top: 1px;
}
</style>
@stop

@section('content')
<!--页面主结构开始-->
<div id="app" class="mui-views">
	<div class="mui-view">
		<div class="mui-navbar">
		</div>
		<div class="mui-pages" style="top: 46px;height: auto;">
		</div>
	</div>
</div>
<!--页面主结构结束-->
<!--单页面开始-->
<div id="setting" class="mui-page">
	<!--页面标题栏开始-->
	<div class="mui-navbar-inner mui-bar mui-bar-nav" style="background: #60D4AB;">
		<button type="button" class="mui-left mui-action-back mui-btn mui-btn-link mui-btn-nav mui-pull-left">
			<span class="mui-icon mui-icon-left-nav"></span>返回
		</button>
		<h1 class="mui-center mui-title" style="color: #ffffff;">忘记密码-手机验证</h1>
	</div>
	<!--页面标题栏结束-->
	<!--页面主内容区开始-->
	<div class="mui-page-content">	
		<div class="mui-scroll-wrapper">
			<div class="mui-scroll">
    			<form class="mui-input-group">
            		<div class="mui-input-row">
            			<label>手机号</label>
            			<input id='phone' type="tel" class="mui-input-clear mui-input" placeholder="请输入手机号">
            		</div>  
            		<div class="mui-input-row">
            			<label>验证码</label>
            			<input id='vcode' type="text" class="mui-input-clear mui-input" placeholder="请输入验证码" style="float:left; width: 45%;">
            			<button type="button" class="mui-btn-danger" style="margin-top:4px; height: 30px;width: 23%;" onClick="doVerifyCode();">获取验证码</button>
						<span class="mui-icon mui-icon-clear mui-hidden" style="right: 25%"></span>
            		</div>  
            	</form>
            	<div class="mui-content-padded">
					<a href="#filtrate_setting" class="mui-btn mui-btn-success mui-btn-block" style="background: #60D4AB;">下一步</a>
            	</div>
			</div>
		</div>
	</div>
	<!--页面主内容区结束-->
</div>
<div id="filtrate_setting" class="mui-page">
	<div class="mui-navbar-inner mui-bar mui-bar-nav" style="background: #60D4AB;">
		<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
			<span class="mui-icon mui-icon-left-nav"></span>上一步
		</button>
		<h1 class="mui-center mui-title" style="color: #ffffff;">忘记密码-重设密码</h1>
	</div>
	<div class="mui-page-content">
		<div class="mui-scroll-wrapper">
			<div class="mui-scroll">
            	<form class="mui-input-group">
            		<div class="mui-input-row">
            			<label>新密码</label>
            			<input id='password' type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
            		</div>
            		<div class="mui-input-row">
            			<label>确&nbsp;&nbsp;&nbsp;认</label>
            			<input id='password_confirm' type="password" class="mui-input-clear mui-input" placeholder="请确认密码">
            		</div>
            	</form>				
            	<div class="mui-content-padded">
					<a class="mui-btn mui-btn-success mui-btn-block" style="background: #60D4AB;" onClick="doResetPassword();">提交</a>
            	</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('afterBody') 
@parent
<script src="{{ _asset('wapstyle/js/mui.view.js') }}"></script>
<script>
mui.init();
//初始化单页view
var viewApi = mui('#app').view({
	defaultPage: '#setting'
});
//初始化单页的区域滚动
mui('.mui-scroll-wrapper').scroll();

var view = viewApi.view;
(function($) {
	var oldBack = $.back;
	$.back = function() {
		if (viewApi.canBack()) {
			viewApi.back();
		} else {
			oldBack();
		}
	};
	view.addEventListener('pageBeforeShow', function(e) {
	});
	view.addEventListener('pageShow', function(e) {	
		if (e.detail.page.id == 'filtrate_setting') {
			doValidateVerifyCode();
		}
	});
	view.addEventListener('pageBeforeBack', function(e) {
	});
	view.addEventListener('pageBack', function(e) {	
	});
})(mui);

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