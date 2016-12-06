@extends('_layout._common')

@section('head_css')
@parent
<link href="{{ _asset('assets/metronic/css/jquery.gritter.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/css/jqvmap.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ _asset('assets/metronic/css/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen" />
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
					<h3 class="page-title">
						重建缓存  <small> 清理系统缓存</small>
					</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">重建缓存</a></li>
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
			<div id="dashboard">
				<div class="row-fluid">
					@if(!empty($message))
                    <div class="alert alert-success alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    	<h4>
                    		<i class="icon fa fa-check"></i> 提示！
                    	</h4>
                    	{{ $message }}
                    </div>
                    @endif
                    
                    <form method="post" action="{{ site_url('system/cache', 'admin') }}" accept-charset="utf-8">
                    	{!! csrf_field() !!}
                    	<div class="nav-tabs-custom">
                    		
                    		<ul class="nav nav-tabs">
                    			<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">重建缓存</a></li>
                    		</ul>
                    		
                    		<div class="tab-content">    		
                    			<div class="tab-pane active" id="tab_1">                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="checkbox" name="isCache" checked="">  重新建立缓存(更新内容或者刚安装完本系统之后，如果数据显示异常，请执行本方法)
                                        </div>
                                    </div>
                                </div><!-- /.tab-pane -->
                                
                                <button type="submit" class="btn btn-primary">立即更新缓存</button>
                            </div><!-- /.tab-content -->
                        </div>
                    </form>
				</div>
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