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
					<h3 class="page-title">新增APP欢迎页  <small> 新增APP启动时显示的欢迎导航页面</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{ site_url('system/appinfo/guide', 'admin') }}">APP欢迎页管理</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">新增APP欢迎页</a></li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
        			@if(session()->has('fail'))
                    <div class="alert alert-warning alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    	<h4>
                    		<i class="icon icon fa fa-warning"></i> 提示！
                    	</h4>
                    	{{ session('fail') }}
                    </div>
                    @endif 
                    
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    	<h4>
                    		<i class="icon fa fa-ban"></i> 警告！
                    	</h4>
                    	<ul>
                    		@foreach ($errors->all() as $error)
                    		<li>{{ $error }}</li> 
                    		@endforeach
                    	</ul>
                    </div>
                    @endif
                    <div class="portlet box blue ">
                    	<div class="portlet-title">
                    		<div class="caption">新增APP欢迎页</div>
                    	</div>
						<div class="portlet-body form">
							<form method="post" action="{{ _route('admin:system.appinfo.guide.store') }}" accept-charset="utf-8" class="form-horizontal form-bordered form-label-stripped">
                                {!! csrf_field() !!}								
								<div class="control-group">
									<label class="control-label">名称</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="name" autocomplete="off" value="{{ old('name', isset($entity) ? $entity->name : null) }}" placeholder="名称">
										<span class="help-inline"><small class="text-red">*</small></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">描述</label>
									<div class="controls">										
										<textarea type="text" class="m-wrap large" name="description" autocomplete="off" value="{{ old('description', isset($entity) ? $entity->description : null) }}" placeholder="描述"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">排序</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="sort_num" autocomplete="off" value="{{ old('sort_num', isset($catalog) ? $entity->sort_num : null) }}" placeholder="排序">
										<span class="help-inline text-green"><small>*</small> 默认为0</span>
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
												<input type="file" class="default" name="file_picture_watermark" id="file_picture_watermark" accept=".jpg,.png,.gif,.bmp" /></span>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
												<a id="uploadSubmit_picture_watermark" class="btn fileupload-exists">上传</a>
											</div>
											<input type="hidden" id="picture_watermark" name="url" value="">
										</div>                                                	
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">是否显示</label>
									<div class="controls">
										<label class="radio"><input type="radio" name="is_show" value="0" />否</label>
										<label class="radio"><input type="radio" name="is_show" value="1" checked />是</label>   
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn blue" id="updateOptions1"><i class="icon-ok"></i> 新增APP欢迎页</button>
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