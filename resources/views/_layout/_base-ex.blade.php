@extends('_layout._base')

@section('head_css')
@parent

	@section('head_css_mandatory')
    @show
    
    @section('head_css_page_level_plugins')
    @show
    
    @section('head_css_theme_global')
    @show
    
    @section('head_css_page_level')
    @show
    
    @section('head_css_theme_layout')
    @show
    
	<link href="{{ _asset('assets/syrator/css/syrator.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('head_js')
@parent

    <!--[if lt IE 9]>
    <script src="{{ _asset('assets/global/plugins/respond.min.js') }}"></script>
    <script src="{{ _asset('assets/global/plugins/excanvas.min.js') }}"></script> 
    <script src="{{ _asset('assets/global/plugins/ie8.fix.min.js') }}"></script> 
    <![endif]-->    
	@section('head_js_core_plugins')
    @show
    
	@section('head_js_page_level_plugins')
    @show
    
	@section('head_js_theme_global')
    @show
    
    @section('head_js_page_level')
    @show
    
	@section('head_js_theme_layout')
    @show
    
	<!-- BEGIN WECHAT SDK -->
	<script src="https://res.wx.qq.com/open/js/jweixin-1.1.0.js" type="text/javascript"></script>	
	<!-- END WECHAT SDK -->	
	<script src="{{ _asset('assets/syrator/js/syrator.js') }}" type="text/javascript" ></script>
@stop

@section('body')
@parent

    @section('content-header')
    @show
    
    @section('content')
    @show
        
    @section('content-footer')
    @show

@stop

@section('afterBody')
@parent

    @section('extraPlugin')
    @show

    @section('filledScript')
    @show

    @section('extraSection')
    @show

@stop