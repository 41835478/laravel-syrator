@extends('_layout._base-ex')

@section('css_mandatory')
@parent
@include('_widgets.assets.style_core')
@stop

@section('css_page_level_plugins')
@parent
@stop

@section('css_theme_global')
@parent
@stop

@section('css_page_level_layout')
@parent
@stop

@section('css_theme_layout')
@parent
@stop

@section('js_core_plugins')
@parent
@include('_widgets.assets.script_core')
@stop

@section('js_page_level_plugins')
@parent
@stop

@section('js_theme_global')
@parent
@stop

@section('js_page_level')
@parent
@stop

@section('js_theme_layout')
@parent
@stop