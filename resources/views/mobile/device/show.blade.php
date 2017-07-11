@extends('mobile._layout._layer_nonav') 

@section('body_attr') class="mui-fullscreen" @stop

@section('head_style')
@parent
<style>
#topPopover {
	position: fixed;
	top: 16px;
	right: 6px;
}
#topPopover .mui-popover-arrow {
	left: auto;
	right: 6px;
}
.mui-popover {
	width: 70px;
	height: 140px;
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
		<h1 class="mui-title" style="color: #ffffff;">设备租赁-详情</h1>		
		<a id="menu" class="mui-action-menu mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
		<button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left"><span class="mui-icon mui-icon-left-nav"></span>返回</button>
	</div>
	<!--页面标题栏结束-->
	<!--页面主内容区开始-->
	<div class="mui-page-content">		
        <!--右上角弹出菜单-->
        <div id="topPopover" class="mui-popover">
        	<div class="mui-popover-arrow"></div>
        	<div class="mui-scroll-wrapper">
        		<div class="mui-scroll">
        			<ul class="mui-table-view">
        				<li class="mui-table-view-cell"><a href="#filtrate_setting">关注</a></li>
        				<li class="mui-table-view-cell"><a href="{{ _asset('mobile/mine') }}">收藏</a></li>
        				<li class="mui-table-view-cell"><a href="{{ _asset('mobile/cases') }}">分享</a></li>
        			</ul>
        		</div>
        	</div>
        </div>
		<div id="slider" class="mui-slider">
			<div class="mui-slider-group mui-slider-loop">
				<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="#">
						<img src="/assets/syrator/wap/images/img4.jpg">
						<p class="mui-slider-title">静静看这世界</p>
					</a>
				</div>
				<div class="mui-slider-item">
					<a href="#">
						<img src="/assets/syrator/wap/images/img1.jpg">
						<p class="mui-slider-title">幸福就是可以一起睡觉</p>
					</a>
				</div>
				<div class="mui-slider-item">
					<a href="#">
						<img src="/assets/syrator/wap/images/img2.jpg">
						<p class="mui-slider-title">想要一间这样的木屋，静静的喝咖啡</p>
					</a>
				</div>
				<div class="mui-slider-item">
					<a href="#">
						<img src="/assets/syrator/wap/images/img3.jpg">
						<p class="mui-slider-title">Color of SIP CBD</p>
					</a>
				</div>
				<div class="mui-slider-item">
					<a href="#">
						<img src="/assets/syrator/wap/images/img4.jpg">
						<p class="mui-slider-title">静静看这世界</p>
					</a>
				</div>
				<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="#">
						<img src="/assets/syrator/wap/images/img1.jpg">
						<p class="mui-slider-title">幸福就是可以一起睡觉</p>
					</a>
				</div>
			</div>
			<div class="mui-slider-indicator mui-text-right">
				<div class="mui-indicator mui-active"></div>
				<div class="mui-indicator"></div>
				<div class="mui-indicator"></div>
				<div class="mui-indicator"></div>
			</div>
		</div>		
		<div class="mui-scroll-wrapper" style="margin-top: 150px;">
			<div class="mui-scroll">
        		<div class="mui-card">
        			<div class="mui-card-content">
        				<div class="mui-card-content-inner">
        					材料的名称
        				</div>
        			</div>
        		</div>        		
    			<div class="mui-card">
    				<ul class="mui-table-view">
    					<li class="mui-table-view-cell mui-collapse">
    						<a class="mui-navigate-right" href="#">表单</a>
    						<div class="mui-collapse-content">
    							<form class="mui-input-group">
    								<div class="mui-input-row">
    									<label>Input</label>
    									<input type="text" placeholder="普通输入框">
    								</div>
    								<div class="mui-input-row">
    									<label>Input</label>
    									<input type="text" class="mui-input-clear" placeholder="带清除按钮的输入框">
    								</div>
    		
    								<div class="mui-input-row mui-plus-visible">
    									<label>Input</label>
    									<input type="text" class="mui-input-speech mui-input-clear" placeholder="语音输入">
    								</div>
    								<div class="mui-button-row">
    									<button class="mui-btn mui-btn-primary" type="button" onclick="return false;">确认</button>&nbsp;&nbsp;
    									<button class="mui-btn mui-btn-primary" type="button" onclick="return false;">取消</button>
    								</div>
    							</form>
    						</div>
    					</li>
    					<li class="mui-table-view-cell mui-collapse">
    						<a class="mui-navigate-right" href="#">图片轮播</a>
    						<div class="mui-collapse-content">
    							<div id="slider" class="mui-slider">
    								<div class="mui-slider-group mui-slider-loop">
    									<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
    									<div class="mui-slider-item mui-slider-item-duplicate">
    										<a href="#">
    											<img src="/assets/syrator/wap/images/img4.jpg">
    										</a>
    									</div>
    									<!-- 第一张 -->
    									<div class="mui-slider-item">
    										<a href="#">
    											<img src="/assets/syrator/wap/images/img1.jpg">
    										</a>
    									</div>
    									<!-- 第二张 -->
    									<div class="mui-slider-item">
    										<a href="#">
    											<img src="/assets/syrator/wap/images/img2.jpg">
    										</a>
    									</div>
    									<!-- 第三张 -->
    									<div class="mui-slider-item">
    										<a href="#">
    											<img src="/assets/syrator/wap/images/img3.jpg">
    										</a>
    									</div>
    									<!-- 第四张 -->
    									<div class="mui-slider-item">
    										<a href="#">
    											<img src="/assets/syrator/wap/images/img4.jpg">
    										</a>
    									</div>
    									<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
    									<div class="mui-slider-item mui-slider-item-duplicate">
    										<a href="#">
    											<img src="/assets/syrator/wap/images/img1.jpg">
    										</a>
    									</div>
    								</div>
    								<div class="mui-slider-indicator">
    									<div class="mui-indicator mui-active"></div>
    									<div class="mui-indicator"></div>
    									<div class="mui-indicator"></div>
    									<div class="mui-indicator"></div>
    								</div>
    							</div>
    						</div>
    					</li>
    					<li class="mui-table-view-cell mui-collapse">
    						<a class="mui-navigate-right" href="#">文字排版</a>
    						<div class="mui-collapse-content">
    							<h1>h1. Heading</h1>
    							<h2>h2. Heading</h2>
    							<h3>h3. Heading</h3>
    							<h4>h4. Heading</h4>
    							<h5>h5. Heading</h5>
    							<h6>h6. Heading</h6>
    							<p>p. 目前最接近原生App效果的框架。</p>
    						</div>
    					</li>
    				</ul>
    			</div>
    			<div class="mui-card">
    				<ul class="mui-table-view mui-table-view-chevron" id="mui-table-view-list">
    				</ul>
    			</div>
			</div>
		</div>
	</div>
	<!--页面主内容区结束-->
</div>
<div id="filtrate_setting" class="mui-page">
	<div class="mui-navbar-inner mui-bar mui-bar-nav" style="background: #60D4AB;">
		<h1 class="mui-title" style="color: #ffffff;">筛选条件</h1>
		<button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left"><span class="mui-icon mui-icon-left-nav"></span>返回</button>
	</div>
	<div class="mui-page-content">
		<div class="mui-scroll-wrapper">
			<div class="mui-scroll">
				<ul class="mui-table-view">
					<li class="mui-table-view-cell">
						<a href="#category" class="mui-navigate-right">类别</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="category" class="mui-page category">
	<div class="mui-navbar-inner mui-bar mui-bar-nav" style="background: #60D4AB;">
		<h1 class="mui-title" style="color: #ffffff;">类别</h1>
		<button id="submit" class="mui-btn mui-btn-blue mui-btn-link mui-pull-right">确定</button>
		<button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left"><span class="mui-icon mui-icon-left-nav"></span>返回</button>
	</div>
	<div class="mui-page-content mui-row">		
		<div class="mui-col-xs-3">
			<div id="segmentedControls" class="mui-segmented-control mui-segmented-control-inverted mui-segmented-control-vertical">
			</div>
		</div>
		<div id="segmentedControlContents" class="mui-col-xs-9" style="border-left: 1px solid #c8c7cc;">
		</div>
	</div>
</div>
@stop

@section('afterBody') 
@parent
<script src="{{ _asset('assets/syrator/wap/js/mui.view.js') }}"></script>
<script>
mui.init();
//初始化单页view
var viewApi = mui('#app').view({
	defaultPage: '#setting'
});
//初始化单页的区域滚动
mui('.mui-scroll-wrapper').scroll();

mui('body').on('shown', '.mui-popover', function(e) {
	if (e.detail.id==='topPopover') {
	}
});
mui('body').on('hidden', '.mui-popover', function(e) {
	if (e.detail.id==='topPopover') {
	}
});
document.getElementById('topPopover').addEventListener('tap', function() {
	mui('#topPopover').popover('hide'); 
});

//图片轮播
var slider = mui("#slider");
slider.slider({
	interval: 1000
});

loadData();

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
		if (e.detail.page.id == 'category') {
			setCategory();
		}
	});
	view.addEventListener('pageBeforeBack', function(e) {
	});
	view.addEventListener('pageBack', function(e) {
	});
})(mui);

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

					html += '<li class="mui-table-view-cell mui-media">';
					html += '<a href="{{ _asset('mobile/device/show') }}/' + d[i].goods_id + '">';
					html += '<img class="mui-media-object mui-pull-left" src="{{ _asset('assets/syrator/wap/images/logo_default.png') }}">'
					html += '<div class="mui-media-body">'
					html += d[i].goods_name;
					html += '<p class="mui-ellipsis">这是评论，不错</p>';
					html += '</div>';
					html += '</a>';
					html += '</li>';
					
					$("#mui-table-view-list").append(html);
				}
			} else {
				alert("读取内容失败");
			}
		}
	});
}

