@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/select2_metro.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/DT_bootstrap.css') }}" />
<style>
.alert {
    padding: 14px 35px 8px 14px;
    margin-bottom: 0px;
    border: 1px solid #9d9c9c;
	border-left: 0;
	border-right: 0;
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
<div class="page-container">
	@include('cms::_widgets._main-sidebar')
	<div class="page-content">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">文章管理</h3>
					<ul class="breadcrumb" style="margin-bottom: 0px;">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('admin', 'cms') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">文章列表</a></li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">
					<div class="portlet box grey">
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
							<div class="caption">材料列表</div>
							<div class="actions">
								<div class="btn-group">
									<a href="{{ _route('cms:admin.article.article.create') }}" class="btn"><i class="icon-pencil"></i> 新增</a>
									<a href="javascript:void(0);" class="btn" id="removebatch"><i class="icon-remove"></i> 删除</a>
								</div>								
								<div class="btn-group">
									<a class="btn" href="#" data-toggle="dropdown">显示列<i class="icon-angle-down"></i></a>
									<div id="syrator_table_article_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
										<label><input type="checkbox" checked data-column="1">标题</label>
										<label><input type="checkbox" checked data-column="2">所属分类</label>
										<label><input type="checkbox" checked data-column="3">创建时间</label>
										<label><input type="checkbox" checked data-column="4">更新时间</label>
									</div>
								</div>								
								<div class="btn-group">
									<a class="btn green" href="#" data-toggle="dropdown"><i class="icon-cogs"></i> 工具<i class="icon-angle-down"></i></a>
									<ul class="dropdown-menu pull-right">
										<li><a href="{{ _route('cms:admin.article.import') }}" id="import-excel" data-title="导入"> 导入</a></li>
										<li><a href="{{ _route('cms:admin.article.export') }}"> 导出</a></li>
									</ul>
								</div>
							</div>	
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="syrator_table_article">
								<thead>
									<tr>
										<th style="width:8px;text-align:center;">
											<input type="checkbox" class="group-checkable" data-set="#syrator_table_article .checkboxes" />
										</th>			
										<th style="">标题</th>
										<th style="">所属分类</th>
										<th style="">创建时间</th>
										<th style="">更新时间</th>
                                        <th class="hidden-480" style="text-align:center;">操作</th>
									</tr>
								</thead>								
            					<tfoot>
            						<tr>
            							<th></th>
            							<th></th>	
            							<th>所属分类</th>
            							<th></th>
            							<th></th>
            							<th></th>
            						</tr>
            					</tfoot>
								<tbody>
                                    @foreach ($listEntity as $per)
                                    <tr class="odd gradeX">
										<td style="width:8px;text-align:center;">
											<input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
										</td>
                                        <td class="text-green">{{ $per->name }}</td>
                                        <td class="text-green">{{ $per->getCatalogName() }}</td>
                                        <td>{{ $per->created_at }}</td>
                                        <td>{{ $per->updated_at }}</td>
                    					<td style="text-align: center;">                                        	
                                        	<a target="_blank" href="{{ _route('cms:article.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                                        		<i class="icon-eye-open"></i>
                                        	</a>
                                        	<a href="{{ _route('cms:admin.article.article.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                                        		<i class="icon-edit"></i>
                                        	</a>
                                        	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                                        		<i class="icon-trash"></i>
                                        	</a>
                                        </td>
                                    </tr>
                                    @endforeach
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
<script type="text/javascript" src="{{ _asset('assets/metronic/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/jquery.dataTables.columnFilter.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/DT_bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/js/table-expand.js') }}"></script>
<script type="text/javascript" src="{{ _asset(ref('layer.js')) }}"></script>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();

    var selectValues = new Array();
    selectValues[0] = "顶级分类";
    @foreach ($catalogs as $k => $v)
    selectValues[{{$v->id}}] = "{{$v->name}}";
    @endforeach
    TableExpand.init({
		aoColumns: 
		[ 
			null,
            null,
            {type: "select", values: selectValues},
            null,
            null,
        ]
	}, "syrator_table_article");

    $(document).on("click","a.remove",function(evt) {
        var itemId = $(this).attr("item-id");
    	if(confirm("删除后数据将无法恢复，您确定要删除?")){
            $.post("{{ URL('cms/admin/article/remove') }}", {
            	 _token:$('meta[name="_token"]').attr('content'),
                 delId:itemId,
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

    $(document).on("click","#removebatch",function(evt) {
    	var itemIdsBoxes = $("input[class='checkboxes']");
        var length = itemIdsBoxes.length;
        var strIds = "";
        for(var i=0;i<length;i++){
            if(itemIdsBoxes[i].checked==true){
            	strIds = strIds + "," + itemIdsBoxes[i].value;
            }
        }
        
    	if(confirm("删除后数据将无法恢复，您确定要删除?")){
            $.post("{{ URL('cms/admin/article/removebatch') }}", {
            	 _token:$('meta[name="_token"]').attr('content'),
                 delId:strIds,
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

    $(document).on("click","#import-excel",function(evt) {
        evt.preventDefault();
        var that = this;
        var src = $(this).attr("href");
        var title = $(this).data('title');
        layer.open({
            type: 2,
            title: title,
            shadeClose: false,
            shade: 0,
            area: ['640px', '160px'],
            content: src
        });
    });
});
</script>
@stop
