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
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">重建缓存  <small> 清理系统缓存</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">重建缓存</a></li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#tab_1">重建缓存</a></li>
					</ul>
					<div class="tab-content">
						<div id="tab_1" class="tab-pane active">
							<div class="row-fluid">	
								<div class="span8 booking-search">						
                					@if(!empty($message))
                                    <div class="alert alert-success alert-dismissable">
                                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                    	<h4>
                                    		<i class="icon fa fa-check"></i> 提示！
                                    	</h4>
                                    	{{ $message }}
                                    </div>
                                    @endif
									<form method="post" action="{{ site_url('system/cache', 'admin') }}" accept-charset="utf-8">
										{!! csrf_field() !!}
										<div class="clearfix margin-bottom-10">
											<input type="checkbox" name="isCache" checked="">  重新建立缓存(更新内容或者刚安装完本系统之后，如果数据显示异常，请执行本方法)
										</div>
										<button type="submit" class="btn purple">立即更新缓存 </button>
									</form>
								</div>
							</div>
						</div>
					</div>
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