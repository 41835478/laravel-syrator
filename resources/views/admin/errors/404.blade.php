@extends('_layout._admin')

@section('head_css_page_level')
@parent
<link href="{{ _asset('assets/metronic/pages/css/error.min.css') }}" rel="stylesheet" type="text/css" />
@stop

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
                            <a href="{{ site_url('home', 'admin') }}">首页</a>
                            <i class="fa fa-circle"></i>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title"> {{cache('website_title')}}
                    <small>后台管理控制台</small>
                </h1>
                <div class="row">
                    <div class="col-md-12 page-404">
                        <div class="number font-green"> 404 </div>
                        <div class="details">
                            <h3>404错误</h3>
                            <p>未找到该页面，请访问其它页面节点! </p>
                        </div>
                    </div>
                </div>
    		</div>
		</div>
	</div>	
	@include('admin._widgets._main-footer')
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
