@extends('mobile._layout._layer_nonav') 

@section('body_attr') class="mui-fullscreen" @stop

@section('head_style')
@parent
<link href="{{ _asset('assets/syrator/wap/css/feedback.css') }}" rel="stylesheet" type="text/css" />
<style>
#topPopoverMenu {
	width: 70px;
	height: 100px;
}
#topPopoverMenu {
	position: fixed;
	top: 16px;
	right: 6px;
}
#topPopoverMenu .mui-popover-arrow {
	left: auto;
	right: 6px;
}

#popShare {
	width: 70px;
	height: 140px;
}
#popShare {
	position: fixed;
	top: 16px;
	right: 6px;
}
#popShare .mui-popover-arrow {
	left: auto;
	right: 6px;
}

.title-reply-count {
	float: right;
	font-size: 10px;
	margin-right: 5px;
}

.feedback .image-item {
	background-image: url({{ _asset('assets/syrator/wap/images/iconfont-tianjia.png') }});
}
.mui-slider-item img {
	height:150px;
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
		<h1 class="mui-title" style="color: #ffffff;">论坛-详情</h1>		
		<a id="menu" class="mui-action-menu mui-icon mui-icon-bars mui-pull-right" href="#topPopoverMenu"></a>
		<button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left"><span class="mui-icon mui-icon-left-nav"></span>返回</button>
	</div>
	<!--页面标题栏结束-->
	<!--页面主内容区开始-->
	<div class="mui-page-content">		
        <!--右上角弹出菜单-->
        <div id="topPopoverMenu" class="mui-popover">
        	<div class="mui-popover-arrow"></div>
        	<div class="mui-scroll-wrapper">
        		<div class="mui-scroll">
        			<ul class="mui-table-view" id="popmenu">
        				<li class="mui-table-view-cell" id="popmenu-attent"><a>关注</a></li>
        				<li class="mui-table-view-cell" id="popmenu-collect"><a>收藏</a></li>
        			</ul>
        		</div>
        	</div>
        </div>	  
        <div id="popShare" class="mui-popover">
        	<div class="mui-popover-arrow"></div>
        	<div class="mui-scroll-wrapper">
        		<div class="mui-scroll">
        			<ul class="mui-table-view" id="popshare">
        				<li class="mui-table-view-cell" id="popshare-qq"><a>QQ</a></li>
        				<li class="mui-table-view-cell" id="popshare-sina"><a>新浪</a></li>
        				<li class="mui-table-view-cell" id="popshare-weixin"><a>微信</a></li>
        			</ul>
        		</div>
        	</div>
        </div>	      
		<nav class="mui-bar mui-bar-tab">
			<a style="width:80%;" class="mui-tab-item mui-active" href="#pageReply">
				<input style="width:96%;margin-bottom: 0px;" type="tel" class="mui-input-clear mui-input" placeholder="写跟贴">
			</a>
			<a style="width:20%;" class="mui-tab-item" href="#popShare">
				<span class="mui-icon mui-icon-redo"></span>
			</a>
		</nav>
		<div class="mui-scroll-wrapper" style="margin-bottom: 50px;">
			<div class="mui-scroll">
    			<div class="mui-card" style="margin: 0px;">
					<div class="mui-card-header" style="font-weight: 800;">标题：装修扫盲之壁挂式空调安装及验收</div>
    				<div class="mui-card-header mui-card-media">
    					<img src="{{ _asset('assets/syrator/wap/images/logo_default.png') }}" />
    					<div class="mui-media-body">
    						<span>作者：小M</span>				
    						<div class="title-reply-count">
    							<span class="mui-icon mui-icon-eye" style="font-size: 14px;"></span><span>&nbsp;&nbsp;88</span>
    							<span class="mui-icon mui-icon-chatboxes" style="font-size: 14px;margin-left:10px;"></span><span>&nbsp;&nbsp;8</span>
    						</div>
    						<p>发表于 2016-06-30 15:30</p>    
    					</div>
    				</div>    	
    				<div class="mui-card-content" >
						<div class="mui-card-content-inner">
							这是一个最简单的卡片视图控件；卡片视图常用来显示完整独立的一段信息，比如一篇文章的预览图、作者信息、点赞数量等
						</div>
    				</div>
    			</div>        		
    			<div class="mui-card" style="margin: 1px 0px 0px 0px;">
					<div class="mui-card-header">网友回复</div>
					<div class="mui-card-content">
    					<ul id="mui-table-view-list" class="mui-table-view mui-table-view-chevron">    						
                		</ul>
					</div>    				
    			</div>
			</div>
		</div>
	</div>
	<!--页面主内容区结束-->
</div>
<div id="pageReply" class="mui-page feedback">
	<div class="mui-navbar-inner mui-bar mui-bar-nav" style="background: #60D4AB;">
		<h1 class="mui-title" style="color: #ffffff;">回复帖子</h1>
		<button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left"><span class="mui-icon mui-icon-left-nav"></span>返回</button>
	</div>
	<div class="mui-page-content">
		<div class="mui-scroll-wrapper">
			<div class="mui-scroll">
				<div class="mui-content-padded" style="margin: 2px;">	
                	<form>
                		<div class="mui-input-row">
                    		<dl>
                        		<textarea id="textarea" rows="5" placeholder="回复内容"></textarea>
                    		</dl>
                    	</div>
                    	<p style="margin-top: 10px; font-size: 12px; color: #8f8f94;">图片(选填,提供问题截图,总大小10M以下)</p>
                    	<div id='image-list' class="row image-list"></div>                    	
                		<div class="mui-button-row" style="margin-top:1px;">
                			<button type="button" class="mui-btn mui-btn-success mui-btn-block">提交</button>
                		</div>
                	</form>
                </div>
			</div>
		</div>
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
mui.init();

//初始化单页view
var viewApi = mui('#app').view({
	defaultPage: '#setting'
});
//初始化单页的区域滚动
mui('.mui-scroll-wrapper').scroll();

// 弹出部分：分享
mui('body').on('shown', '.mui-popover', function(e) {
	if (e.detail.id==='topPopoverMenu') {
	}
});
mui('body').on('hidden', '.mui-popover', function(e) {
	if (e.detail.id==='topPopoverMenu') {
	}
});
document.getElementById('topPopoverMenu').addEventListener('tap', function() {
	mui('#topPopoverMenu').popover('hide'); 
});
document.getElementById('popShare').addEventListener('tap', function() {
	mui('#popShare').popover('hide'); 
});

mui('#popmenu').on('tap', 'li', function() {  	
	var id = this.getAttribute("id");
	if (id==='popmenu-attent') {
		mui.alert("恭喜，关注成功！");
	} else if (id==='popmenu-collect') {
		mui.alert("恭喜，收藏成功！");
	}
});

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
	});
	view.addEventListener('pageBeforeBack', function(e) {
	});
	view.addEventListener('pageBack', function(e) {
	});

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

