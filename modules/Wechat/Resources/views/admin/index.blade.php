@extends('wechat::admin._layout._admin')

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('admin', 'wechat') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>控制台</span>
    </li>
</ul>
@stop

@section('page-content-title')
@parent
{{cache('website_title')}}<small>微信后台管理控制台</small>
@stop

@section('page-content-row')
@parent
<div class="note note-info">
    <p> {{cache('website_title')}}微信后台管理系统 </p>
</div>
@stop