@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/bootstrap-fileupload.css') }}" />
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
<div class="page-container row-fluid">
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
					<h3 class="page-title">参数配置  <small> 系统相关参数的配置</small></h3>
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
					<p class="text-red">请在超级管理员协助下修改系统配置选项，错误或不合理的修改可能会造成系统运行错误。本表单不对数据做任何校验处理，请务必输入正确与合法的数据。</p>	  
					<div class="portlet box blue tabbable">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-reorder"></i>
								<span class="hidden-480">参数配置</span>
							</div>
						</div>
						<div class="portlet-body form">
							<div class="tabbable portlet-tabs">
								<ul class="nav nav-tabs">
									<li><a href="#portlet_tab2" data-toggle="tab">系统参数</a></li>
									<li class="active"><a href="#portlet_tab1" data-toggle="tab">网站参数</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="portlet_tab1">
										<form method="post" action="{{ _route('admin:system.option') }}" class="form-horizontal" accept-charset="utf-8" >
											{!! method_field('put') !!}
                                            {!! csrf_field() !!}
											<div class="control-group">
												<label class="control-label">网站标题</label>
												<div class="controls">
													<input type="text" class="m-wrap large" name="data[website_title]" autocomplete="off" value="{{ $data['website_title'] }}" placeholder="网站标题">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">网站关键词</label>
												<div class="controls">
													<input type="text" class="m-wrap large"" name="data[website_keywords]" autocomplete="off" value="{{ $data['website_keywords'] }}" placeholder="网站关键词，多个词请以英文逗号分隔">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">公司全称</label>
												<div class="controls">
													<input type="text" class="m-wrap large" name="data[company_full_name]" autocomplete="off" value="{{ $data['company_full_name'] }}" placeholder="公司全称">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">公司简称</label>
												<div class="controls">
													<input type="text" class="m-wrap large" name="data[company_short_name]" autocomplete="off" value="{{ $data['company_short_name'] }}" placeholder="公司简称">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">公司电话</label>
												<div class="controls">   
													<input type="text" class="m-wrap large" name="data[company_telephone]" autocomplete="off" value="{{ $data['company_telephone'] }}" placeholder="公司电话">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">网站备案号</label>
												<div class="controls">   
													<input type="text" class="m-wrap large" name="data[website_icp]" autocomplete="off" value="{{ $data['website_icp'] }}" placeholder="网站备案号">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">后台分页大小</label>
												<div class="controls">
													<select class="small m-wrap" tabindex="1" data-placeholder="后台分页大小" name="data[page_size]">		
                                                        <option value="10" {{ ($data['page_size'] === "10") ? 'selected':'' }}>10</option>
                                                        <option value="15" {{ ($data['page_size'] === "15") ? 'selected':'' }}>15</option>
                                                        <option value="20" {{ ($data['page_size'] === "50") ? 'selected':'' }}>20</option>
                                                        <option value="25" {{ ($data['page_size'] === "25") ? 'selected':'' }}>25</option>
													</select>
												</div>
											</div>
        									<div class="control-group">
        										<label class="control-label">图片水印 </label>
        										<div class="controls">
        											<div class="fileupload fileupload-new" data-provides="fileupload">
        												<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
        													<img src="" alt="" />
        												</div>
        												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
        												<div>
        													<span class="btn btn-file"><span class="fileupload-new">选择图片</span>
        													<span class="fileupload-exists">修改</span>
        													<input type="file" class="default" /></span>
        													<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
        												</div>
        											</div>
                                                	<input type="text" class="form-control" id="picture_watermark" name="data[picture_watermark]" value="{{ $data['picture_watermark'] }}" placeholder="水印图片地址：如{{ url('') }}/assets/img/syrator_logo.png" readonly="readonly">
        										</div>
        									</div>
											<div class="control-group">
												<label class="control-label">上传图片是否添加水印</label>
												<div class="controls">
													<label class="radio"><input type="radio" name="data[is_watermark]" value="0" {{($data['is_watermark'] === '0')?'checked':''}}/>否</label>
													<label class="radio"><input type="radio" name="data[is_watermark]" value="1" {{($data['is_watermark'] === '1')?'checked':''}}/>是</label>   
												</div>
											</div>										
											<div class="form-actions">
												<button type="submit" class="btn blue"><i class="icon-ok"></i> 更新配置</button>
											</div>
										</form>										
									</div>
									<div class="tab-pane " id="portlet_tab2">
										<form>
										</form>
									</div>
									<div id="layerPreviewPic" class="fn-hide"></div>
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
<script type="text/javascript" src="{{ _asset(ref('layer.js')) }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/bootstrap-fileupload.js') }}"></script>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
   App.init();
   FormComponents.init();
});

@include('admin.scripts.endSinglePic')
</script>
@stop
