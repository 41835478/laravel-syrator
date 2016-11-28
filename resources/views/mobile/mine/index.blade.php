@extends('mobile._layout._layer_main') 
@section('head_style')
@parent
<style>
.mine-header ul li {
	list-style: none;
	text-align: center;
}
.mine-header ul {
	width: 100%;
	margin: 0 auto;
	overflow: auto;
	zoom: 1;
}
.mine-header ul li {
	width: 24%;
	height: 30px;
	line-height: 30px;
	float: left;
	display: inline;
	margin-top: 5px;
	overflow: hidden;
}
</style>
@stop

@section('beforeBody')
<header class="mui-bar mui-bar-nav" style="background: #60D4AB; height:152px; padding-left: 0px; padding-right: 0px;">
	<ul class="mui-table-view mui-table-view-chevron" style="background: #60D4AB;">
		<li class="mui-table-view-cell mui-media mui-table-view-cell-head">
			<a class="mui-navigate-right" href="#account">
				<img class="mui-media-object mui-pull-left head-img" id="head-img" style="height: 60px; width: 60px;max-width: 60px;margin-top: 8px;" src="{{ _asset('wapstyle/images/logo_default.png') }}">
				<div class="mui-media-body" style="height: 80px; line-height: 40px;">
				@if (Session::get('member')->nickname!="")
				{{Session::get('member')->nickname}}
				@else
				{{Session::get('member')->phone}}
				@endif
				<p class='mui-ellipsis'>用爱生活丶用心设计</p></div>
			</a>
		</li>		
		<div class="mine-header" style="background: #2DA686; height: 50px; line-height: 50px;">
			<ul>
				<li style="width: 33%; text-align:center; margin-top: 0px; height: 50px; line-height: 50px;">
					<a href="">
						<div style="height: 20px; line-height: 20px; color: #ffffff; font-size: 12px; margin-top: 5px;">
							<span>0</span>			
						</div>
						<div style="height: 20px; line-height: 20px; color: #ffffff; font-size: 12px;">
                        	<span>关注</span>				
                        </div>    				
                    </a>
            	</li>
            	<li style="width: 33%; text-align:center; margin-top: 0px; height: 50px; line-height: 50px; border-left:1px solid #ffffff;">
					<a href="">
						<div style="height: 20px; line-height: 20px; color: #ffffff; font-size: 12px; margin-top: 5px;">
							<span>0</span>			
						</div>
						<div style="height: 20px; line-height: 20px; color: #ffffff; font-size: 12px;">
							<span>收藏</span>				
						</div>    				
					</a>
				</li>
				<li style="width: 33%; text-align:center; margin-top: 0px; height: 50px; line-height: 50px; border-left:1px solid #ffffff;">
					<a href="">
						<div style="height: 20px; line-height: 20px; color: #ffffff; font-size: 12px; margin-top: 5px;">
							<span>0</span>			
						</div>
						<div style="height: 20px; line-height: 20px; color: #ffffff; font-size: 12px;">
							<span>账户余额</span>				
						</div>    				
					</a>
				</li>
			</ul>
		</div>
	</ul>
</header>	
@stop

@section('content')
<!--页面主结构开始-->
<div id="app" class="mui-views">
	<div class="mui-view">
		<div class="mui-pages">
		</div>
	</div>
</div>
<!--页面主结构结束-->
<!--单页面开始-->
<div id="setting" class="mui-page">
	<!--页面主内容区开始-->
	<div class="mui-page-content">
		<div class="mui-scroll-wrapper">
			<div class="mui-scroll">					
				<ul class="mui-table-view mui-table-view-chevron" style="margin-top: 152px; margin-bottom: 50px;">
					<li class="mui-table-view-cell">
						<a href="#account" class="mui-navigate-right">
							<img class="mui-media-object mui-pull-left" style="height: 25px; width: 25px;max-width: 25px;" src="{{ _asset('wapstyle/images/logo_default.png') }}">
							<div class="mui-media-body" style="height: 30px; line-height: 30px; font-size: 14px;">我的案例</div>
						</a>
					</li>
					<li class="mui-table-view-cell">
						<a href="#account" class="mui-navigate-right">
							<img class="mui-media-object mui-pull-left" style="height: 25px; width: 25px;max-width: 25px;" src="{{ _asset('wapstyle/images/logo_default.png') }}">
							<div class="mui-media-body" style="height: 30px; line-height: 30px; font-size: 14px;">我的订单</div>
						</a>
					</li>
					<li class="mui-table-view-cell">
						<a href="#account" class="mui-navigate-right">
							<img class="mui-media-object mui-pull-left" style="height: 25px; width: 25px;max-width: 25px;" src="{{ _asset('wapstyle/images/logo_default.png') }}">
							<div class="mui-media-body" style="height: 30px; line-height: 30px; font-size: 14px;">我的抵用券</div>
						</a>
					</li>
					<li class="mui-table-view-cell">
						<a href="#account" class="mui-navigate-right">
							<img class="mui-media-object mui-pull-left" style="height: 25px; width: 25px;max-width: 25px;" src="{{ _asset('wapstyle/images/logo_default.png') }}">
							<div class="mui-media-body" style="height: 30px; line-height: 30px; font-size: 14px;">我要成为</div>
						</a>
					</li>
					<li class="mui-table-view-cell">
						<a href="#account" class="mui-navigate-right">
							<img class="mui-media-object mui-pull-left" style="height: 25px; width: 25px;max-width: 25px;" src="{{ _asset('wapstyle/images/logo_default.png') }}">
							<div class="mui-media-body" style="height: 30px; line-height: 30px; font-size: 14px;">我的发布</div>
						</a>
					</li>
					<li class="mui-table-view-cell">
						<a href="#account" class="mui-navigate-right">
							<img class="mui-media-object mui-pull-left" style="height: 25px; width: 25px;max-width: 25px;" src="{{ _asset('wapstyle/images/logo_default.png') }}">
							<div class="mui-media-body" style="height: 30px; line-height: 30px; font-size: 14px;">使用帮助</div>
						</a>
					</li>
					<li class="mui-table-view-cell">
						<a href="#account" class="mui-navigate-right">
							<img class="mui-media-object mui-pull-left" style="height: 25px; width: 25px;max-width: 25px;" src="{{ _asset('wapstyle/images/logo_default.png') }}">
							<div class="mui-media-body" style="height: 30px; line-height: 30px; font-size: 14px;">关于我们</div>
						</a>
					</li>
					<li class="mui-table-view-cell">
						<a href="#account" class="mui-navigate-right">
							<img class="mui-media-object mui-pull-left" style="height: 25px; width: 25px;max-width: 25px;" src="{{ _asset('wapstyle/images/logo_default.png') }}">
							<div class="mui-media-body" style="height: 30px; line-height: 30px; font-size: 14px;">意见与建议</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!--页面主内容区结束-->
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
</script>
@stop
