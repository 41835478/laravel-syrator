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
@stop

@section('filledScript')
<script>

function initCatSelectTree() {
	var dData = new Array();
    @foreach ($catalogs as $k => $v)
	dData[{{$k}}] = $.parseJSON('{!!$v!!}');
    @endforeach
	var dCatalogs = new Array();
	dCatalogs[0] = {id: -1, pId: -1, name:"顶级分类"};
	for(var i=0; i<dData.length; i++) {
		dCatalogs[i+1] = dData[i];
	}
	
    var setting = {
    	view: {
    		dblClickExpand: false
    	},
    	data: {
    		simpleData: {
    			enable: true,
    			idKey: "id",
    			pIdKey: "pid",
    			rootPId: null
    		}
    	},
    	callback: {
    		onClick: onClick
    	}
    };

	$.fn.zTree.init($("#select_tree_items_cat_id"), setting, dCatalogs);
}

function onClick(e, treeId, treeNode) {
	var zTree = $.fn.zTree.getZTreeObj("select_tree_items_cat_id"),
	nodes = zTree.getSelectedNodes(),
	v = "";
	nodes.sort(function compare(a,b){return a.id-b.id;});
	for (var i=0, l=nodes.length; i<l; i++) {
		v += nodes[i].name + ",";
	}
	if (v.length > 0 ) v = v.substring(0, v.length-1);
	var parentObj = $("#cat_id");
	parentObj.attr("value", v);
	hideCatalogSelectTree();
}

function showCatalogSelectTree() {
	var parentObj = $("#cat_id");
	var cityOffset = $("#cat_id").offset();
	$("#select_tree_cat_id").css({
		left:cityOffset.left + "px", 
		top:cityOffset.top + parentObj.outerHeight() + "px"}
	).slideDown("fast");

	$("#select_tree_cat_id").addClass("active");
	$("body").bind("mousedown", onBodyDown);
}
function hideCatalogSelectTree() {
	$("#select_tree_cat_id").fadeOut("fast");
	$("body").unbind("mousedown", onBodyDown);
	$("#select_tree_cat_id").removeClass("active");
}
function onBodyDown(event) {
	if (!(event.target.id == "btn_cat_id" 
		|| event.target.id == "select_tree_cat_id" 
		|| $(event.target).parents("#select_tree_cat_id").length>0)) {
		hideCatalogSelectTree();
	}
}

jQuery(document).ready(function() {    
    App.init();

	initCatSelectTree();

    var ue = UE.getEditor('content');   
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });

	$('#btn_cat_id').click(function(){
		if ($("#select_tree_cat_id").hasClass("active")) {
			hideCatalogSelectTree();
		} else {
			showCatalogSelectTree();
		}
	});
});
</script>
@stop
