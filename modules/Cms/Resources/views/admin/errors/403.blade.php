@extends('_layout._common')

@section('head_css')
@parent
<link rel="stylesheet" type="text/css" href="{{ _asset('assets/metronic/css/error.css') }}" />
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
<div class="page-container">
	@include('cms::_widgets._main-sidebar')
	<div class="page-content">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">{{cache('website_title')}} CMS子系统后台管理控制台</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('admin', 'cms') }}">首页</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12 page-404">
					<div class="number">
						403
					</div>
					<div class="details">
						<h3>异常警告：权限不足</h3>
						<p>您没有权限访问当前页面内容，请联系超级管理员或访问其它页面节点2！<br><br><br></p>
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
