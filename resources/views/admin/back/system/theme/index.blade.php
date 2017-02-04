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
					<h3 class="page-title">模板管理  <small> 系统前台显示模板管理</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">系统模板</a></li>
						<li class="pull-right no-text-shadow">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="icon-calendar"></i>
								<span></span>
								<i class="icon-angle-down"></i>
							</div>
						</li>
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
							<div class="caption">模板列表</div>
							<div class="actions">
								<a href="{{ _route('admin:system.theme.create') }}" class="btn blue"><i class="icon-pencil"></i> 新增</a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="syrator_table">
								<thead>
									<tr>
										<th style="width:8px;text-align:center;"><input type="checkbox" class="group-checkable" data-set="#syrator_table .checkboxes" /></th>			
                                        <th style="width:80px;text-align:center;">编码</th>
										<th style="width:80px;text-align:center;">名称</th>
                                        <th class="hidden-480" style="width:80px;text-align:center;">作者</th>
                                        <th class="hidden-480" style="width:80px;text-align:center;">版本</th>
                                        <th class="hidden-480" style="width:75px;text-align:center;">是否使用</th>
                                        <th style="width:150px;text-align:center;">创建日期</th>
                                        <th style="width:150px;text-align:center;">更新日期</th>
                                        <th class="hidden-480" style="width:80px;text-align:center;">操作</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($themes as $per)
                                    <tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="{{ $per->id }}" /></td>
                                        <td class="text-red">{{ $per->code }}</td>
                                        <td class="text-green">{{ $per->name }}</td>
                                        <td class="text-yellow">{{ $per->author }}</td>
                                        <td>{{ $per->version }}</td>
                    					@if($per->is_current === '1')
                    					<td class="text-red" style="text-align:center;"><i class="icon-ok"></i></td>
                    					@else
                    					<td class="text-red" style="text-align:center;"><i class="icon-remove"></i></td>
                    					@endif
                    					<td style="text-align:center;">{{ $per->created_at }}</td>
                    					<td style="text-align:center;">{{ $per->updated_at }}</td>
                    					<td style="text-align: center;">                                        	
                                        	<a data-title="{{ $per->name }}" href="{{ _route('admin:system.theme.show', $per->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;padding:3px;">
                                        		<i class="icon-eye-open"></i>
                                        	</a>
                                        	<a href="{{ _route('admin:system.theme.edit', $per->id) }}" role="button" class="btn btn-danger" style="background: none;padding:3px;">
                                        		<i class="icon-edit"></i>
                                        	</a>
                                        	<a item-id="{{ $per->id }}" href="javascript:void(0);" role="button" class="remove btn btn-danger" style="background: none;padding:3px;">
                                        		<i class="icon-remove"></i>
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
<script type="text/javascript" src="{{ _asset('assets/metronic/js/DT_bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ _asset('assets/metronic/js/table-managed.js') }}"></script>
<script type="text/javascript" src="{{ _asset(ref('layer.js')) }}"></script>
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();
    TableManaged.init();

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
            $.post("{{ URL('admin/system/theme/remove') }}", {
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