function setCategory() {
	var controls = document.getElementById("segmentedControls");
	var contents = document.getElementById("segmentedControlContents");
	var html = [];
	var i = 1,
	j = 1,
	m = 8, //左侧选项卡数量+1
	n = 20; //每个选项卡列表数量+1
	for (; i < m; i++) {
		html.push('<a class="mui-control-item" data-index="' + (i - 1) + '" href="#content' + i + '">选项' + i + '</a>');
	}
	controls.innerHTML = html.join('');
	html = [];
	for (i = 1; i < m; i++) {
		html.push('<div id="content' + i + '" class="mui-control-content"><ul class="mui-table-view">');
		for (j = 1; j < n; j++) {
			html.push('<li class="mui-table-view-cell">第' + i + '个选项卡子项-' + j + '</li>');
		}
		html.push('</ul></div>');
	}
	contents.innerHTML = html.join('');
	//默认选中第一个
	controls.querySelector('.mui-control-item').classList.add('mui-active');
	(function() {
		var controlsElem = document.getElementById("segmentedControls");
		var contentsElem = document.getElementById("segmentedControlContents");
		var controlListElem = controlsElem.querySelectorAll('.mui-control-item');
		var contentListElem = contentsElem.querySelectorAll('.mui-control-content');
		var controlWrapperElem = controlsElem.parentNode;
		var controlWrapperHeight = controlWrapperElem.offsetHeight;
		var controlMaxScroll = controlWrapperElem.scrollHeight - controlWrapperHeight;//左侧类别最大可滚动高度
		var maxScroll = contentsElem.scrollHeight - contentsElem.offsetHeight;//右侧内容最大可滚动高度
		var controlHeight = controlListElem[0].offsetHeight;//左侧类别每一项的高度
		var controlTops = []; //存储control的scrollTop值
		var contentTops = [0]; //存储content的scrollTop值
		var length = contentListElem.length;
		for (var i = 0; i < length; i++) {
			controlTops.push(controlListElem[i].offsetTop + controlHeight);
		}
		for (var i = 1; i < length; i++) {
			var offsetTop = contentListElem[i].offsetTop;
			if (offsetTop + 100 >= maxScroll) {
				var height = Math.max(offsetTop + 100 - maxScroll, 100);
				var totalHeight = 0;
				var heights = [];
				for (var j = i; j < length; j++) {
					var offsetHeight = contentListElem[j].offsetHeight;
					totalHeight += offsetHeight;
					heights.push(totalHeight);
				}
				for (var m = 0, len = heights.length; m < len; m++) {
					contentTops.push(parseInt(maxScroll - (height - heights[m] / totalHeight * height)));
				}
				break;
			} else {
				contentTops.push(parseInt(offsetTop));
			}
		}
		contentsElem.addEventListener('scroll', function() {
			var scrollTop = contentsElem.scrollTop;
			for (var i = 0; i < length; i++) {
				var offsetTop = contentTops[i];
				var offset = Math.abs(offsetTop - scrollTop);
				if (scrollTop < offsetTop) {
					if (scrollTop >= maxScroll) {
						onScroll(length - 1);
					} else {
						onScroll(i - 1);
					}
					break;
				} else if (offset < 20) {
					onScroll(i);
					break;
				}else if(scrollTop >= maxScroll){
					onScroll(length - 1);
					break;
				}
			}
		});
		var lastIndex = 0;
		//监听content滚动
		var onScroll = function(index) {
			if (lastIndex !== index) {
				lastIndex = index;
				var lastActiveElem = controlsElem.querySelector('.mui-active');
				lastActiveElem && (lastActiveElem.classList.remove('mui-active'));
				var currentElem = controlsElem.querySelector('.mui-control-item:nth-child(' + (index + 1) + ')');
				currentElem.classList.add('mui-active');
				//简单处理左侧分类滚动，要么滚动到底，要么滚动到顶
				var controlScrollTop = controlWrapperElem.scrollTop;
				if (controlScrollTop + controlWrapperHeight < controlTops[index]) {
					controlWrapperElem.scrollTop = controlMaxScroll;
				} else if (controlScrollTop > controlTops[index] - controlHeight) {
					controlWrapperElem.scrollTop = 0;
				}
			}
		};
		//滚动到指定content
		var scrollTo = function(index) {
			contentsElem.scrollTop = contentTops[index];
		};
		mui(controlsElem).on('tap', '.mui-control-item', function(e) {
			scrollTo(this.getAttribute('data-index'));
			return false;
		});
	})();
}
</script>
@stop
