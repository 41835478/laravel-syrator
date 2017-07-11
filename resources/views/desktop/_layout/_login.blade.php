@extends('_layout._core')

@section('body_attr') class="login" @stop

@section('css_page_level_plugins')
@parent
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ _asset('assets/metronic/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
@stop

@section('css_theme_global')
@parent
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="{{ _asset('assets/metronic/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
<link href="{{ _asset('assets/metronic/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
@stop

@section('css_page_level_plugins')
@parent
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ _asset('assets/metronic/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/metronic/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
@stop

@section('css_page_level')
@parent
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ _asset('assets/metronic/pages/css/login-4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
@stop

@section('js_page_level_plugins')
@parent
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ _asset('assets/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ _asset('assets/metronic/global/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
@stop

@section('js_theme_global')
@parent
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ _asset('assets/metronic/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
@stop

@section('js_page_level')
@parent
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ _asset('assets/metronic/pages/scripts/login-4.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@stop