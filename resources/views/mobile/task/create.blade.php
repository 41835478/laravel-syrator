@extends('mobile._layout._layer_nonav') 

@section('html_attr') class="feedback" @stop

@section('head_css')
@parent
<link href="{{ _asset('assets/metronic/default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/syrator/wap/css/feedback.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('head_style')
@parent
<style>
h5,lable {
	margin: 5px 7px;
}
input,textarea {    
	font-size: 12px;
    font-weight: 400;
}
input {    
	width:80%;	
}
.mui-input-row {
    margin: 10px auto auto;
    overflow: hidden;
    width: 96%;	
}
.feedback .image-item {
	background-image: url({{ _asset('assets/syrator/wap/images/iconfont-tianjia.png') }});
}
</style>
@stop

@section('beforeBody')
<header class="mui-bar mui-bar-nav" style="background: #60D4AB;">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title" style="color: #ffffff; font-weight:bold;">发布需求</h1>
</header>
@stop

@section('content')
<div class="mui-content">
	<div class="mui-content-padded" style="margin: 2px;">	
    	<form>
    		<div class="mui-input-row">
        		<dl>
					<dt style="text-align: center;">所在城市：</dt>
            		<dd>
    					<input type="text" class="mui-input-clear" placeholder="选择您所在的地区">
            		</dd>
            		<lable>(*必填)</lable>
        		</dl>
        	</div>
    		<div class="mui-input-row">
        		<dl>
					<dt style="text-align: center;">您的称呼：</dt>
            		<dd>
    					<input type="text" class="mui-input-clear" placeholder="请输入您的称呼">
            		</dd>
            		<lable>(*必填)</lable>
        		</dl>
        	</div>
    		<div class="mui-input-row">
        		<dl>
					<dt style="text-align: center;">手机号码：</dt>
            		<dd>
    					<input type="text" class="mui-input-clear" placeholder="请输入您的手机号码">
            		</dd>
            		<lable>(*必填)</lable>
        		</dl>
        	</div>
    		<div class="mui-input-row">
        		<dl>
					<dt style="text-align: center;"><button type="button" class="mui-btn-danger">获取验证码</button></dt>
            		<dd>
    					<input type="text" class="mui-input-clear" placeholder="手机验证码">
            		</dd>
            		<lable>(*必填)</lable>
        		</dl>
        	</div>
    		<div class="mui-input-row">
        		<dl>
					<dt style="text-align: center;">面积：</dt>
            		<dd>
    					<input type="text" class="mui-input-clear" placeholder="请输入您的装修面积">
            		</dd>
            		<lable>(㎡)</lable>
        		</dl>
        	</div>
    		<div class="mui-input-row">
        		<dl>
					<dt style="text-align: center;">预算：</dt>
            		<dd>
    					<input type="text" class="mui-input-clear" placeholder="请输入您的装修预算（/元）">
            		</dd>
            		<lable>(元)</lable>
        		</dl>
        	</div>
    		<div class="mui-input-row">
        		<dl>
					<dt style="text-align: center;">发布给：</dt>
            		<dd>
    					<input type="text" class="mui-input-clear" placeholder="">
            		</dd>
            		<lable>(*必填)</lable>
        		</dl>
        	</div>
    		<div class="mui-input-row">
        		<dl>
					<dt style="text-align: center;">截止时间：</dt>
            		<dd>
						<button type="button" id='result' data-options='{"type":"date"}' class="btn mui-btn-block">选择日期 ...</button>
            		</dd>
            		<lable>(*必填)</lable>
        		</dl>
        	</div>
    		<div class="mui-input-row" style="height:85px;">
        		<dl style="height:85px;">
					<dt style="text-align: center;">要求：</dt>
            		<dd>
        				<textarea id="textarea" rows="3" placeholder="要求描述"></textarea>
            		</dd>
        		</dl>
        	</div>
        	<p style="margin-top: 10px; font-size: 12px; color: #8f8f94;">图片(选填,提供问题截图,总大小10M以下)</p>
        	<div id='image-list' class="row image-list"></div>
        	
    		<div class="mui-button-row" style="margin-top:1px;">
    			<button type="button" id="submit" class="mui-btn mui-btn-primary" onclick="return false;">确定发布</button>
    		</div>
    	</form>
    </div>
</div>
@stop

@section('afterBody')
@parent
<script src="{{ _asset('assets/syrator/wap/js/mui.view.js') }}"></script>
<script src="{{ _asset('assets/syrator/wap/libs/easymob-webim-sdk/jquery-1.11.1.js') }}"></script>
<script src="{{ _asset('assets/syrator/wap/libs/easymob-webim-sdk/strophe-custom-2.0.0.js') }}"></script>
<script src="{{ _asset('assets/syrator/wap/libs/easymob-webim-sdk/json2.js') }}"></script>
<script src="{{ _asset('assets/syrator/wap/libs/easymob-webim-sdk/easemob.im-1.0.5.js') }}"></script>
<script src="{{ _asset('assets/syrator/wap/js/feedback.js') }}"></script>
<script src="{{ _asset('assets/syrator/wap/js/feedback-page.js') }}"></script>
<script src="{{ _asset('assets/syrator/wap/js/mui.picker.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
(function($) {
	$.init();
	var result = $('#result')[0];
	var btns = $('.btn');
	btns.each(function(i, btn) {
		btn.addEventListener('tap', function() {
			var optionsJson = this.getAttribute('data-options') || '{}';
			var options = JSON.parse(optionsJson);
			var picker = new $.DtPicker(options);
			picker.show(function(rs) {
				result.innerText = rs.text;
				picker.dispose();
			});
		}, false);
	});
})(mui);
</script>
@stop