//加载数据
loadData();
function loadData() {
	$.ajax({
		type:'post',
		url:'/api/device/list',
		dataType:'json',
		async:true,
		success:function(data) {
			var code = data['code'];
			if(code == "200") {
				var d = data['data'];
				if(d.length == 0) {
					index--;
				}
				for(var i=0; i<d.length; i++) {
					var html = "";

					html += '<li class="mui-table-view-cell mui-media" style="padding: 0px;">';
					html += '<div class="mui-card" style="margin: 0px;">';
					html += '<div class="mui-card-header mui-card-media">';
					html += '<img src="{{ _asset('assets/syrator/wap/images/logo_default.png') }}" />';
					html += '<div class="mui-media-body">';
					html += '<span>' + d[i].goods_name + '</span>';				
					html += '<div class="title-reply-count">';
					html += '<span style="font-size: 14px;">'+ (i+1)+ '楼</span>';
					html += '</div>';
					html += '<p>回复于 2016-06-30 15:30</p>';    
					html += '</div>';
					html += '</div>';    	
					html += '<div class="mui-card-content" >';
					html += '<div class="mui-card-content-inner">';
					html += '这是一个最简单的卡片视图控件';
					html += '</div>';
					html += '</div>';
					html += '<div class="mui-card-footer" style="border-bottom:1px solid #c8c7cc;">';
					html += '<a class="mui-card-link"><span class="mui-icon-extra mui-icon-extra-like" style="font-size: 16px;"></span>&nbsp;&nbsp;点赞</a>';
					html += '<a href="#pageReply" class="mui-card-link"><span class="mui-icon mui-icon-redo"></span>&nbsp;&nbsp;回复</a>';
					html += '</div>';
					html += '</div>';
					html += '</li>';
					
					$("#mui-table-view-list").append(html);
				}
			} else {
				alert("读取内容失败");
			}
		}
	});
}
</script>
@stop
