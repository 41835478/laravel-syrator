@extends('_layout._common')

@section('head_css')
@parent
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
					<h3 class="page-title">新增角色  <small> 新增系统管理员角色</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{ site_url('permission/role', 'admin') }}">角色管理</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">新增角色</a></li>
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
				<div class="span12">
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
                    <div class="portlet box blue ">
                    	<div class="portlet-title">
                    		<div class="caption">新增角色</div>
                    	</div>
						<div class="portlet-body form">
							<form method="post" action="{{ _route('admin:permission.role.store') }}" accept-charset="utf-8" class="form-horizontal form-bordered form-label-stripped">
                                {!! csrf_field() !!}
								<div class="control-group">
									<label class="control-label">角色名</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="name" autocomplete="off" value="{{ old('name', isset($role) ? $role->name : null) }}" placeholder="角色名">
										<span class="help-inline text-green"><small>*</small> 只能为英文单词，建议首字母大写</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">角色展示名</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="display_name" autocomplete="off" value="{{ old('display_name', isset($role) ? $role->display_name : null) }}" placeholder="角色展示名">
										<span class="help-inline text-green"><small>*</small> 展示名可以为中文</span>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn blue" id="updateOptions1"><i class="icon-ok"></i> 新增角色</button>
								</div>
							</form>
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
@stop

@section('filledScript')
<script>
jQuery(document).ready(function() {    
    App.init();
});
</script>
@stop