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
							<div class="actions">
								<a href="#" class="btn blue"><i class="icon-pencil"></i> 新增</a>
								<div class="btn-group">
									<a class="btn green" href="#" data-toggle="dropdown">
									<i class="icon-cogs"></i> 操作
									<i class="icon-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li><a href="#"><i class="icon-pencil"></i> 编辑</a></li>
										<li><a href="#"><i class="icon-trash"></i> 删除</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
								<thead>
									<tr>
										<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /></th>
										<th>用户名</th>
										<th class="hidden-480">邮箱</th>
										<th class="hidden-480">状态</th>
									</tr>
								</thead>
								<tbody>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>shuxer</td>
										<td class="hidden-480"><a href="mailto:shuxer@gmail.com">shuxer@gmail.com</a></td>
										<td><span class="label label-success">Approved</span></td>
									</tr>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>looper</td>
										<td class="hidden-480"><a href="mailto:looper90@gmail.com">looper90@gmail.com</a></td>
										<td><span class="label label-warning">Suspended</span></td>
									</tr>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>userwow</td>
										<td class="hidden-480"><a href="mailto:userwow@yahoo.com">userwow@yahoo.com</a></td>
										<td><span class="label label-success">Approved</span></td>
									</tr>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>user1wow</td>
										<td class="hidden-480"><a href="mailto:userwow@gmail.com">userwow@gmail.com</a></td>
										<td><span class="label label-inverse">Blocked</span></td>
									</tr>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>restest</td>
										<td class="hidden-480"><a href="mailto:userwow@gmail.com">test@gmail.com</a></td>
										<td><span class="label label-success">Approved</span></td>
									</tr>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>foopl</td>
										<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>
										<td><span class="label label-success">Approved</span></td>
									</tr>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>weep</td>
										<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>
										<td><span class="label label-success">Approved</span></td>
									</tr>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>coop</td>
										<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>
										<td><span class="label label-success">Approved</span></td>
									</tr>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>pppol</td>
										<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>
										<td><span class="label label-success">Approved</span></td>
									</tr>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>test</td>
										<td class="hidden-480"><a href="mailto:userwow@gmail.com">good@gmail.com</a></td>
										<td><span class="label label-success">Approved</span></td>
									</tr>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>userwow</td>
										<td class="hidden-480"><a href="mailto:userwow@gmail.com">userwow@gmail.com</a></td>
										<td><span class="label label-inverse">Blocked</span></td>
									</tr>
									<tr class="odd gradeX">
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										<td>test</td>
										<td class="hidden-480"><a href="mailto:userwow@gmail.com">test@gmail.com</a></td>
										<td><span class="label label-success">Approved</span></td>
									</tr>
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
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();
    TableManaged.init();
});
</script>
@stop