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
					<h3 class="page-title">系统日志  <small> 系统相关的操作日志</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">系统日志</a></li>
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
				<div class="span6 responsive" data-tablet="span12 fix-offset" data-desktop="span6">
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">日志列表</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
								<thead>
									<tr>
										<th style="width:8px;text-align: center;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /></th>			
                                        <th style="width:45px;text-align: center;">类型</th>
										<th>操作者</th>
                                        <th class="hidden-480" style="width:80px;text-align: center;">操作者IP</th>
                                        <th class="hidden-480" style="width:200px;text-align: center;">操作URL</th>
                                        <th class="hidden-480" style="text-align: center;">操作内容</th>
                                        <th style="width:80px;text-align: center;">操作时间</th>
                                        <th class="hidden-480" style="width:45px;text-align: center;">查阅</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($system_logs as $sys_log)
                                    <tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="{{ $sys_log->id }}" /></td>
                                        <td class="text-red">{{ dict('log_type.'.$sys_log->type) }}</td>
                                        <td class="text-green">{{ $sys_log->username or '--' }} / {{ $sys_log->realname or '--' }}</td>
                                        <td class="text-yellow">{{ $sys_log->operator_ip }}</td>
                                        <td title="{{ $sys_log->url }}">{{ $sys_log->url }}</td>
                                        <td title="{{ $sys_log->content }}">{{ str_limit($sys_log->content, 70, '...') }}</td>
                                        <td>{{ $sys_log->created_at }}</td>
                                        <td style="text-align: center;">                                        	
                                        	<a href="{{ _route('admin:system.log.show', $sys_log->id) }}" role="button" class="layer_open btn btn-danger" style="background: none;">
                                        		<i class="icon-eye-open"></i>
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
        layer.tips('这是你当前查看的日志', that);
        layer.open({
            type: 2,
            title: title,
            shadeClose: false,
            shade: 0,
            area: ['450px', '300px'],
            content: src //iframe的url
        });
    });
});
</script>
@stop