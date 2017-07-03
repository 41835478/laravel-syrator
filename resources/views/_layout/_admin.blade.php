@extends('_layout._core')

@section('body_attr') 
@parent
class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" 
@stop

@section('head_css_theme_global')
@parent
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="{{ _asset('assets/metronic/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
<link href="{{ _asset('assets/metronic/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
@stop

@section('head_css_theme_layout')
@parent
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="{{ _asset('assets/metronic/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
<link href="{{ _asset('assets/metronic/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
@stop

@section('head_js_theme_global')
@parent
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ _asset('assets/metronic/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
@stop

@section('head_js_theme_layout')
@parent
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ _asset('assets/metronic/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
@stop