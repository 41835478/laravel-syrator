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
<script src="{{ _asset('assets/syrator/js/datatables/table-expand.js') }}" type="text/javascript"></script>
@stop

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('home', 'admin') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{ site_url('member/member', 'admin') }}">会员管理</a>
        <i class="fa fa-circle"></i>
    </li>
</ul>
@stop

@section('page-content-row')
@parent
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>会员列表</div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-default btn-sm">
                        <i class="fa fa-plus"></i> Add </a>
                    <a href="javascript:;" class="btn btn-default btn-sm">
                        <i class="fa fa-print"></i> Print </a>
                </div>
            </div>
            <div class="portlet-body">
				<table class="table table-striped table-bordered table-hover table-checkable order-column" id="syrator_table_member">
					<thead>
                        <tr>
                            <th style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#syrator_table_member .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
							<th style="">账号</th>
							<th style="">手机号</th>
							<th style="">角色</th>
							<th style="">昵称</th>
							<th style="">邮箱</th>
                            <th class="hidden-480" style="text-align:center;">操作</th>
                        </tr>
                    </thead>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th>选择角色</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
                        @foreach ($members as $per)
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-edit"></i>
                            	</a>
                            	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-trash"></i>
                            	</a>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
							<td style="width:8px;text-align:center;">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td class="text-green">{{ $per->account }}</td>
                            <td class="text-green">{{ $per->phone }}</td>
                            <td class="text-green">{{ $per->role_name }}</td>
                            <td>{{ $per->nickname }}</td>
                            <td>{{ $per->email }}</td>
        					<td style="text-align: center;">        					                            	
                            	<a data-title="{{ $per->nickname }}" href="{{ _route('admin:member.member.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                            		<i class="icon-eye-open"></i>
                            	</a>
                            	<a href="{{ _route('admin:member.member.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
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
@stop

@section('extraPlugin')
@parent
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {
    App.init();

    var selectValues = new Array();
    selectValues[0] = "顶级分类";
    @foreach ($groups as $k => $v)
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
	}, "syrator_table_member");

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
            area: ['480px', '283px'],
            content: src
        });
    });

    $(document).on("click","a.remove",function(evt) {
        var itemId = $(this).attr("item-id");
    	if(confirm("删除后数据将无法恢复，您确定要删除?")){
            $.post("{{ URL('admin/member/member/remove') }}", {
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
});
</script>
@stop