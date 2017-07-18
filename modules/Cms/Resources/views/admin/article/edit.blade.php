@extends('cms::admin._layout._admin')

@section('css_page_level_plugins')
@parent
<link href="{{ _asset('assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('css_page_level')
@parent
<link href="{{ _asset('assets/lib/ztree/css/zTreeStyle/zTreeStyle.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ _asset('laravel-u-editor/xiumi/xiumi-ue-v5.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('js_page_level_plugins')
@parent
<script src="{{ _asset('assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@stop

@section('js_page_level')
@parent
<script src="{{ _asset('assets/lib/ztree/js/jquery.ztree.core.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/syrator/js/tree/ztree-expand.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/syrator/js/upload/upload.js') }}" type="text/javascript"></script>
@stop

@section('style_head')
@parent
<style>
.form-horizontal .form-group {
	padding-right:5px;
}
</style>
@stop

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('admin', 'cms') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{ site_url('admin/article', 'cms') }}"">文章管理</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
    	<span>编辑文章</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit portlet-form bordered ">
        	<div class="portlet-title">
        		<div class="caption"><i class="fa fa-gift"></i>编辑文章</div>
        	</div>
			<div class="portlet-body form">
				<form method="post" action="{{ _route('cms:admin.article.article.update', $entity->id) }}" accept-charset="utf-8" class="form-horizontal" role="form">
                    {!! method_field('put') !!}
                    {!! csrf_field() !!}
                    <div class="form-body">
                        @include('_widgets.edit.form-group')
    					<div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
    								<button type="submit" class="btn blue"><i class="icon-ok"></i> 更新文章</button>
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

@include('UEditor::head')
<script>
jQuery(document).ready(function() {    
    App.init();

	var dData = new Array();
    @foreach ($catalogs as $k => $v)
	dData[{{$k+1}}] = $.parseJSON('{!!$v!!}');
    @endforeach
    dData[0] = {id: -1, pId: -1, name:"顶级分类"};
    var catSelectTree = new ZTreeExpand("catalog_id", dData);
    catSelectTree.init();

    if($('#content').hasClass('form-control')){
    	$('#content').removeClass('form-control');
    }
    var ue = UE.getEditor('content');   
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });

    $('#submit_upload_picture_thumb').click(function(){
        var resultFile = $("#file_picture_thumb").get(0).files[0];    	  	
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
                $("#picture_thumb_thumb")[0].value = data.data.uploaded_full_file_name;
            },
            error: function(){
                alert('上传失败');
            }
        };
        $.ajax(options);
    });
});
</script>
<script src="{{ _asset('laravel-u-editor/xiumi/xiumi-ue-dialog-v5.js') }}"></script>
@stop
