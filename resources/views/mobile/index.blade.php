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
	background: url({{ url('/assets/syrator/wap/images/tab1bg.png') }}) no-repeat center center;	
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
    <div id="slider" class="mui-slider" style="height:120px;position:fixed; bottom: 50px;">
    	<div class="mui-slider-group mui-slider-loop">
    		<div class="mui-slider-item mui-slider-item-duplicate">
    			<a href="/mobile/mine">
    				<img src="/assets/syrator/wap/images/img4.jpg">
    			</a>
    		</div>
    		<!-- 第一张 -->
    		<div class="mui-slider-item">
    			<a href="/mobile/mine">
    				<img src="/assets/syrator/wap/images/img1.jpg">
    			</a>
    		</div>
    		<!-- 第二张 -->
    		<div class="mui-slider-item">
    			<a href="/mobile/mine">
    				<img src="/assets/syrator/wap/images/img2.jpg">
    			</a>
    		</div>
    		<!-- 第三张 -->
    		<div class="mui-slider-item">
    			<a href="/mobile/mine">
    				<img src="/assets/syrator/wap/images/img3.jpg">
    			</a>
    		</div>
    		<!-- 第四张 -->
    		<div class="mui-slider-item">
    			<a href="/mobile/mine">
    				<img src="/assets/syrator/wap/images/img4.jpg">
    			</a>
    		</div>
    		<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
    		<div class="mui-slider-item mui-slider-item-duplicate">
    			<a href="/mobile/mine">
    				<img src="/assets/syrator/wap/images/img1.jpg">
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
</script>
@stop
