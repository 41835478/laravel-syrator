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
					<div class="portlet box blue tabbable">
						<div class="portlet-title">
							<div class="caption">
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
										<form method="post" action="{{ _route('admin:system.option') }}" class="form-horizontal" accept-charset="utf-8" id="formTab1">
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
												<label class="control-label">网站描述</label>
												<div class="controls">
													<input type="text" class="m-wrap large"" name="data[website_description]" autocomplete="off" value="{{ $data['website_description'] }}" placeholder="网站描述">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">网站备案号</label>
												<div class="controls">   
													<input type="text" class="m-wrap large" name="data[website_icp]" autocomplete="off" value="{{ $data['website_icp'] }}" placeholder="网站备案号">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">公司全称</label>
												<div class="controls">
													<input type="text" class="m-wrap large" name="data[organization_fullname]" autocomplete="off" value="{{ $data['organization_fullname'] }}" placeholder="公司全称">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">公司简称</label>
												<div class="controls">
													<input type="text" class="m-wrap large" name="data[organization_nickname]" autocomplete="off" value="{{ $data['organization_nickname'] }}" placeholder="公司简称">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">公司电话</label>
												<div class="controls">   
													<input type="text" class="m-wrap large" name="data[organization_telephone]" autocomplete="off" value="{{ $data['organization_telephone'] }}" placeholder="公司电话">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">公司地址</label>
												<div class="controls">   
													<input type="text" class="m-wrap large" name="data[organization_address]" autocomplete="off" value="{{ $data['organization_address'] }}" placeholder="公司地址">
												</div>
											</div>
											<div class="form-actions">
												<button type="submit" class="btn blue" id="updateOptions1"><i class="icon-ok"></i> 更新配置</button>
											</div>
										</form>										
									</div>
									<div class="tab-pane " id="portlet_tab2">
										<form method="post" action="{{ _route('admin:system.option') }}" class="form-horizontal" accept-charset="utf-8" id="formTab2">
        									{!! method_field('put') !!} 
                                            {!! csrf_field() !!}
											<div class="control-group">
												<label class="control-label">系统版本号</label>
												<div class="controls">
													<input type="text" class="m-wrap large" name="data[version_code]" autocomplete="off" value="{{ $data['version_code'] }}" placeholder="系统版本号">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">系统版本名</label>
												<div class="controls">
													<input type="text" class="m-wrap large" name="data[version_name]" autocomplete="off" value="{{ $data['version_name'] }}" placeholder="系统版本名">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">版本更新说明</label>
												<div class="controls">
													<input type="text" class="m-wrap large" name="data[version_log]" autocomplete="off" value="{{ $data['version_log'] }}" placeholder="版本更新说明">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">系统开发者</label>
												<div class="controls">
													<input type="text" class="m-wrap large" name="data[author_name]" autocomplete="off" value="{{ $data['author_name'] }}" placeholder="系统开发者">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">开发者网站</label>
												<div class="controls">
													<input type="text" class="m-wrap large" name="data[author_url]" autocomplete="off" value="{{ $data['author_url'] }}" placeholder="系统开发者网站">
												</div>
											</div>
											<div class="form-actions">
												<button type="submit" class="btn blue" id="updateOptions2"><i class="icon-ok"></i> 更新配置</button>
											</div>
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
</div>
@stop

@section('extraPlugin')
@parent
<script type="text/javascript" src="{{ _asset('assets/metronic/js/bootstrap-fileupload.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/form-components.js') }}"></script>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();
    FormComponents.init();

    //ajax
    $('#uploadSubmit_picture_watermark').click(function(){
        var resultFile = $("#file_picture_watermark").get(0).files[0];    	  	
    	var formData = new FormData();
    	formData.append("_token",$('meta[name="_token"]').attr('content'));
    	formData.append("picture",resultFile,resultFile.name);
    	var options = {
            type: 'post', 
            url: "{{ _route('admin:upload.picture.store') }}", 
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
            timeout: 3000,
            success: function (data) {
                alert('上传成功');
                $("#picture_watermark")[0].value = data.info;
            },
            error: function(){
                alert('上传失败');
            }
        };
        $.ajax(options);
    });

    //ajax
    $('#uploadSubmit_system_logo').click(function(){
        var resultFile = $("#file_system_logo").get(0).files[0];    	  	
    	var formData = new FormData();
    	formData.append("_token",$('meta[name="_token"]').attr('content'));
    	formData.append("picture",resultFile,resultFile.name);
    	var options = {
            type: 'post', 
            url: "{{ _route('admin:upload.picture.store') }}", 
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
            timeout: 3000,
            success: function (data) {
                alert('上传成功');
                $("#system_logo")[0].value = data.info;
            },
            error: function(){
                alert('上传失败');
            }
        };
        $.ajax(options);
    });
});
</script>
@stop
