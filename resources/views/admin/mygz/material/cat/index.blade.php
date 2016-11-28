@extends('admin.mygz.layout._back') 

@section('head_css')
@parent
<link href="{{ _asset('metronic-ex/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ _asset('metronic-ex/css/style-metro.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ _asset('metronic-ex/css/style.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ _asset('metronic-ex/css/style-responsive.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ _asset('metronic-ex/css/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ _asset('metronic-ex/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>

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

@section('content-header') 

@parent
<h1>
	分类管理<small>材料分类</small>
</h1>
<ol class="breadcrumb">
	<li><a href="{{ site_url('home', 'admin') }}"><i class="fa fa-home"></i> 主页</a></li>
	<li class="active">分类管理 - 材料分类</li>
</ol>
@stop 

@section('content') 

@if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	<h4>
		<i class="icon fa fa-check"></i> 提示！
	</h4>
	{{ session('message') }}
</div>
@endif

<div class="row-fluid">
	<div class="span6">
		<div class="portlet box purple">
			<div class="portlet-title">
				<div class="caption"><i class="icon-comments"></i>分类列表</div>
				<div class="tools">
					<a href="{{ _route('admin:mygz.material.cat.create') }}" class="add"></a>
					<a class="reload" id="reload"></a>
				</div>
			</div>
			<div class="list-div portlet-body">				
        		<table id="catalogs">
        			<thead>
                        <tr>
        					<th>分类名称</th>
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
@stop

@section('extraPlugin')
<script src="{{ _asset(ref('layer.js')) }}"></script>
<script src="{{ _asset('lib/treetable/javascripts/jquery.treetable-ajax-persist.js') }}"></script>
<script src="{{ _asset('lib/treetable/javascripts/jquery.treetable-3.0.0.js') }}"></script>
<script src="{{ _asset('lib/treetable/javascripts/persist-min.js') }}"></script>
@stop

@section('filledScript')

function reload() {
	var objCatalogs = document.getElementById("catalogs_body");
	objCatalogs.innerHTML = "";
	loadData();
}

var obj = document.getElementById("reload");
obj.onclick = reload;

loadData();
	
function loadData() {
	$.ajax({
		type:'post',
		url:'/api/material/getcatalogs',
		dataType:'json',
		async:true,
		success:function(data) {
			var code = data['code'];
			if(code == "200") {
				var d = data['data'];
				if(d.length == 0) {
					index--;
				}
				
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
                        area: ['600px', '360px'],
                        content: src //iframe的url
                    });
                });
			} else {
				alert("读取内容失败");
			}
		}
	});
}

// 主方法，运用递归实现  
function createTableTree(data){
	var html = "";
	if(data != null) {
		if (data.pid > 0) {
			html += '<tr data-tt-id="' + data.id +'" data-tt-parent-id="' + data.pid +'">';
		} else {
			html += '<tr data-tt-id="' + data.id +'">';
		}		
		html += '<td>' + data.name + '</td>';
		html += '<td style="text-align:center;">';
		html += '<a href="{{ _asset('admin/mygz/material/cat') }}/' + data.id + '/edit" class="edit" ><i class="fa fa-fw fa-pencil" title="编辑"></i></a>|';
		html += '<a href="{{ _asset('admin/mygz/material/cat/show') }}/' + data.id + '" class="layer_open" data-title="查看" data-width="400"><i class="fa fa-fw fa-link" title="查看"></i></a>|';
		html += '<a href="javascript:void(0);" delid="' + data.id + '" class="remove" ><i class="fa fa-fw fa-remove" title="删除"></i></a>';
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

$(document).on("click","a.remove",function(evt) {
    var delId = $(this).attr("delId");
	if(confirm("删除后数据将无法恢复，您确定要删除?")){
        $.post("{{ URL('admin/mygz/material/cat/remove') }}", {
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

@stop
