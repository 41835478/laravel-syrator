@extends('admin.mygz.layout._back') 

@section('head_css')
<link href="{{ _asset('lib/ztree/css/zTreeStyle/zTreeStyle.css') }}" rel="stylesheet" type="text/css"/>
@parent
@stop

@section('content-header') 
@parent
<h1>
	分类管理 <small>材料分类</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
	<li><a href="{{ _route('admin:mygz.material.cat') }}">分类管理 - 材料分类</a></li>
	<li class="active">新增分类</li>
</ol>
@stop

@section('content') 
@if(session()->has('fail'))
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4>
		<i class="icon icon fa fa-warning"></i> 提示！
	</h4>
	{{ session('fail') }}
</div>
@endif 
@if($errors->any())
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
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
<form method="post" action="{{ _route('admin:mygz.material.cat.store') }}" accept-charset="utf-8">
	{!! csrf_field() !!}
	<div class="nav-tabs-custom">
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1">
				<div class="form-group">
					<label>分类名称 <small class="text-red">*</small></label> 
					<input type="text" class="form-control" name="name" autocomplete="off" value="{{ old('name') }}" placeholder="">
				</div>
				<div class="form-group">
    				<label>上级分类<small class="text-red">*</small></label> 
    				<div class="input-group">
                        <input class="form-control" type="text" name="parent" id="parent">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" id="catalog_parent_btn">选择</button>
                        </span>
                    </div>           
                    <div id="catalog_select_tree" class="menuContent" style="display:none;margin-right:55px;">
                    	<ul id="catalog_select_tree_items" class="ztree" style="margin-top:0; width:160px;"></ul>
                    </div> 
                </div>    
				<div class="form-group">
					<label>排序<small class="text-red">*</small></label> 
					<input type="text" class="form-control" name="sort_num" autocomplete="off" value="{{ old('sort_num') }}" placeholder="">
				</div>
				<div class="form-group">
					<label>是否展示<small class="text-red">*</small></label>
                    <div class="input-group">
                        <input type="radio" name="is_show" value="1" checked>
                        <label class="choice" for="radiogroup">是</label>
                        <input type="radio" name="is_show" value="0">
                        <label class="choice" for="radiogroup">否</label>
                  	</div>
				</div>				
				<div class="form-group">
					<label>关键字</label> 
					<input type="text" class="form-control" name="keywords" autocomplete="off" value="{{ old('keywords') }}" placeholder="">
				</div>
				<div class="form-group">
					<label>描述</label>
					<textarea class="form-control" name="description" cols="45" rows="2" maxlength="200" placeholder="" autocomplete="off">{{ old('description', isset($catalog) ? $catalog->description : null) }}</textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">确定</button>
		</div>
	</div>
</form>
@stop

@section('extraPlugin')
<script src="{{ _asset('lib/ztree/js/jquery.ztree.core.js') }}"></script>
@stop

@section('filledScript')

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
	var parentObj = $("#parent");
	parentObj.attr("value", v);
	hideCatalogSelectTree();
}

function showCatalogSelectTree() {
	var parentObj = $("#parent");
	var cityOffset = $("#parent").offset();
	$("#catalog_select_tree").css({left:cityOffset.left + "px", top:cityOffset.top + parentObj.outerHeight() + "px"}).slideDown("fast");

	$("body").bind("mousedown", onBodyDown);
}
function hideCatalogSelectTree() {
	$("#catalog_select_tree").fadeOut("fast");
	$("body").unbind("mousedown", onBodyDown);
}
function onBodyDown(event) {
	if (!(event.target.id == "catalog_parent_btn" || event.target.id == "catalog_select_tree" || $(event.target).parents("#catalog_select_tree").length>0)) {
		hideCatalogSelectTree();
	}
}

$(document).ready(function(){
	loadData();
});

var obj = document.getElementById("catalog_parent_btn");
obj.onclick = showCatalogSelectTree;

@stop
