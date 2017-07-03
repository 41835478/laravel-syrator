@extends('_layout._admin')

@section('content')
<div class="page-wrapper">
	@include('admin._widgets._main-header')
	<div class="clearfix"> </div>
	<div class="page-container">
		@include('admin._widgets._main-sidebar')
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <a href="#">首页</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>控制台</span>
                        </li>
                    </ul>
                </div>                
                <h1 class="page-title"> {{cache('website_title')}}
                    <small>后台管理控制台</small>
                </h1>
                <div class="note note-info">
                    <p> {{cache('website_title')}}后台管理系统 </p>
                </div>
    		</div>
		</div>
	</div>	
	@include('admin._widgets._main-footer')
</div>
@stop

@section('content')
<div class="page-container">
	@include('admin._widgets._main-sidebar')
	<div class="page-content">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h3 class="page-title">蚂蚁公装管理后台</h3>
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="{{ site_url('home', 'admin') }}">首页</a>
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
						<p>您没有权限访问当前页面内容，请联系超级管理员或访问其它页面节点！<br><br><br></p>
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
