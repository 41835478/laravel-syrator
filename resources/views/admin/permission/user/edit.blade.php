@extends('admin._layout._admin')

@section('css_page_level_plugins')
@parent
<link href="{{ _asset('assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('css_page_level')
@parent
<link href="{{ _asset('assets/metronic/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('js_page_level_plugins')
@parent
<script src="{{ _asset('assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
@stop

@section('js_page_level')
@parent
<script src="{{ _asset('assets/metronic/pages/scripts/profile.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/syrator/js/upload/upload.js') }}" type="text/javascript"></script>
@stop

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('home', 'admin') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{ site_url('permission/user', 'admin') }}">管理员管理</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
    	<span>编辑管理员</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue ">
        	<div class="portlet-title">
        		<div class="caption"><i class="fa fa-gift"></i>编辑管理员</div>
        	</div>
			<div class="portlet-body form">
				<form method="post" action="{{ _route('admin:permission.user.update', $user->id) }}" accept-charset="utf-8" class="form-horizontal" role="form">
                    {!! method_field('put') !!}
                    {!! csrf_field() !!}
                    <div class="form-body">
                        @include('_widgets.edit.control-group')
                        <div class="form-group">
    						<label class="control-label col-md-3">头像</label>
    						<div class="col-md-4">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                    @if (empty($user->avatar))
                                        <img src="http://www.placehold.it/150x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    @else
                                    	<img src="{{ $user->avatar }}" alt="" />
                                    @endif
                                        <img src="http://www.placehold.it/150x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;">
                                    </div>
                                    <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> 选择图片 </span>
                                            <span class="fileinput-exists"> 修改 </span>
                                            <input type="file" name="file_picture" id="file_picture" accept=".jpg,.png,.gif,.bmp" >
                                        </span>
                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> 移除 </a>
        								<a id="uploadSubmit_picture" class="btn default fileinput-exists">上传</a>
                                    </div>
                                    <input type="hidden" id="picture" name="avatar" value="{{$user->avatar}}">
                                </div>
							</div>
                        </div>
    					<div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
    								<button type="submit" class="btn blue"><i class="icon-ok"></i> 更新管理员</button>
                                </div>
                            </div>
                        </div>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();
    
    //ajax
    $('#uploadSubmit_picture').click(function(){
        var resultFile = $("#file_picture").get(0).files[0];    	  	
    	var formData = new FormData();
    	formData.append("picture",resultFile,resultFile.name);
    	var options = {
	        type: 'post',
			url:'/api/upload/single',
	        dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
            timeout: 3000,
            success: function (data) {
                alert('上传成功');
                $("#picture")[0].value = data.data.uploaded_full_file_name;
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