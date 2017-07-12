@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/bootstrap-fileupload.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/chosen.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/profile.css') }}" />
@stop

@section('content') 
<div class="page-container row-fluid" style="height:116px !important;">
	<div class="page-content" style="margin-left: 0px !important; padding: 0px !important; height:116px !important; min-height: 106px !important;">
		<div class="container-fluid" style="padding-left: 0px; padding-right: 0px; height:116px !important;">
			<div class="row-fluid" style="height:76px !important; padding-top:38px;">
				<div class="span12">                 
                    <div class="portlet light portlet-fit portlet-form bordered " style="border: 0px solid #b4cef8; margin-bottom: 0px;">
						<div class="portlet-body form" style="padding:0px">
                            <div class="control-group" style="margin: 0px !important;">
								<div class="controls" style="margin-left: 120px;">
									<div class="fileupload fileupload-new" data-provides="fileupload" style="margin-bottom: 0px;">
										<input type="hidden">
										<div class="input-append">
											<div class="uneditable-input" style="width: 280px; height:34px;">
												<i class="icon-file fileupload-exists"></i> 
												<span class="fileupload-preview"></span>
											</div>
											<span class="btn btn-file">
											<span class="fileupload-new">选择文件</span>
											<span class="fileupload-exists">修改</span>
											<input id="file-import" type="file" class="default">
											</span>
											<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
											<button id="submit-import" type="submit" class="btn blue">确定</button>
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

@section('extraPlugin')
@parent
<script type="text/javascript" src="{{ _asset('assets/metronic/js/bootstrap-fileupload.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/form-components.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/chosen.jquery.min.js') }}"></script>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();

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
