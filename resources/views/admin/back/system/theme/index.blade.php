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
				<div class="span6 responsive" data-tablet="span12 fix-offset" data-desktop="span6">
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">模板列表</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
								<thead>
									<tr>
										<th style="width:8px;text-align:center;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" /></th>			
                                        <th style="width:80px;text-align:center;">编码</th>
										<th style="width:80px;text-align:center;">名称</th>
                                        <th class="hidden-480" style="width:80px;text-align:center;">作者</th>
                                        <th class="hidden-480" style="width:80px;text-align:center;">版本</th>
                                        <th class="hidden-480" style="width:75px;text-align:center;">是否使用</th>
                                        <th style="width:125px;text-align:center;">创建日期</th>
                                        <th style="width:125px;text-align:center;">更新日期</th>
                                        <th class="hidden-480" style="width:120px;text-align:center;">操作</th>
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
                                        <td style="text-align:center;">
                                        	<a class="edit" href="javascript:;"><i class="icon-eye-open"></i>Edit</a>
                                        	<a class="edit" href="javascript:;"><i class="icon-eye-open"></i>Edit</a>
                                        	<a class="edit" href="javascript:;"><i class="icon-eye-open"></i>Edit</a>
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
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();
    TableManaged.init();
});
</script>
@stop