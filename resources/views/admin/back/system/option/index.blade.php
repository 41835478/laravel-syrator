@extends('_layout._common')

@section('head_css')
@parent
@stop

@section('body_attr') class="page-header-fixed" @stop

@section('content-header')
@parent
@include('admin._widgets._main-header')
@stop

@section('content-footer')
@parent
@include('admin._widgets._main-footer')
@stop

@section('content')
<div class="page-container">
	@include('admin._widgets._main-sidebar')
	<div class="page-content">
		<div id="portlet-config" class="modal hide">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button"></button>
				<h3>Widget Settings</h3>
			</div>
			<div class="modal-body">
				Widget settings form goes here
			</div>
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">参数配置  <small> 系统相关参数的配置</small>
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">参数配置</a></li>
						<li class="pull-right no-text-shadow">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="icon-calendar"></i>
								<span></span>
								<i class="icon-angle-down"></i>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<form method="post" action="{{ _route('admin:system.option') }}" accept-charset="utf-8">
    				{!! method_field('put') !!}
        			{!! csrf_field() !!}
    				<div class="tabbable tabbable-custom tabbable-full-width">
    					<ul class="nav nav-tabs">
    						<li class="active"><a data-toggle="tab" href="#tab_1">网站参数</a></li>
    						<li><a data-toggle="tab" href="#tab_2">系统参数</a></li>
    					</ul>
    					<div class="tab-content">
    						<p class="text-red">请在超级管理员协助下修改系统配置选项，错误或不合理的修改可能会造成系统运行错误。本表单不对数据做任何校验处理，请务必输入正确与合法的数据。</p>
    						<div id="tab_1" class="tab-pane active">
    							<div class="row-fluid">	
    								<div class="span8 booking-search">						
                    					
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>    
    			</form>
				<div id="layerPreviewPic" class="fn-hide"></div>    
			</div>
		</div>
	</div>
</div>
@stop

@section('extraPlugin')
@parent
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
   App.init();
});
</script>
@stop
