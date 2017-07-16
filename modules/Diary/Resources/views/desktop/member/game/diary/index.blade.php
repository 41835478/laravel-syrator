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
        <a href="{{ site_url('game', 'member') }}">首页</a>
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
                <div class="caption"><i class="fa fa-globe"></i>日常培养明细</div> 
                <div class="actions">
                    <a href="{{ _route('member:game.diary.create') }}" class="btn btn-default btn-sm">
                    	<i class="fa fa-plus"></i>
                    	<span>新增</span>
                    </a>
                    <a href="{{ _route('member:game.diary.removebatch') }}" class="btn btn-default btn-sm" id="removebatch">
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
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="2">星级<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="3">魂石<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="4">觉醒<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="5">水晶<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="6">第六感<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="7">第七感<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="8">第八感<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="9">神感<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="10">神钢<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="11">头盔<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="12">肩甲<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="13">胸甲<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="14">腰带<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="15">护臂<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="16">护腿<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="17">好感度<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="18">圣器<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="19">等级<span></span></label></li>
    						<li><label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" checked data-column="20">战力<span></span></label></li>
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
							<th style="min-width:80px;">名称</th>
							<th>星级</th>
							<th>魂石</th>
							<th>觉醒</th>
							<th>水晶</th>
							<th>第六感</th>
							<th>第七感</th>
							<th>第八感</th>
							<th>神感</th>
							<th>神钢</th>
							<th>头盔</th>
							<th>肩甲</th>
							<th>胸甲</th>
							<th>腰带</th>
							<th>护臂</th>
							<th>护腿</th>
							<th>好感度</th>
							<th>圣器</th>
							<th>等级</th>
							<th>战力</th>
                            <th style="min-width:68px;text-align:center;">操作</th>
                        </tr>
                    </thead>
					<tbody>
                        @foreach ($listEntity as $per)
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td>{{ $per->getRoleName() }}</td>
                            <td>{{ $per->getStar() }}</td>
                            <td>{{ $per->stone }}</td>
                            <td>{{ $per->wake_stone }}</td>
                            <td>{{ $per->universe_star }}</td>
                            <td>{{ $per->universe_6 }}</td>
                            <td>{{ $per->universe_7 }}</td>
                            <td>{{ $per->universe_8 }}</td>
                            <td>{{ $per->universe_9 }}</td>
                            <td>{{ $per->cloth_star }}</td>
                            <td>{{ $per->cloth_header }}</td>
                            <td>{{ $per->cloth_shoulder }}</td>
                            <td>{{ $per->cloth_chest }}</td>
                            <td>{{ $per->cloth_waist }}</td>
                            <td>{{ $per->cloth_arm }}</td>
                            <td>{{ $per->cloth_leg }}</td>
                            <td>{{ $per->favor }}</td>
                            <td>{{ $per->equipment }}</td>
                            <td>{{ $per->level }}</td>
                            <td>{{ $per->score }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a item-id="{{ $per->id }}" href="{{ _route('member:game.diary.show', $per->id) }}" class="btn btn-xs layer_open" target="_blank" >
                            		<i class="fa fa-eye"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="{{ _route('member:game.diary.edit', $per->id) }}" class="btn btn-xs">
                            		<i class="fa fa-pencil-square-o"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="{{ _route('member:game.diary.remove', $per->id) }}" class="btn btn-xs remove">
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
	
    TableExpand.init({},"syrator_table");

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