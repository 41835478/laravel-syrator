@extends('cms::admin._layout._admin')

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

@section('content')
<div class="page-wrapper" style="margin-left: 0px !important; padding: 0px !important; height:116px !important; min-height: 106px !important;">
	<div class="page-container" style="margin-left: 0px !important; padding: 0px !important; height:116px !important; min-height: 106px !important;">
		<div class="page-content-wrapper" style="margin-left: 0px !important; padding: 0px !important; height:116px !important; min-height: 106px !important;">
			<div class="page-content" style="margin-left: 0px !important; padding: 0px !important; height:116px !important; min-height: 106px !important;">
                <div class="row" style="margin-left: 0px !important; padding: 0px !important; height:116px !important; min-height: 106px !important;">
                    <div class="col-md-12">                 
                        <div class="portlet-body form">
    						<div class="form-horizontal">
                                <div class="form-body">
    								<div class="form-group">
    									<div class="col-md-4">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview fileinput-exists" style="width: 280px; height:34px;display: inline-block; border: 1px solid #ddd;"></div>
                                                <div style="float:right;">
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> 选择文件 </span>
                                                        <span class="fileinput-exists"> 修改 </span>
                                                        <input type="file" name="file-import" id="file-import" accept=".xls,.xlsx,.csv" >
                                                    </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> 移除 </a>
                    								<a id="submit-import" class="btn default fileinput-exists">导入</a>
                                                </div>
                                                <input type="hidden" id="file" name="file" value="">
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
	</div>
</div>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {
    //ajax
    $('#submit-import').click(function(){
        var resultFile = $("#file-import").get(0).files[0];
        console.log(resultFile);
    	var formData = new FormData();
    	formData.append("_token",$('meta[name="_token"]').attr('content'));
    	formData.append("file",resultFile,resultFile.name);
    	var options = {
            type: 'post',
            url: "{{ _route('cms:admin.article.import') }}", 
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
            timeout: 3000,
            success: function (data) {
                alert(data.description);
                
                var index = parent.layer.getFrameIndex(window.name);                
                parent.layer.close(index); 
            },
            error: function(){
                alert('导入失败');
            }
        };
        $.ajax(options);
    });
});
</script>
@stop
