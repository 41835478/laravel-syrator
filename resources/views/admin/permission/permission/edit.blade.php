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
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">权限编辑  <small> 编辑权限信息</small></h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{ site_url('permission/permission', 'admin') }}">权限管理</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">权限编辑</a></li>
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
                    		<div class="caption">权限编辑</div>
                    	</div>
						<div class="portlet-body form">
							<form method="post" action="{{ _route('admin:permission.permission.update', $permission->id) }}" accept-charset="utf-8" class="form-horizontal form-bordered form-label-stripped">
                                {!! method_field('put') !!}
                                {!! csrf_field() !!}
								<div class="control-group">
									<label class="control-label">权限名</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="name" autocomplete="off" value="{{ old('name', isset($permission) ? $permission->name : null) }}" placeholder="权限名">
										<span class="help-inline text-green"><small>*</small> 只能为英文单词，'-'字符，首字母可以为'@'（'@'开头代表为一级权限）</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">权限展示名</label>
									<div class="controls">										
										<input type="text" class="m-wrap large" name="display_name" autocomplete="off" value="{{ old('display_name', isset($permission) ? $permission->display_name : null) }}" placeholder="权限展示名">
										<span class="help-inline text-green"><small>*</small> 展示名可以为中文</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">权限描述</label>
									<div class="controls">										
										<textarea type="text" class="m-wrap large" name="description" autocomplete="off" placeholder="权限描述">{{ old('description', isset($permission) ? $permission->description : null) }}</textarea>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn blue"><i class="icon-ok"></i> 更新权限</button>
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