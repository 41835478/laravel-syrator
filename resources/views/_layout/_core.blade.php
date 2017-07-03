@extends('_layout._base-ex')

@section('head_css_mandatory')
@parent
@include('_widgets.assets.style_core')
@stop

@section('head_css_page_level_plugins')
@parent
@stop

@section('head_css_theme_global')
@parent
@stop

@section('head_css_page_level')
@parent
@stop

@section('head_css_theme_layout')
@parent
@stop

@section('head_js_core_plugins')
@parent
@include('_widgets.assets.script_core')
@stop

@section('head_js_page_level_plugins')
@parent
@stop

@section('head_js_theme_global')
@parent
@stop

@section('head_js_page_level')
@parent
@stop

@section('head_js_theme_layout')
@parent
@stop