@extends('_layout._base-ex')

@section('head_css_mandatory')
@parent
@include('_layout._css_mandatory')
@stop

@section('head_css_page_level_plugins')
@parent
@show

@section('head_css_theme_global')
@parent
@show

@section('head_css_page_level')
@parent
@show

@section('head_css_theme_layout')
@parent
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
@stop

@section('head_js_page_level')
@parent
@stop

@section('head_js_theme_layout')
@parent
@stop