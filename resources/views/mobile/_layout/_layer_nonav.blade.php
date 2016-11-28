@extends('mobile._layout._base')

@section('title') {{ isset($title) ? ($title) : '蚂蚁帮帮' }} @stop

@section('head_css')
<link href="{{ _asset('wapstyle/css/icons-extra.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ _asset('wapstyle/css/mui.min.css') }}" rel="stylesheet" />
<link href="{{ _asset('wapstyle/css/style.css') }}" rel="stylesheet" /> 
@stop

@section('head_js')    
<script src="{{ _asset('wapstyle/js/jquery.min.js') }}"></script>
<script src="{{ _asset('wapstyle/js/mui.min.js') }}"></script>
<script src="{{ _asset('wapstyle/js/app.js') }}"></script>
@stop

@section('body')
@yield('content')
@stop
