@extends('_layout._base')

@section('syrator_css')
@parent

	@section('css_mandatory')
    @show
    
    @section('css_page_level_plugins')
    @show
    
    @section('css_theme_global')
    @show
    
    @section('css_page_level_layout')
    @show
    
    @section('css_theme_layout')
    @show
    
	<link href="{{ _asset('assets/syrator/css/syrator.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('syrator_js')
@parent

    <!--[if lt IE 9]>
    <script src="{{ _asset('assets/global/plugins/respond.min.js') }}"></script>
    <script src="{{ _asset('assets/global/plugins/excanvas.min.js') }}"></script> 
    <script src="{{ _asset('assets/global/plugins/ie8.fix.min.js') }}"></script> 
    <![endif]-->    
	@section('js_core_plugins')
    @show
    
	@section('js_page_level_plugins')
    @show
    
	@section('js_theme_global')
    @show
    
    @section('js_page_level_layout')
    @show
    
	@section('js_theme_layout')
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