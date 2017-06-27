@extends('_layout._common')

@section('head_css')
@parent
<link href="{{ _asset('lib/treetable/stylesheets/jquery.treetable.css') }}" rel="stylesheet" type="text/css"/>
<style>
.portlet.box .portlet-body {
	padding: 0px !important;
}

.list-div {
	width: 100%;
	background: #ffffff;
}
.list-div table {
	width: 100%;
	background: #dddddd;
	border-collapse:separate;
	border-spacing:2px;
}
.list-div th {
	line-height: 35px;	
    font-size: 14px;
    font-weight: 400;	
	color: #3c8dbc;
	text-align:center;
	background: #ffffff;	
}
.list-div td {
	background: #FFF;
	padding: 10px;
}
.list-div td.first-cell {
	font-weight: bold;
	padding-left: 10px;
}

</style>
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

@section('content') 
<div class="page-container row-fluid">
	@include('cms::_widgets._main-sidebar')
	<div class="page-content">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">类别管理  <small> 文章类别管理</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('admin', 'cms') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">类别管理</a></li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
            	<div class="span12">
            		<div class="portlet box purple">            		
                        @if(session()->has('fail'))
                        <div class="alert alert-warning alert-dismissable">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        	<h4>
                        		<i class="icon icon fa fa-warning"></i> 提示！
                        	</h4>
                        	{{ session('fail') }}
                        </div>
                        @endif 
                        
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissable">
                        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
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
            			<div class="portlet-title">
            				<div class="caption"><i class="icon-comments"></i>分类列表</div>
            				<div class="tools">
            					<a class="add" href="{{ _route('cms:admin.article.catalog.create') }}" ></a>
            					<a class="reload" id="reload"></a>
            				</div>
            			</div>
            			<div class="list-div portlet-body">				
                    		<table id="catalogs">
                    			<thead>
                                    <tr>
                    					<th>名称</th>
                    					<th>描述</th>
                    					<th>排序</th>
                    					<th>是否显示</th>
                    					<th>操作</th>
                                    </tr>
                                </thead>
                                <tbody id="catalogs_body">
                                </tbody>
                    		</table>
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
<script src="{{ _asset('lib/treetable/javascripts/jquery.treetable-ajax-persist.js') }}"></script>
<script src="{{ _asset('lib/treetable/javascripts/jquery.treetable-3.0.0.js') }}"></script>
<script src="{{ _asset('lib/treetable/javascripts/persist-min.js') }}"></script>
<script src="{{ _asset(ref('layer.js')) }}"></script>
@stop

@section('filledScript')
<script>
//主方法，运用递归实现  
function createTableTree(data){
	var html = "";
	if(data != null) {
		if (data.pid > 0) {
			html += '<tr data-tt-id="' + data.id +'" data-tt-parent-id="' + data.pid +'">';
		} else {
			html += '<tr data-tt-id="' + data.id +'">';
		}		
		html += '<td>' + data.name + '</td>';
		html += '<td>' + data.description + '</td>';
		html += '<td style="text-align:center;">' + data.sort_num + '</td>';
		if (data.is_show==1) {
			html += '<td class="text-red" style="text-align:center;"><i class="icon-ok"></i></td>';
		} else {
			html += '<td class="text-red" style="text-align:center;"><i class="icon-remove"></i></td>';
		}
		html += '<td style="text-align:center;">';
		html += '<a href="{{ _asset('cms/admin/article/catalog/') }}/' + data.id + '" class="layer_open"><i class="icon-eye-open" title="查看"></i></a>|';
		html += '<a href="{{ _asset('cms/admin/article/catalog/') }}/' + data.id + '/edit" class="edit" ><i class="icon-edit" title="编辑"></i></a>|';
		html += '<a href="javascript:void(0);" delid="' + data.id + '" class="remove" ><i class="icon-trash" title="删除"></i></a>';
		html += '</td>';
		html += "</tr>" ;
		if(data.sub_catalogs != null) {		
			for(var i=0; i<data.sub_catalogs.length; i++) {
				html += createTableTree(data.sub_catalogs[i]);				
			}
		}
	}  

	return html;  
}

function loadData() {
	$.ajax({
		type:'post',
		url:'/api/article/getcatalogs',
		dataType:'json',
		async:true,
		success:function(data) {
			var code = data['code'];
			if(code == "200") {
				var d = data['data'];
								
				var html = "";
				for(var i=0; i<d.length; i++) {
					html += createTableTree(d[i]);	
				}
				$("#catalogs").append(html);
	
				$(document).ready(function(){
                	$("#catalogs").agikiTreeTable({theme:"vsStyle", persist: true, persistStoreName: "files"});
                });
                
                // 添加查看
                $('a.layer_open').on('click', function(evt){
                	evt.preventDefault();
                    var that = this;
                    var src = $(this).attr("href");
                    var title = $(this).data('title');
                    layer.open({
                    	type: 2,
                        title: title,
                        shadeClose: false,
                        shade: 0,
                        area: ['540px', '320px'],
                        content: src //iframe的url
                    });
                });
			} else {
				alert("读取内容失败");
			}
		}
	});
}
</script>
<script>
jQuery(document).ready(function() {    
    App.init();

    loadData();

    document.getElementById("reload").onclick = function() {
    	var objCatalogs = document.getElementById("catalogs_body");
    	objCatalogs.innerHTML = "";
    	loadData();
    };

    $(document).on("click","a.remove",function(evt) {
        var delId = $(this).attr("delId");
    	if(confirm("删除后数据将无法恢复，您确定要删除?")){
            $.post("{{ URL('cms/admin/article/catalog/remove') }}", {
            	 _token:$('meta[name="_token"]').attr('content'),
                 delId:delId,
            }, function(data){
                 if(data.code == 200){
                     alert(data.message);
                     location.reload();
                 } else {
                     alert(data.message);
                 }
            },"json");
      	}
    });
});
</script>
@stop
