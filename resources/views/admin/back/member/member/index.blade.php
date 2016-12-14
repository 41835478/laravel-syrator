@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/select2_metro.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/DT_bootstrap.css') }}" />
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
	@include('admin._widgets._main-sidebar')
	<div class="page-content">
		<div id="portlet-config" class="modal hide">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button"></button>
				<h3>Widget Settings</h3>
			</div>
			<div class="modal-body">
				Widget settings form goes here
			</div>
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">会员管理  <small> 系统会员管理</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">会员管理</a></li>
						<li class="pull-right no-text-shadow">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" 
								data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="icon-calendar"></i>
								<span></span>
								<i class="icon-angle-down"></i>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6 responsive" data-tablet="span12 fix-offset" data-desktop="span6">
					<div class="portlet box grey">
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
						<div class="portlet-title">
							<div class="caption">会员列表</div>
							<div class="actions">
								<div class="btn-group">
									<a href="{{ _route('admin:member.member.create') }}" class="btn"><i class="icon-pencil"></i> 新增</a>
									<a class="btn" href="#" data-toggle="dropdown">选择显示列<i class="icon-angle-down"></i></a>
									<div id="syrator_table_member_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
										<label><input type="checkbox" checked data-column="1">账号</label>
										<label><input type="checkbox" checked data-column="2">手机号</label>
										<label><input type="checkbox" checked data-column="3">角色</label>
										<label><input type="checkbox" checked data-column="4">昵称</label>
										<label><input type="checkbox" checked data-column="5">邮箱</label>
									</div>
								</div>
							</div>	
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="syrator_table_member">							
								<thead>
									<tr>
										<th style="width:8px;text-align:center;">
											<input type="checkbox" class="group-checkable" data-set="#syrator_table_member .checkboxes" />
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
											<input type="checkbox" class="checkboxes" value="{{ $per->id }}" />
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
<script type="text/javascript" src="{{ _asset('assets/metronic/js/table-member.js') }}"></script> 
<script type="text/javascript" src="{{ _asset(ref('layer.js')) }}"></script>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();

    var selectValues = new Array();
    @foreach ($groups as $k => $v)
    selectValues[{{$k}}] = "{{$v->name}}";
    @endforeach
    TableMember.init({
		aoColumns: 
		[ 
			null,
            null,
            null,
            {type: "select", values: selectValues},
            null,
        ]
	});

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