@extends('_layout._base_ex')

@section('head_css_mandatory')
@parent
@include('_layout._css_mandatory')
@stop

@section('head_css_page_level_plugins')
@parent
@show

@section('head_css_theme_global')
@parent
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="{{ _asset('assets/metronic/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
<link href="{{ _asset('assets/metronic/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
@show

@section('head_css_page_level')
@parent
@show

@section('head_css_theme_layout')
@parent
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="{{ _asset('assets/metronic/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
<link href="{{ _asset('assets/metronic/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
@show

@section('head_js_core_plugins')
@parent
@include('_layout._js_core_plugins')
@stop

@section('head_js_page_level_plugins')
@parent
@stop

@section('head_js_theme_global')
@parent
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ _asset('assets/metronic/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
@stop

@section('head_js_page_level')
@parent
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