@extends('mobile._layout._layer_main') 

@section('body_attr') class="mui-fullscreen" @stop

@section('head_style')
@parent
<style>
.title-update-time {
	float: right;
	font-size: 10px;
}
.title-reply-count {
	float: right;
	font-size: 10px;
	margin-right: 20px;
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
		<h1 class="mui-title" style="color: #ffffff;">论坛</h1>		
		<button class="mui-btn mui-btn-blue mui-btn-link mui-pull-right"><a href="#filtrate_setting" style="color: #ffffff;">查找</a></button>
		<button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left"><span class="mui-icon mui-icon-left-nav"></span>首页</button>
	</div>	
	<!--页面标题栏结束-->
	<!--页面主内容区开始-->
	<div class="mui-page-content">	
		<div id="slider" class="mui-slider">
			<div id="sliderSegmentedControl" class="table-sort-by mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
				<a class="mui-control-item mui-active" href="#sortby_default">最新发布</a>
				<a class="mui-control-item" href="#sortby_price">最新回帖</a>
				<a class="mui-control-item" href="#sortby_sales">最新精华</a>
				<a class="mui-control-item" href="#filtrate_setting">筛选</a>
			</div>
		</div>
		<div class="mui-scroll-wrapper" style="margin-top: 39px; margin-bottom: 50px;">
			<div class="mui-scroll">
				<ul class="mui-table-view" id="mui-table-view-list">
				</ul>
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
<script src="{{ _asset('wapstyle/js/mui.view.js') }}"></script>
<script>
mui.init();
//初始化单页view
var viewApi = mui('#app').view({
	defaultPage: '#setting'
});
//初始化单页的区域滚动
mui('.mui-scroll-wrapper').scroll();

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
		url:'/api/forum/list',
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
					html += '<a href="{{ _asset('mobile/forum/show') }}/' + d[i].goods_id + '">';
					html += '<img class="mui-media-object mui-pull-left" src="{{ _asset('wapstyle/images/logo_default.png') }}">';
					html += '<div class="mui-media-body" style="font-size: 14px;">';
					html += '<div class="mui-media-body-head">';
					html += '<span>' + d[i].goods_sn + '</span>';
					html += '<div class="title-update-time">23小时前</div>';
					html += '<div class="title-reply-count">';
					html += '<span class="mui-icon mui-icon-chatboxes" style="font-size: 14px;"></span>';
					html += '<span>' + d[i].click_count + '</span>';
					html += '</div>';
					html += '</div>';
					html += '<p class="mui-ellipsis" style="font-size: 12px;">' + d[i].goods_name + '</p>';
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