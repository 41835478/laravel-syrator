@extends('mobile._layout._layer_main') 

@section('head_style')
@parent
<style>
#mui-table-view-list:first-child {
    margin-top: 0px;
}
.head-icon .mui-badge {
    font-size: 10px;
    line-height: 1.4;
    position: absolute;
    top: 5px;
    margin-left: -20px;
    padding: 1px 5px;
    color: #fff;
    background: red;
}
</style>
@stop

@section('beforeBody')
<header class="mui-bar mui-bar-nav" style="background: #60D4AB;">
	<h1 class="mui-title" style="color: #ffffff; font-weight:bold;">沟通</h1>
</header>
@stop

@section('content')
<div class="mui-content">
	<ul class="mui-table-view" id="mui-table-view-list">
		<li class="mui-table-view-cell">
			<a href="#account" class="mui-navigate-right">
				<img class="mui-media-object mui-pull-left" style="height: 25px; width: 25px;max-width: 25px;" src="{{ _asset('assets/syrator/wap/images/logo_customer_service.png') }}">
				<div class="mui-media-body" style="height: 30px; line-height: 30px; font-size: 14px;">人工客服一</div>
			</a>
		</li>
		<li class="mui-table-view-cell">
			<a href="#account" class="mui-navigate-right">
				<img class="mui-media-object mui-pull-left" style="height: 25px; width: 25px;max-width: 25px;" src="{{ _asset('assets/syrator/wap/images/logo_customer_service.png') }}">
				<div class="mui-media-body" style="height: 30px; line-height: 30px; font-size: 14px;">人工客服二</div>
			</a>
		</li>
	</ul>
	<div class="mui-messages" style="margin-bottom: 52px; margin-top: 3px;">
		<ul class="mui-table-view">			
			<li class="mui-table-view-cell mui-media">
				<a href="{{ _asset('mobile/message/chat/1') }}">
					<div class="head-icon">
						<img class="mui-media-object mui-pull-left" src="{{ _asset('assets/syrator/wap/images/logo_notice.png') }}"></<img>
						<span class="mui-badge">2</span>
					</div>					
					<div class="mui-media-body" style="font-size: 14px;">
						招标信息
						<p class='mui-ellipsis' style="font-size: 12px;">王先生发布了一条招标信息，快来看看</p>
					</div>
					<div class="message-send-time" style="float:right; height: 40px; line-height: 20px; margin-top: -45px; font-size: 10px;">21:13</div>
				</a>
			</li>
			<li class="mui-table-view-cell mui-media">
				<a href="{{ _asset('mobile/message/chat/2') }}">
					<div class="head-icon">
						<img class="mui-media-object mui-pull-left" src="{{ _asset('assets/syrator/wap/images/logo_notice.png') }}"></<img>
						<span class="mui-badge">3</span>
					</div>					
					<div class="mui-media-body" style="font-size: 14px;">
						系统信息
						<p class='mui-ellipsis' style="font-size: 12px;">又有新活动啦，分享即可领取千元红包！！</p>
					</div>
					<div class="message-send-time" style="float:right; height: 40px; line-height: 20px; margin-top: -45px; font-size: 10px;">21:13</div>
				</a>
			</li>
			<li class="mui-table-view-cell mui-media">
				<a href="{{ _asset('mobile/message/chat/3') }}">
					<div class="head-icon">
						<img class="mui-media-object mui-pull-left" src="{{ _asset('assets/syrator/wap/images/logo_notice.png') }}"></<img>
						<span class="mui-badge">2</span>
					</div>					
					<div class="mui-media-body" style="font-size: 14px;">
						蚂蚁助手
						<p class='mui-ellipsis' style="font-size: 12px;">您发布的“找施工队”的需求，鲁班应标了，快来看看吧</p>
					</div>
					<div class="message-send-time" style="float:right; height: 40px; line-height: 20px; margin-top: -45px; font-size: 10px;">21:13</div>
				</a>
			</li>
			<li class="mui-table-view-cell mui-media">
				<a href="{{ _asset('mobile/message/chat/4') }}">
					<div class="head-icon">
						<img class="mui-media-object mui-pull-left" src="{{ _asset('assets/syrator/wap/images/logo_default.png') }}"></<img>
						<span class="mui-badge">2</span>
					</div>					
					<div class="mui-media-body" style="font-size: 14px;">
						张师傅
						<p class='mui-ellipsis' style="font-size: 12px;">对方发来一个表情</p>
					</div>
					<div class="message-send-time" style="float:right; height: 40px; line-height: 20px; margin-top: -45px; font-size: 10px;">21:13</div>
				</a>
			</li>
			<li class="mui-table-view-cell mui-media">
				<a href="{{ _asset('mobile/message/chat/5') }}">
					<div class="head-icon">
						<img class="mui-media-object mui-pull-left" src="{{ _asset('assets/syrator/wap/images/logo_default.png') }}"></<img>
					</div>					
					<div class="mui-media-body" style="font-size: 14px;">
						张师傅
						<p class='mui-ellipsis' style="font-size: 12px;">对方发来一个表情</p>
					</div>
					<div class="message-send-time" style="float:right; height: 40px; line-height: 20px; margin-top: -45px; font-size: 10px;">21:13</div>
				</a>
			</li>
			<li class="mui-table-view-cell mui-media">
				<a href="{{ _asset('mobile/message/chat/6') }}">
					<div class="head-icon">
						<img class="mui-media-object mui-pull-left" src="{{ _asset('assets/syrator/wap/images/logo_default.png') }}"></<img>
					</div>					
					<div class="mui-media-body" style="font-size: 14px;">
						张师傅
						<p class='mui-ellipsis' style="font-size: 12px;">对方发来一个表情</p>
					</div>
					<div class="message-send-time" style="float:right; height: 40px; line-height: 20px; margin-top: -45px; font-size: 10px;">21:13</div>
				</a>
			</li>
			<li class="mui-table-view-cell mui-media">
				<a href="{{ _asset('mobile/message/chat/7') }}">
					<div class="head-icon">
						<img class="mui-media-object mui-pull-left" src="{{ _asset('assets/syrator/wap/images/logo_default.png') }}"></<img>
					</div>					
					<div class="mui-media-body" style="font-size: 14px;">
						张师傅
						<p class='mui-ellipsis' style="font-size: 12px;">对方发来一个表情</p>
					</div>
					<div class="message-send-time" style="float:right; height: 40px; line-height: 20px; margin-top: -45px; font-size: 10px;">21:13</div>
				</a>
			</li>
			<li class="mui-table-view-cell mui-media">
				<a href="{{ _asset('mobile/message/chat/8') }}">
					<div class="head-icon">
						<img class="mui-media-object mui-pull-left" src="{{ _asset('assets/syrator/wap/images/logo_default.png') }}"></<img>
					</div>					
					<div class="mui-media-body" style="font-size: 14px;">
						张师傅
						<p class='mui-ellipsis' style="font-size: 12px;">对方发来一个表情</p>
					</div>
					<div class="message-send-time" style="float:right; height: 40px; line-height: 20px; margin-top: -45px; font-size: 10px;">21:13</div>
				</a>
			</li>
		</ul>
	</div>
</div>
@stop