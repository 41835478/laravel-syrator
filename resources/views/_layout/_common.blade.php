@extends('_layout._base')

@section('head_css')
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ _asset('assets/metronic/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ _asset('assets/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ _asset('assets/metronic/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ _asset('assets/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ _asset('assets/metronic/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ _asset('assets/metronic/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ _asset('assets/metronic/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ _asset('assets/metronic/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ _asset('assets/metronic/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
	<link href="{{ _asset('assets/css/syrator.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('head_js')
@parent
    <!--[if lt IE 9]>
    <script src="{{ _asset('assets/global/plugins/respond.min.js') }}"></script>
    <script src="{{ _asset('assets/global/plugins/excanvas.min.js') }}"></script> 
    <script src="{{ _asset('assets/global/plugins/ie8.fix.min.js') }}"></script> 
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ _asset('assets/metronic/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ _asset('assets/metronic/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ _asset('assets/metronic/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ _asset('assets/metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ _asset('assets/metronic/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ _asset('assets/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ _asset('assets/metronic/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ _asset('assets/metronic/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
    <script src="{{ _asset('assets/metronic/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
    <script src="{{ _asset('assets/metronic/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
    <script src="{{ _asset('assets/metronic/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->	
	<!-- BEGIN WECHAT SDK -->
	<script src="https://res.wx.qq.com/open/js/jweixin-1.1.0.js" type="text/javascript"></script>	
	<!-- END WECHAT SDK -->	
	<script src="{{ _asset('assets/js/syrator.js') }}" type="text/javascript" ></script>
@stop

@section('body')

    @section('content-header')
    @show
    
    @section('content')
    @show
        
    @section('content-footer')
    @show

@stop

@section('afterBody')
    
    @section('extraPlugin')
    @show

    @section('filledScript')
    @show

    @section('extraSection')
    @show

@stop

@section('front_footer')
@stop
