@extends('diary::desktop._layout._member')

@section('css_page_level_plugins')
@parent
<link href="{{ _asset('assets/metronic/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('js_page_level_plugins')
@parent
<script src="{{ _asset('assets/metronic/global/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
@stop

@section('js_page_level')
@parent
<script src="{{ _asset('assets/syrator/js/datatables/jquery.dataTables.columnFilter.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/syrator/js/datatables/table-expand.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/lib/layer-2.x/layer.js') }}" type="text/javascript"></script>
@stop

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('home', 'member') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>控制台</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
			<div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i>角色列表</div> 
                <div class="actions">
                    <a href="{{ _route('member:game.role.create') }}" class="btn btn-default btn-sm">
                    	<i class="fa fa-plus"></i>
                    	<span>新增</span>
                    </a>
                    <a href="{{ _route('member:game.role.removebatch') }}" class="btn btn-default btn-sm" id="removebatch">
                    	<i class="fa fa-times"></i>
                    	<span>删除</span>
                    </a>
                    <div class="btn-group">
                        <a class="btn btn-default dropdown-toggle" href="#" data-toggle="dropdown">                        	
                            <span class="hidden-xs">显示列  </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
        				<ul id="syrator_table_column_toggler" class="dropdown-menu dropdown-checkboxes pull-right" role="menu">
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="1">名称<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="2">位置<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="3">资质<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="4">定位<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="5">分组<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="6">身份<span></span></label></li>
    					</ul>					
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-default" href="javascript:;" data-toggle="dropdown">
                            <i class="fa fa-share"></i>
                            <span class="hidden-xs"> 工具</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right" id="syrator_table_tools">
                            <li><a href="javascript:;" data-action="0" class="tool-action"><i class="icon-printer"></i> 打印</a></li>
                            <li><a href="javascript:;" data-action="1" class="tool-action"><i class="icon-check"></i> 复制</a></li>
                            <li><a href="javascript:;" data-action="2" class="tool-action"><i class="icon-doc"></i> 导出PDF</a></li>
                            <li><a href="javascript:;" data-action="3" class="tool-action"><i class="icon-paper-clip"></i> 导出Excel</a></li>
                            <li><a href="javascript:;" data-action="4" class="tool-action"><i class="icon-cloud-upload"></i> 导出CSV</a></li>
                        </ul>
                    </div>
    			</div>
            </div>
            <div class="portlet-body">
				<table class="table table-striped table-bordered table-hover table-checkable order-column" id="syrator_table">
					<thead>
                        <tr>
                            <th style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#syrator_table .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
							<th>名称</th>
							<th>位置</th>
							<th>资质</th>
							<th>定位</th>
							<th>分组</th>
							<th>身份</th>
                            <th style="width:68px;text-align:center;">操作</th>
                        </tr>
                    </thead>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th class="filter_column_select">位置</th>
							<th class="filter_column_select">资质</th>
							<th class="filter_column_select">定位</th>
							<th class="filter_column_select">分组</th>
							<th class="filter_column_select">身份</th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
                        @foreach ($listEntity as $per)
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td>{{ $per->name }}</td>
                            <td>{{ $per->position }}</td>
                            <td>{{ $per->quality }}</td>
                            <td>{{ $per->type }}</td>
                            <td>{{ $per->catalog }}</td>
                            <td>{{ $per->group }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a item-id="{{ $per->id }}" href="{{ _route('member:game.role.show', $per->id) }}" class="btn btn-xs layer_open" target="_blank" >
                            		<i class="fa fa-eye"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="{{ _route('member:game.role.edit', $per->id) }}" class="btn btn-xs">
                            		<i class="fa fa-pencil-square-o"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="{{ _route('member:game.role.remove', $per->id) }}" class="btn btn-xs remove">
                            		<i class="fa fa-trash-o"></i>
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
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {
	
    var selectValues = new Array('圣斗士','冥斗士','海斗士');
    TableExpand.init({
	    aoColumns: [
    	    null, 
    	    null, 
    	    {type: "select", values: ['前排','中排','后排']}, 
    	    {type: "select", values: ['14','13','12']}, 
    	    {type: "select", values: ['输出','双系输出','物理输出','念力输出','物理防御','念力防御','治疗','控制','辅助']}, 
    	    {type: "select", values: ['1','2','3','4','5']}, 
    	    {type: "select", values: ['圣斗士','冥斗士','海斗士']}, 
    	    null, 
	    ]
	},"syrator_table");

    $(document).on("click","a.remove",function(evt) {
        var itemId = $(this).attr("item-id");
        var postUrl = $(this).attr("href");        
    	if(confirm("删除后数据将无法恢复，您确定要删除?")) {
            $.post(postUrl, {
            	 _token:$('meta[name="_token"]').attr('content'),
                 delId:itemId,
            }, function(data) {
                 if(data.code == 200){
                     alert(data.message);
                     location.reload();
                 } else {
                     alert(data.message);
                 }
            },"json");
      	}

      	return false;
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

        var postUrl = $(this).attr("href");  
    	if(confirm("删除后数据将无法恢复，您确定要删除?")){
            $.post(postUrl, {
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

      	return false;
    });
});
</script>
@stop