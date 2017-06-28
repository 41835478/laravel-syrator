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
			<div class="row-fluid" style="height:116px !important;">
				<div class="span12">                 
                    <div class="portlet box blue " style="border: 0px solid #b4cef8; margin-bottom: 0px;">
						<div class="portlet-body form" style="padding:0px">
							<form method="post" action="" accept-charset="utf-8" class="form-horizontal form-bordered form-label-stripped">
                                {!! method_field('put') !!}
                                {!! csrf_field() !!}
                                <div class="control-group" style="margin: 0px !important;">
									<label class="control-label" style="width: 100px;">导入的文件</label>
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
												<input type="file" class="default">
												</span>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
											</div>
										</div>
									</div>
								</div>
                            	<div class="form-actions" style="background-color: #ffffff;border-top: 0px solid #e5e5e5;margin: 0px !important; padding: 9px 2px 10px 288px;">
                            		<button type="submit" class="btn blue">确定</button>
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
<script type="text/javascript" src="{{ _asset('assets/metronic/js/chosen.jquery.min.js') }}"></script>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();
});
</script>
@stop
