@extends('_layout._common')

@section('head_css')
@parent
@stop

@section('body_attr') class="page-header-fixed theme-light2" @stop

@section('content-header')
@parent
@include('documents._widgets._main-header')
@stop

@section('content-footer')
@parent
@include('documents._widgets._main-footer')
@stop

@section('content')
<div class="page-container">
	@include('documents._widgets._main-sidebar')
	<div class="page-content" style="min-height:993px !important">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">{{cache('website_title')}}后台管理控制台</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="#">首页</a> 
							<i class="icon-angle-right"></i>
						</li>
						<li><a href="#">控制台</a></li>
					</ul>
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