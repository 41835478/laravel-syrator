@extends('mobile._layout._layer_main') 
@section('head_style')
@parent
<style>
.section-heading {
	width: 100%;
	position:absolute;
	top:0;
	left:0;
	min-height:100%;
	height:auto;
	background: url({{ url('/wapstyle/images/tab1bg.png') }}) no-repeat center center;	
    background-size:cover;
}
.section-heading {
	padding-top: 0px;
}
.home-menu {
	width:100%;
    height: 140px;
    line-height: 140px;
	background-color: #efeff4;
}
.home-menu ul li {
	list-style: none;
	text-align: center;
}
.home-menu ul {
	width: 100%;
	margin: 0 auto;
	overflow: auto;
	zoom: 1;
}
.home-menu ul li {
	width: 24%;
	height: 70px;
	line-height: 70px;
	float: left;
	display: inline;
	padding-top: 5px;
	overflow: hidden;
}
</style>
@stop

@section('content')
<div class="mui-content">
    <div class="section-heading">
		<div class="header-city" id="header-city" style="height: 50px;line-height: 50px;text-align: center;">
			<a href="{{ url('/mobile/setting/city') }}">
				<span style="float:left;text-align:right;padding-right:4px;width:50%;">
					<img style="width:20px;height:25px;vertical-align:middle;" src="/wapstyle/images/ico_dingwei.png"></img>
				</span>
    			<span style="float:right;text-align:left;padding-left:4px;width:50%;padding-top:2px;color: #ffffff;font-weight:bold;">北京</span>    			   				
			</a>				
		</div>
		@if (Session::get('member')->role=="1")
		<div class="header-issue" style="text-align: center">
			<a href="{{ url('/mobile/task/create') }}" style="float:left;width:100%;">
			    <div class="header-issue-bg" style="text-align:center;width:100%;">    					
					<span><img width="120px;" src="/wapstyle/images/ico_needzhuangxiu.png"></img></span>		
    			</div>
    			<div class="header-issue-bg" style="text-align:center;width:100%;margin-top:-42px;color: #53868B; font-weight:bold; font-size: 14px;">
    				<span>我要发布</span>				
    			</div>
			</a>				
		</div>
		@else
		<div class="header-issue" style="text-align: center">
			<a href="{{ url('/mobile/task/list') }}" style="float:left;width:100%;">
			    <div class="header-issue-bg" style="text-align:center;width:100%;">    					
					<span><img width="120px;" src="/wapstyle/images/ico_needzhuangxiu.png"></img></span>		
    			</div>
    			<div class="header-issue-bg" style="text-align:center;width:100%;margin-top:-42px;color: #53868B; font-weight:bold; font-size: 14px;">
    				<span>我要竞标</span>				
    			</div>
			</a>				
		</div>
		@endif
	</div>
	
	<div class="home-menu" style="position:fixed; bottom: 170px;">
    	<ul>
    		<li>
    			<a href="{{ url('/mobile/material') }}">
    			    <div class="home-menu-bg" style="text-align:center;width:100%;">    					
    					<span><img height="42px" width="42px" src="/wapstyle/images/index/bg_material.png"></img></span>		
        			</div>
        			<div class="home-menu-bg" style="text-align:center;width:100%;margin-top:-55px;color: #53868B; font-size: 12px;">
        				<span>施工材料</span>				
        			</div>
    			</a>
    		</li>
          	<li>
    			<a href="{{ url('/mobile/servicer/shigong') }}">
    			    <div class="home-menu-bg" style="text-align:center;width:100%;">    					
    					<span><img height="42px" width="42px" src="/wapstyle/images/index/bg_shigong.png"></img></span>		
        			</div>
        			<div class="home-menu-bg" style="text-align:center;width:100%;margin-top:-55px;color: #53868B; font-size: 12px;">
        				<span>找施工队</span>				
        			</div>
    			</a>
    		</li>
          	<li>
    			<a href="{{ url('/mobile/servicer/jianli') }}">
    			    <div class="home-menu-bg" style="text-align:center;width:100%;">    					
    					<span><img height="42px" width="42px" src="/wapstyle/images/index/bg_jianli.png"></img></span>		
        			</div>
        			<div class="home-menu-bg" style="text-align:center;width:100%;margin-top:-55px;color: #53868B; font-size: 12px;">
        				<span>找工程师</span>				
        			</div>
    			</a>
    		</li>
          	<li>
    			<a href="{{ url('/mobile/device') }}">
    			    <div class="home-menu-bg" style="text-align:center;width:100%;">    					
    					<span><img height="42px" width="42px" src="/wapstyle/images/index/bg_device.png"></img></span>		
        			</div>
        			<div class="home-menu-bg" style="text-align:center;width:100%;margin-top:-55px;color: #53868B; font-size: 12px;">
        				<span>设备租赁</span>				
        			</div>
    			</a>
    		</li>
        </ul>
        <ul>
    		<li>
    			<a href="{{ url('/mobile/project') }}"">
    			    <div class="home-menu-bg" style="text-align:center;width:100%;">    					
    					<span><img height="42px" width="42px" src="/wapstyle/images/index/bg_project.png"></img></span>		
        			</div>
        			<div class="home-menu-bg" style="text-align:center;width:100%;margin-top:-55px;color: #53868B; font-size: 12px;">
        				<span>工程信息</span>				
        			</div>
    			</a>
    		</li>
          	<li>
    			<a href="{{ url('/mobile/servicer/fenbao') }}">
    			    <div class="home-menu-bg" style="text-align:center;width:100%;">    					
    					<span><img height="42px" width="42px" src="/wapstyle/images/index/bg_fenbao.png"></img></span>		
        			</div>
        			<div class="home-menu-bg" style="text-align:center;width:100%;margin-top:-55px;color: #53868B; font-size: 12px;">
        				<span>找分包商</span>				
        			</div>
    			</a>
    		</li>
          	<li>
    			<a href="{{ url('/mobile/finance') }}">
    			    <div class="home-menu-bg" style="text-align:center;width:100%;">    					
    					<span><img height="42px" width="42px" src="/wapstyle/images/index/bg_finance.png"></img></span>		
        			</div>
        			<div class="home-menu-bg" style="text-align:center;width:100%;margin-top:-55px;color: #53868B; font-size: 12px;">
        				<span>保险金融</span>				
        			</div>
    			</a>
    		</li>
          	<li>
    			<a href="{{ url('/mobile/freight') }}">
    			    <div class="home-menu-bg" style="text-align:center;width:100%;">    					
    					<span><img height="42px" width="42px" src="/wapstyle/images/index/bg_freight.png"></img></span>		
        			</div>
        			<div class="home-menu-bg" style="text-align:center;width:100%;margin-top:-55px;color: #53868B; font-size: 12px;">
        				<span>找货运</span>				
        			</div>
    			</a>
    		</li>
        </ul>
    </div>
    
    <div id="slider" class="mui-slider" style="height:120px;position:fixed; bottom: 50px;">
    	<div class="mui-slider-group mui-slider-loop">
    		<div class="mui-slider-item mui-slider-item-duplicate">
    			<a href="/mobile/mine">
    				<img src="/wapstyle/images/img4.jpg">
    			</a>
    		</div>
    		<!-- 第一张 -->
    		<div class="mui-slider-item">
    			<a href="/mobile/mine">
    				<img src="/wapstyle/images/img1.jpg">
    			</a>
    		</div>
    		<!-- 第二张 -->
    		<div class="mui-slider-item">
    			<a href="/mobile/mine">
    				<img src="/wapstyle/images/img2.jpg">
    			</a>
    		</div>
    		<!-- 第三张 -->
    		<div class="mui-slider-item">
    			<a href="/mobile/mine">
    				<img src="/wapstyle/images/img3.jpg">
    			</a>
    		</div>
    		<!-- 第四张 -->
    		<div class="mui-slider-item">
    			<a href="http://localhost:8801/mobile/mine">
    				<img src="/wapstyle/images/img4.jpg">
    			</a>
    		</div>
    		<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
    		<div class="mui-slider-item mui-slider-item-duplicate">
    			<a href="http://localhost:8801/mobile/mine">
    				<img src="/wapstyle/images/img1.jpg">
    			</a>
    		</div>
    	</div>
    	<div class="mui-slider-indicator" style="position:fixed; bottom:52px;">
    		<div class="mui-indicator mui-active"></div>
    		<div class="mui-indicator"></div>
    		<div class="mui-indicator"></div>
    		<div class="mui-indicator"></div>
    	</div>
    </div>
</div>
@stop

@section('afterBody')
@parent
<script>
	// 图片轮播
    var slider = mui("#slider");
    slider.slider({
    	interval: 1000
    });

    // 顶部导航高度
    var o = document.getElementById('header-city');
    var height = window.screen.height;    
    var ua = window.navigator.userAgent.toLowerCase();
    if (ua.match(/MicroMessenger/i) == "micromessenger") {
        height = (height - 480)/3 + 15;
    } else {
        height = (height - 310)/2 - 72;
    }    
    o.style.height = height + 'px';
    o.style.lineHeight = height + 'px';
</script>
@stop
