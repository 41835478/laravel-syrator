@extends('_layout._common')

@section('head_css')
@parent
@stop

@section('body_attr') 
class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" 
@stop

@section('content')
<div class="page-wrapper">
	@include('admin._widgets._main-header')
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