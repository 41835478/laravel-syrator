@extends('documents._layout._documents')

@section('page-content-bar')
@parent
<ul class="page-breadcrumb">
    <li>
        <a href="{{ site_url('home', 'documents') }}">首页</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>控制台</span>
    </li>
</ul>
@stop

@section('page-content-title')
@parent
{{cache('website_title')}}<small>文档中心</small>
@stop

@section('page-content-row')
@parent
<div class="note note-info">
    <p> {{cache('website_title')}}文档中心</p>
</div>
@stop