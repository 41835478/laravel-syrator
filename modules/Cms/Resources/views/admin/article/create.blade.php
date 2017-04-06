@extends('_layout._common')

@section('head_css')
@parent
<link href="{{ _asset('lib/ztree/css/zTreeStyle/zTreeStyle.css') }}" rel="stylesheet" type="text/css"/>
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

@include('UEditor::head')

@section('content') 
<div class="page-container row-fluid">
	@include('cms::_widgets._main-sidebar')
	<div class="page-content">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">文章管理  <small> 新增文章</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('admin', 'cms') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{ site_url('admin/article', 'cms') }}">文章管理</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">新增文章</a></li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">                    
					@include('cms::_widgets._fail-message')
					@include('cms::_widgets._errors-message')                    
                    <div class="portlet box blue ">
                    	<div class="portlet-title">
                    		<div class="caption">新增文章</div>
                    	</div>
						<div class="portlet-body form">
							<form method="post" action="{{ _route('admin:mygz.material.material.store') }}" accept-charset="utf-8" class="form-horizontal form-bordered form-label-stripped">
                                {!! csrf_field() !!}
								@include('cms::_widgets._edit-control-group')
								<div class="form-actions">
									<button type="submit" class="btn blue" id="updateOptions1"><i class="icon-ok"></i> 新增</button>
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
<script src="{{ _asset('lib/ztree/js/jquery.ztree.core.js') }}"></script>
<script src="{{ _asset('assets/js/ztree-expand.js') }}"></script>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();

	var dData = new Array();
    @foreach ($catalogs as $k => $v)
	dData[{{$k}}] = $.parseJSON('{!!$v!!}');
    @endforeach
	var dCatalogs = new Array();
	dCatalogs[0] = {id: -1, pId: -1, name:"顶级分类"};
	for(var i=0; i<dData.length; i++) {
		dCatalogs[i+1] = dData[i];
	}
    var catSelectTree = new ZTreeExpand("cat_id", dCatalogs);
    catSelectTree.init();

    var ue = UE.getEditor('content');   
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });
});
</script>
@stop
