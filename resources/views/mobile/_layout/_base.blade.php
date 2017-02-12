<!DOCTYPE html>
<html lang="zh-cn" @section('html_attr') class="" @show>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
{{-- 页面标题 --}}
<title>@section('title') Syrator @show</title>
<meta name="description" content="{{ isset($description) ? $description : 'syrator' }}" />
<meta name="keywords" content="{{ cache('website_keywords') }}" />
<meta name="_token" content="{{ csrf_token() }}"/>
{{-- 360浏览器使用webkit内核渲染页面 --}}
<meta name="renderer" content="webkit">
{{-- IE(内核)浏览器优先使用高版本内核 --}}
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
{{-- 添加一些额外的META申明 --}}
@section('meta')
@show
{{-- favicon --}}
<link rel="shortcut icon" href="{{ _asset('favicon.ico') }}" type="image/x-icon">
{{-- head区域css样式表 --}}
@section('head_css')
@show
{{-- head区域javscript脚本 --}}
@section('head_js')
@show
{{-- 在内联样式之前填充一些东西 --}}
@section('beforeStyle')
@show
{{-- head区域内联css样式表 --}}
@section('head_style')
@show
{{-- 在内联样式之后填充一些东西 --}}
@section('afterStyle')
@show
</head>
<body @section('body_attr') class="" @show>
{{--在正文之前填充一些东西 --}}
@section('beforeBody')
@show
{{-- 正文部分 --}}
@section('body')
@show
{{-- 在正文之后填充一些东西，比如统计代码之类的东东 --}}
@section('afterBody')
@show
</body>
</html>
