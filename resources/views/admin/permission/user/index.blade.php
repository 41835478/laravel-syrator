@extends('admin._layout._admin')

@section('css_page_level_plugins')
@parent
<link href="{{ _asset('assets/metronic/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('js_page_level_plugins')
@parent
<script src="{{ _asset('assets/metronic/global/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
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
        <a href="{{ site_url('home', 'admin') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
    	<span>管理员管理</span>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i>管理员列表</div> 
                <div class="actions">
                    <a href="{{ _route('admin:permission.user.create') }}" class="btn btn-default btn-sm">
                    	<i class="fa fa-plus"></i>
                    	<span>新增</span>
                    </a>
                    <a href="{{ _route('admin:permission.user.removebatch') }}" class="btn btn-default btn-sm" id="removebatch">
                    	<i class="fa fa-times"></i>
                    	<span>删除</span>
                    </a>
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
							<th>编号</th>
							<th>登录名 / 昵称</th>
							<th>真实姓名</th>
							<th style="width:120px;">角色</th>
							<th>状态</th>
							<th>最后登录时间</th>
							<th>创建时间</th>
							<th>更新时间</th>
                            <th style="width:68px;text-align:center;">操作</th>
                        </tr>
                    </thead>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th class="filter_column_select">选择角色</th>
							<th class="filter_column_select">选择状态</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
                        @foreach ($users as $per)
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->id }}</td>
                            <td class="text-green">{{ $per->username }} / {{ $per->nickname }}</td>
                            <td class="text-green">{{ $per->realname }}</td>
                            <td>
                                @if(null !== $per->roles->first())
                                	{{ $per->roles->first()->name }}({{ $per->roles->first()->display_name }})
                                @else
                                	NULL(空)
                                @endif
                            </td>
                            <td class="text-yellow">
                              @if($per->is_locked)
                              	锁定
                              @else
                              	正常
                              @endif
                            </td>
                            <td class="text-green">{{ $per->updated_at }}</td>
                            <td>{{ $per->created_at }}</td>
                            <td>{{ $per->updated_at }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a item-id="{{ $per->id }}" href="{{ _route('admin:permission.user.show', $per->id) }}" class="btn btn-xs layer_open">
                            		<i class="fa fa-eye"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="{{ _route('admin:permission.user.edit', $per->id) }}" class="btn btn-xs">
                            		<i class="fa fa-pencil-square-o"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="{{ _route('admin:permission.user.remove') }}" class="btn btn-xs remove">
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

	var selectValues = new Array();
    @foreach ($roles as $k => $v)
    selectValues[{{$k}}] = "{{ $v->name }}({{ $v->display_name }})";
    @endforeach
    
    TableExpand.init({
        aoColumns: [null, null, null, null, 
            {type: "select", values: selectValues}, 
            {type: "select", values: ['正常','锁定']}, 
            null, null, null, null,]
    	},
	    "syrator_table"
    );

    $(document).on("click","a.layer_open",function(evt) {
        evt.preventDefault();
        var that = this;
        var src = $(this).attr("href");
        var title = $(this).data('title');
        layer.open({
            type: 2,
            title: title,
            shadeClose: false,
            shade: 0,
            area: ['480px', '420px'],
            content: src
        });
    });

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