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
	@include('wechat::_widgets._main-sidebar')
	<div class="page-content">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">微信接口基本配置</h3>
					<ul class="breadcrumb" style="margin-bottom: 0px;">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('', 'wechat') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">基本配置</a></li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
    				@if(session()->has('fail'))
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <h4>  <i class="icon icon fa fa-warning"></i> 提示！</h4>
                        {{ session('fail') }}
                    </div>
                    @endif
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <h4>  <i class="icon fa fa-check"></i> 提示！</h4>
                        {{ session('message') }}
                    </div>
                    @endif  
					<div class="portlet box blue">
						<div class="portlet-body form">
							<form method="post" action="{{ _route('wechat:params') }}" class="form-horizontal" accept-charset="utf-8" id="formTab1">
								{!! method_field('put') !!} 
                                {!! csrf_field() !!}
								<div class="control-group">
									<label class="control-label">AppID(应用ID)</label>
									<div class="controls">
										<input type="text" class="m-wrap large" name="data[app_id]" autocomplete="off" value="{{ $data['app_id'] }}" placeholder="">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">AppSecret(应用密钥)</label>
									<div class="controls">
										<input type="text" class="m-wrap large"" name="data[app_secret]" autocomplete="off" value="{{ $data['app_secret'] }}" placeholder="">
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn blue"><i class="icon-ok"></i> 更新配置</button>
								</div>
							</form>	
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
