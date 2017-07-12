@extends('cms::admin._layout._admin')

@section('css_page_level')
@parent
<link href="{{ _asset('assets/lib/ztree/css/zTreeStyle/zTreeStyle.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('js_page_level')
@parent
<script src="{{ _asset('assets/lib/ztree/js/jquery.ztree.core.js') }}"></script>
<script src="{{ _asset('assets/syrator/js/tree/ztree-expand.js') }}"></script>
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
    	<span>新增文章类别</span>
    </li>
</ul>
@stop

@include('UEditor::head')

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit portlet-form bordered ">
        	<div class="portlet-title">
        		<div class="caption"><i class="fa fa-gift"></i>新增文章类别</div>
        	</div>
			<div class="portlet-body form">
				<form method="post" action="{{ _route('cms:admin.article.catalog.store') }}" accept-charset="utf-8" class="form-horizontal" role="form">
                    {!! csrf_field() !!}
                    <div class="form-body">
                        @include('_widgets.edit.control-group')
    					<div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
    								<button type="submit" class="btn blue"><i class="icon-ok"></i> 新增文章类别</button>
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

	var dData = new Array();
    @foreach ($catalogs as $k => $v)
	dData[{{$k+1}}] = $.parseJSON('{!!$v!!}');
    @endforeach
    dData[0] = {id: -1, pId: -1, name:"顶级分类"};
    var catSelectTree = new ZTreeExpand("pid", dData);
    catSelectTree.init();

    if($('#description').hasClass('form-control')){
    	$('#description').removeClass('form-control');
    }
    var ue = UE.getEditor('description');   
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });
});
</script>
@stop
