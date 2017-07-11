@extends('mobile._layout._base')

@section('title') {{ isset($title) ? ($title) : '蚂蚁帮帮' }} @stop
 
@section('head_css')
<link href="{{ _asset('assets/syrator/wap/css/icons-extra.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('assets/syrator/wap/css/mui.min.css') }}" rel="stylesheet" />
<link href="{{ _asset('assets/syrator/wap/css/style.css') }}" rel="stylesheet" /> 
@stop

@section('head_js')    
<script src="{{ _asset('assets/syrator/wap/js/jquery.min.js') }}"></script>
<script src="{{ _asset('assets/syrator/wap/js/mui.min.js') }}"></script>
<script src="{{ _asset('assets/syrator/wap/js/app.js') }}"></script>
@stop

@section('body')
@yield('content')
@include('mobile._widgets._main-nav')
@stop
