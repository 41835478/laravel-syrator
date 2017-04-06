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
                				<div class="control-group">
    								<label class="control-label">所属分类</label>
                    				<div class="controls">
                                        <input style="box-sizing: content-box;" type="text" class="m-wrap large" name="cat_id" id="cat_id" value="{{ old('cat_id', isset($material) ? $material->getCatName() : null) }}">
                                        <span class="input-group-btn">
                                        	<button type="button" class="btn btn-info btn-flat" id="cat_id_btn">选择</button>
                                        </span>         
                                        <div id="catalog_select_tree" class="menuContent" style="display:none;margin-right:55px;">
                                        	<ul id="catalog_select_tree_items" class="ztree" style="margin-top:0; width:160px;"></ul>
                                        </div>
                                    </div>  
                                </div>
								<div class="form-actions">
									<button type="submit" class="btn blue" id="updateOptions1"><i class="icon-ok"></i> 新增材料信息</button>
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

function loadData() {
	$.ajax({
		type:'post',
		url:'/api/material/getcatalogs',
		data: {
			format_type:'list'
    	},
		dataType:'json',
		async:true,
		success:function(data) {
			var code = data['code'];
			if(code == "200") {
				var dData = data['data'];
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

				$.fn.zTree.init($("#catalog_select_tree_items"), setting, dCatalogs);
			} else {
				alert("读取内容失败");
			}
		}
	});
}

function onClick(e, treeId, treeNode) {
	var zTree = $.fn.zTree.getZTreeObj("catalog_select_tree_items"),
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
	$("#catalog_select_tree").css({left:cityOffset.left + "px", top:cityOffset.top + parentObj.outerHeight() + "px"}).slideDown("fast");

	$("body").bind("mousedown", onBodyDown);
}
function hideCatalogSelectTree() {
	$("#catalog_select_tree").fadeOut("fast");
	$("body").unbind("mousedown", onBodyDown);
}
function onBodyDown(event) {
	if (!(event.target.id == "cat_id_btn" || event.target.id == "catalog_select_tree" || $(event.target).parents("#catalog_select_tree").length>0)) {
		hideCatalogSelectTree();
	}
}

jQuery(document).ready(function() {    
    App.init();

	loadData();

    var ue = UE.getEditor('content');   
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });

	var openFlag = false;
	$('#cat_id_btn').click(function(){
		if (!openFlag) {
			showCatalogSelectTree();
		} else {
			hideCatalogSelectTree();
		}

		openFlag = !openFlag;
	});
});
</script>
@stop
